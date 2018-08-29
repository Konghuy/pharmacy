<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\POS;
use App\Medication;
use App\Purchase;
use App\Stock;
use Carbon\carbon;

class DefultController extends Controller
{
    public function dashboard(){
        $medication = Medication::all();
        $medicine = count($medication);
        $pos = POS::whereDate('created_at' , '=', Carbon::today())->sum('grand_total');
        $expend = Purchase::whereDate('created_at' , '=', Carbon::today())->sum('grand_total');

        return view('other.dashbord', [
            'saletoday' => $pos,
            'expendtoday' =>$expend,
            'medication' => $medicine
        ]);
    }
    
    public function stock(){
        $stock = Stock::all();
        // dd($stock);
        return view('other.stockinfo', [
            'stocks' => $stock
        ]);
    }
    public function expired(){
        $medication = Medication::where('expiry_date' , '>=',  Carbon::now())->get();
        // $expire = count($medication);
        // dd($medication->id);
        return view('other.expired', [
            'expired' => $medication
        ]);
    }
}
