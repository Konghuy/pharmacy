<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use Carbon\Carbon;

class CategoryController extends Controller
{

    public function index()
    {
        $category = Categories::all();
        return view('category.index', ['categorys' => $category]);
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $category = new Categories();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->created_by = 1;
        $category->created_at = Carbon::now();
        $category->save();
        
        return redirect('/category');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category = Categories::find($id);
         return view('category.edit', ['category' => $category]);
    }

    public function update(Request $request, $id)
    {
        $category = Categories::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->updated_by = 1;
        $category->updated_at = Carbon::now();
        $category->update();
        
        return redirect('/category');
    }

    public function destroy($id)
    {
        //
    }
}
