<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Purchase;
use App\PurchaseItem;
use App\Medication;
use App\Supplier;
use App\Payment;
use Carbon\Carbon;
use Response;

class PurchaseController extends Controller
{
    public function index(){
        $medication = Medication::all();
        $supplier = Supplier::all();
        $payment = Payment::all();
        return view('purchase.index', [
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
    //    dd($request->get('query'));
        if($request->get('query')){
            $query = $request->get('query');      
            $data = Medication::where('pro_code',$query)->get(); 
            // dd($data);
            return Response::json($data);
        }
    }
}
