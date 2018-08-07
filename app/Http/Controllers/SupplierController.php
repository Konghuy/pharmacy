<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use Carbon\Carbon;

class SupplierController extends Controller
{
    public function index()
    {
        $supplier = Supplier::all();
        return view('staff.supplier.index', ['suppliers' => $supplier]);
    }

    public function create()
    {
        return view('staff.supplier.create');
    }

    public function store(Request $request)
    {
        $supplier = new Supplier();
        $supplier->name = $request->name;
        $supplier->address = $request->address;
        $supplier->contact = $request->contact;
        $supplier->phone = $request->phone;
        $supplier->email = $request->email;
        $supplier->created_by = 1;
        $supplier->created_at = Carbon::now();
        $supplier->save();
       
        return redirect('/supplier');
    }

    public function show($id)
    {
        $supplier = Supplier::find($id);
        return view('staff.supplier.show', ['supplier' => $supplier]);
    }

    public function edit($id)
    {
        $supplier = Supplier::find($id);
         return view('staff.supplier.edit', ['supplier' => $supplier]);
    }

    public function update(Request $request, $id)
    {
        $supplier = Supplier::find($id);
        $supplier->name = $request->name;
        $supplier->address = $request->address;
        $supplier->contact = $request->contact;
        $supplier->phone = $request->phone;
        $supplier->email = $request->email;
        $supplier->updated_by = 1;
        $supplier->updated_at = Carbon::now();
        $supplier->update();
        return redirect('/supplier');
    }

    public function destroy($id)
    {
        //
    }
}
