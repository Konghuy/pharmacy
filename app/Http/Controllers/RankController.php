<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rank;
use Carbon\Carbon;

class RankController extends Controller
{
    public function index()
    {
        $ranks = Rank::all();
        return view('rank.index', ['ranks' => $ranks]);
    }

    public function create()
    {
        return view('rank.create');
    }

    public function store(Request $request)
    {
        $rank = new Rank();
        $rank->name = $request->name;
        $rank->description = $request->description;
        $rank->created_by = 1;
        $rank->created_at = Carbon::now();
        $rank->save();

        return redirect('/rank');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $rank = Rank::find($id);
         return view('rank.edit', ['rank' => $rank]);
    }

    public function update(Request $request, $id)
    {
        $rank = Rank::find($id);
        $rank->name = $request->name;
        $rank->description = $request->description;
        $rank->updated_by = 1;
        $rank->updated_at = Carbon::now();
        $rank->update();
        
        return redirect('/rank');
    }

    public function destroy($id)
    {
        //
    }
}
