<?php

namespace App\Http\Controllers;

use App\Http\Requests\OwnerRequest;
use App\Owner;
use Illuminate\Support\Facades\Session;

class OwnerController extends Controller
{
    public function create(){
        return view('owner.create');
    }

    public function index()
    {
        $owners = Owner::all();
        return view('owner.index',compact('owners'));
    }

    public function store(OwnerRequest $request)
    {
        Owner::query()->create($request->all());
        return redirect('owners');
    }

    public function edit($id)
    {
        //$owners = Owner::all();
        $owner = Owner::query()->findOrFail($id);
        return view('owner.edit',compact('owner'));
    }

    public function update($id, OwnerRequest $request)
    {
        $owner = Owner::query()->findOrFail($id);
        $owner->update($request->all());
        Session::flash('success','"'.$owner->name.'" is updated!');
        return redirect('owners');
    }

    public function destroy($id)
    {
        $owner = Owner::query()->findOrFail($id);
        $owner->delete();
        Session::flash('success','"'.$owner->name.'" has been deleted successfully!');
        return redirect('owners');
    }

}
