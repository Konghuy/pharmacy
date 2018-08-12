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

        // // Add data to purchase
        // $purchase = new Purchase();
        // $purchase->suppiler_id = $request->supplier;
        // $purchase->discount = $request->discount;
        // $purchase->tax = $request->tax;
        // $purchase->payment_method_id = $request->payment;
        // $purchase->grand_total = ($request->qtyPackage * $request->pricePackagePurches) + 
        //                          ($request->qtyItem * $request->priceItemPurches) + 
        //                          ($request->qtySubItem * $request->priceSubItemPurches) - 
        //                          ($request->discount);
        // $purchase->remark = $request->remark;
        // $purchase->created_by = 1;
        // $purchase->created_at = Carbon::now();
        // $purchase->save();

        
        // // Add to purchase item
        // $pItem = new PurchaseItem();
        // $medicine = Medication::find($medication->id);
        // $pItem->purchase_id = $purchase->id;
        // $pItem->product_id = $medication->id;
        // $pItem->current_items_in_pack = 0;
        // $pItem->current_item_unit_cost = 0;
        // $pItem->current_sub_items_in_item = 0;
        // $pItem->current_sub_item_unit_cost = 0;
        // $pItem->current_qty = 0;
        // $pItem->current_price = 0;
        
        // $pItem->purchase_items_in_pack = $request->qtyPackage;
        // $pItem->purchase_items_unit_cost = $request->pricePackagePurches;
        // $pItem->purchase_sub_items_in_item = $request->qtyItem;
        // $pItem->purchase_sub_items_unit_cost = $request->priceItemPurches;
        // $pItem->purchase_qty = $request->qtySubItem;
        // $pItem->purchase_price = $request->priceSubItemPurches;
        // $pItem->save();

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
}
