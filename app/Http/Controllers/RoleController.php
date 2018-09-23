<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Roles;
use Carbon\Carbon;

class RoleController extends Controller
{
    public function index()
    {
        $role = Roles::all();
        return view('staff.role.index', ['roles' => $role]);
    }

    public function create()
    {
        return view('staff.role.create');
    }

    public function store(Request $request)
    {
        $role = new Roles();
        $role->name = $request->name;
        $role->description = $request->description;
        $role->created_by = 1;
        $role->created_at = Carbon::now();
        $role->save();

        return redirect('/role');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $role = Roles::find($id);
         return view('staff.role.edit', ['role' => $role]);
    }

    public function update(Request $request, $id)
    {
        $role = Roles::find($id);
        $role->name = $request->name;
        $role->description = $request->description;
        $role->updated_by = 1;
        $role->updated_at = Carbon::now();
        $role->update();
        
        return redirect('/role');
    }

    public function destroy($id)
    {
        $role = Roles::find($id);
        $role->delete();
        return redirect('/role');
    }
}
