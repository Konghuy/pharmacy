<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Packages;
use Carbon\Carbon;

class PackageController extends Controller
{

    public function index()
    {
        $packages = Packages::all();
        return view('package.index', ['packages' => $packages]);
    }

    public function create()
    {
        return view('package.create');
    }

    public function store(Request $request)
    {
        $package = new Packages();
        $package->name = $request->title;
        $package->description = $request->description;
        $package->created_by = 1;
        $package->created_at = Carbon::now();
        $package->save();
    
        return redirect('/package');
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
