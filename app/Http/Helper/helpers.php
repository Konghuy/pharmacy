<?php
use Illuminate\Support\Facades\DB;
use App\Medication;
use Carbon\carbon;
use App\Stock;
use App\POS;
use App\Purchase;

function stockAlert(){
    $stock = Stock::Where('stock_package' , '<=', '1' )->get(); 
     return count($stock);
}

function expiredAlert(){
    $medication = Medication::where('expiry_date' , '<=',  Carbon::now())->get();
    return count($medication);
}
function saletoday(){
    $pos = POS::whereDate('created_at' , '=', Carbon::today())->get();
    return count($pos);
}
function purchasetoday(){
    $expend = Purchase::whereDate('created_at' , '=', Carbon::today())->get();
    return count($expend);
}
function getVal($object, $condition, $method){
    if(($object ==NULL) || ($condition == '0')  || ($condition == null)){
        return 'N/A';
    }
    else{
        return $object->$method;
    }
}