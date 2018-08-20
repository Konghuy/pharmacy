<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Purchase;
use App\PurchaseItem;
use App\Medication;
use App\Supplier;
use App\Payment;
use App\Stock;
use Carbon\Carbon;
use Response;

class PurchaseController extends Controller
{
    public function index(){
        $purchase = Purchase::all();
        return view('purchase.index', [
            'purchases' => $purchase,
            ]);
    }
    public function create(){
        $medication = Medication::all();
        $supplier = Supplier::all();
        $payment = Payment::all();
        return view('purchase.create', [
            'medications' => $medication,
            'suppliers' => $supplier,
            'payments' => $payment
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
            $data = Medication::where('pro_code',$query)->get(); 
            return Response::json($data);
        }
    }

    public function store(Request $request){

        $purchase = new Purchase();
        $purchase->suppiler_id = $request->supplier_id;
        $purchase->discount = $request->discount;
        $purchase->tax = $request->tax;
        $purchase->payment_method_id = $request->payment;
        $purchase->remark = $request->remark;
        $purchase->created_by = 1;
        $purchase->created_at = Carbon::now();
            $qtyPro = count($request->id_product);
            $total = 0;
            for($i=0; $i<$qtyPro; $i++){
                $total += ($request->packages[$i] * $request->packagePrice[$i])
                        + ($request->items[$i] * $request->itemPrice[$i])
                        + ($request->subItem[$i] * $request->subPrice[$i]);   
            }  
            $Gtotal = $total - $request->discount - $request->tax;
        $purchase->grand_total = $Gtotal;
        $purchase->save();
        // Loop data add to PurchaseItem
        for($j=0; $j<$qtyPro; $j++){
            $purchaseItem = new PurchaseItem();
            $purchaseItem->purchase_id = $purchase->id;
            $purchaseItem->product_id = $request->id_product[$j];
            //Query data from stock add to purchaseItem
            $stock = Stock::where('pro_id',$request->id_product[$j])->first();
            $purchaseItem->current_items_in_pack = $stock->stock_package;
            $purchaseItem->current_sub_items_in_item = $stock->stock_item;
            $purchaseItem->current_qty = $stock->stock_subItem;
            // Add recode to Purchase Item
            $purchaseItem->purchase_items_in_pack = $request->packages[$j];
            $purchaseItem->purchase_items_unit_cost = $request->packagePrice[$j];
            $purchaseItem->purchase_sub_items_in_item = $request->items[$j];
            $purchaseItem->purchase_sub_items_unit_cost= $request->itemPrice[$j];
            $purchaseItem->purchase_qty = $request->subItem[$j];
            $purchaseItem->purchase_price = $request->subPrice[$j];
            $purchaseItem->save(); 
            // Add stock 
            $stock->stock_package = $stock->stock_package + $request->packages[$j];
            $stock->stock_item =  $stock->stock_item + $request->items[$j];
            $stock->stock_subItem = $stock->stock_subItem +  $request->subItem[$j];
            $stock->update(); 
        }
        
         return Response::json($qtyPro);
    }
}
