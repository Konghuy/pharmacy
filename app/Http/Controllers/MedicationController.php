<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\Paginator;
use Carbon\Carbon;
use App\Medication;
use App\Categories;
use App\Packages;
use App\Rank;
use App\Supplier;
use App\Payment;
use App\Stock;
use App\PurchaseItem;


class MedicationController extends Controller
{
    public function index(){
        $medication = Medication::all();
        return view('medication.index', [
            'medications' => $medication
            ]);
    }
    public function create(){
        $category = Categories::all();
        $package = Packages::all();
        $payment = Payment::all();
        $supplier = Supplier::all();
        $ranking = Rank::all();
        
        return view('medication.create',[
            'categorys' => $category,
            'packages' => $package,
            'payments' => $payment,
            'suppliers' => $supplier,
            'ranking' => $ranking
            ]);
    }
    public function store(Request $request)
    {
        // Add data to Master_product
        $medication = new Medication();
        $medication->pro_code = $request->code;
        $medication->pro_name = $request->name;
        $medication->cat_id = $request->category;
        $medication->package_id = $request->package;
        $medication->items_in_pack = $request->qtyPackage;
        $medication->item_unit_cost = $request->pricePackageSelling;
        $medication->items_in_pack_package_id = $request->itemPackage;
        $medication->sub_items_in_item = $request->qtyItem;
        $medication->sub_item_unit_cost = $request->priceItemSelling;
        $medication->sub_items_in_item_package_id = $request->subItem;
        $medication->qty = $request->qtySubItem;
        $medication->price = $request->priceSubItemSelling;
        $medication->discount = $request->discount;
        $medication->manufacturing_date = Carbon::parse($request->manuDate);
        $medication->expiry_date = Carbon::parse($request->expireDate);
        $medication->weight = $request->weight;
        $medication->rank_number_id = $request->rank_num;
        $medication->remark = $request->remark;
        $medication->created_by = 1;
        $medication->created_at = Carbon::now();
        $medication->save();

        // Add to Stock
        $stock = new Stock();
        $stock->pro_id = $medication->id;
        $stock->stock_package = 0;
        $stock->stock_item = 0;
        $stock->stock_subItem = 0;
        $stock->save();
        
        return redirect('/medication');
    }
    public function edit($id)
    {
        $medication = Medication::find($id);
        $category = Categories::all();
        $package = Packages::all();
        $ranking = Rank::all();
        
         return view('medication.edit', [
                'medication' => $medication,
                'packages' => $package,
                'categorys' =>$category  ,
                'ranking' => $ranking      
                ]);
    }
    public function update(Request $request, $id)
    {
        $medication = Medication::find($id);
        
        $medication->pro_code = $request->code;
        $medication->pro_name = $request->name;
        $medication->cat_id = $request->category;
        $medication->package_id = $request->package;
        $medication->items_in_pack = $request->qtyPackage;
        $medication->item_unit_cost = $request->pricePackageSelling;
        $medication->items_in_pack_package_id = $request->itemPackage;
        $medication->sub_items_in_item = $request->qtyItem;
        $medication->sub_item_unit_cost = $request->priceItemSelling;
        $medication->sub_items_in_item_package_id = $request->subItem;
        $medication->qty = $request->qtySubItem;
        $medication->price = $request->priceSubItemSelling;
        $medication->discount = $request->discount;
        $medication->manufacturing_date = Carbon::parse($request->manuDate);
        $medication->expiry_date = Carbon::parse($request->expireDate);
        $medication->weight = $request->weight;
        $medication->rank_number_id = $request->rank_num;
        $medication->remark = $request->remark;
        $medication->updated_by = 1;
        $medication->updated_at = Carbon::now();
        $medication->update();
        
        return redirect('/medication');
        //  $str = $request->manuDate . ", " .  date('Y-m-d', strtotime($request->manuDate));
        // return $str;
    }
    public function show($id)
    {
         $medication = Medication::where('id', $id)->first();
        //$medication = Medication::where('expiry_date' , '<=',  Carbon::now())->get();
        $package = Packages::all();
        // dd($medication->stock);
        return view('medication.show', [
            'medication' => $medication,
            'packages' => $package
            ]);
    }
}
