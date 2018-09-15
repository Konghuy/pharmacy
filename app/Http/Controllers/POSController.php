<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\POS;
use App\OrderItems;
use Carbon\Carbon;
use App\Medication;
use App\Payment;
use App\Stock;
use Response;

class POSController extends Controller
{
    public function index(){
        $pos = POS::all();
        $medication = Medication::all();
        return view('pos.index', [
            'pos' => $pos,
            'medications' => $medication
            ]);
    }
    public function create(){
        $medication = Medication::all();
        $payment = Payment::all();
        $stock = Stock::all();
        return view('pos.create', [
            'medications' => $medication,
            'payments' => $payment,
            'stock' => $stock
            ]);
    }
    public function fetch(Request $request){
        if($request->get('query')){
            $query = $request->get('query');      
            $data = Medication::where('pro_name','LIKE','%'.$query.'%')
                            -> orwhere('pro_code','LIKE','%'.$query.'%')->get(); 
            return Response::json($data);
        }
    }

    public function add(Request $request){
        if($request->get('query')){
            $query = $request->get('query');      
            $data = Medication::where('pro_code',$query)->first(); 
            $stock = Stock::Where('pro_id',$data->id)->first();
            return Response::json(array(
                'data' => $data,
                'stock' => $stock,
            ));
        }
    }
    public function store(Request $request){

        $numRow = count($request->id_product);
        
        for($i=0; $i<$numRow; $i++){
            $stock = Stock::where('pro_id',$request->id_product[$i])->first(); 
            $medication = Medication::where('id',$request->id_product[$i])->first();

            $stockAvilable[] = ($stock->stock_package * $medication->sub_items_in_item * $medication->qty) +
                            ($stock->stock_item * $medication->qty) + $stock->stock_subItem; 

            $QtyOrder[] = ($request->packages[$i] *  $medication->sub_items_in_item * $medication->qty) + 
                        ($request->items[$i] * $medication->qty ) + $request->subItem[$i];

            if( $stockAvilable[$i] >= $QtyOrder[$i]){
                $status = true;
            }else{
                $status = false;
                // return Response::json("Stock Not Avilable".'-'. $stockAvilable[$i]."-".$QtyOrder[$i]);
                break;
            }
        }

        // 
        if($status==true){
            $order = new POS();
            $order->discount = $request->discount;
            $order->tax = $request->tax;
            $order->payment_method_id = $request->payment;
            $order->grand_total = $request->total;
            $order->remark = $request->remark;
            $order->created_by = 1;
            $order->created_at = Carbon::now();
            $order->save();
            // Loop data add to OrderItem
            for($j=0; $j<$numRow; $j++){
                $orderItems = new OrderItems();
                $orderItems->order_id = $order->id;
                $orderItems->product_id = $request->id_product[$j];
                //Query data from stock add to OrderItem
                $stock = Stock::where('pro_id',$request->id_product[$j])->first();
                $orderItems->current_items_in_pack = $stock->stock_package;
                $orderItems->current_sub_items_in_item = $stock->stock_item;
                $orderItems->current_qty = $stock->stock_subItem;
                // Add recode to Order Item
                $orderItems->order_items_in_pack = $request->packages[$j];
                $orderItems->order_items_in_pack_cost = $request->packagePrice[$j];
                $orderItems->order_sub_items_in_item = $request->items[$j];
                $orderItems->order_sub_items_in_item_cost= $request->itemPrice[$j];
                $orderItems->order_qty = $request->subItem[$j];
                $orderItems->order_price = $request->subPrice[$j];
                $orderItems->save(); 
                
                $medication = Medication::where('id',$request->id_product[$j])->first();
                $stockAvilable[$j] = ($stock->stock_package * $medication->sub_items_in_item * $medication->qty) +
                                ($stock->stock_item * $medication->qty) + $stock->stock_subItem; 

                $QtyOrder[$j] = ($request->packages[$j] *  $medication->sub_items_in_item * $medication->qty) + 
                            ($request->items[$j] * $medication->qty ) + $request->subItem[$j];

                $cutStock[$j] = $stockAvilable[$j] - $QtyOrder[$j];

                if($cutStock[$j] >= $medication->sub_items_in_item){
                    $stock->stock_package = (int)($cutStock[$j] / ($medication->sub_items_in_item* $medication->qty));
                   
                    $Mpk = $cutStock[$j] % ($medication->sub_items_in_item * $medication->qty);
                    if($Mpk > $medication->qty ){
                        $stock->stock_item = (int)($Mpk /$medication->qty);
                        $stock->stock_subItem = $Mpk % $medication->qty;
                    }else{
                        $stock->stock_item = 0;
                        $stock->stock_subItem =$Mpk;
                    }
                    
                }elseif($cutStock[$j] >= $medication->qty){
                        $stock->stock_package = 0;
                        $stock->stock_item = (int)($cutStock[$j] /$medication->qty);
                        $stock->stock_subItem = $cutStock[$j] % $medication->qty;
                }else{
                    $stock->stock_package = 0;
                    $stock->stock_item = 0;
                    $stock->stock_subItem = $cutStock[$j];
                }
                // return  Response::json($stockAvilable[$j]."-".$QtyOrder[$j]."-".$cutStock[$j]);
                $stock->update(); 
             }
        }
         return Response::json($status);
    }

}
