<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function index()
    {
        $payment = Payment::all();
        return view('payment.index', ['payments' => $payment]);
    }

    public function create()
    {
        return view('payment.create');
    }

    public function store(Request $request)
    {
        $payment = new Payment();
        $payment->name = $request->title;
        $payment->description = $request->description;
        $payment->created_by = 1;
        $payment->created_at = Carbon::now();
        $payment->save();
    
        return redirect('/payment');
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $payment = Payment::find($id);
         return view('payment.edit', ['payment' => $payment]);
    }

    public function update(Request $request, $id)
    {
        $payment = Payment::find($id);
        $payment->name = $request->name;
        $payment->description = $request->description;
        $payment->updated_by = 1;
        $payment->updated_at = Carbon::now();
        $payment->update();
        
        return redirect('/payment');
    }

    public function destroy($id)
    {
        //
    }
}
