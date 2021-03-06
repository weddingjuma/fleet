<?php

namespace App\Http\Controllers;

use App\Http\Requests\PartyRequest;
use App\Party;
use Illuminate\Support\Facades\Session;

class PartyController extends Controller
{
    public function create(){
        return view('party.create');
    }

    public function index()
    {
        $parties = Party::all();
        return view('party.index',compact('parties'));
    }

    public function store(PartyRequest $request)
    {
        //dd($request->all());
        Party::query()->create($request->all());
        return redirect('parties');
    }

    public function edit($id)
    {
        $party = Party::query()->findOrFail($id);
        return view('party.edit',compact('party'));
    }

    public function update($id, PartyRequest $request)
    {
        $party = Party::query()->findOrFail($id);
        $party->update($request->all());
        Session::flash('success','"'.$party->name.'" is updated!');
        return redirect('parties');
    }

    public function destroy($id)
    {
        $party = Party::query()->findOrFail($id);
        $party->delete();
        Session::flash('success','"'.$party->name.'" has been deleted successfully!');
        return redirect('parties');
    }
}
