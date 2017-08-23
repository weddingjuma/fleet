<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status;
use Illuminate\Support\Facades\Session;

class StatusController extends Controller
{
    public function index()
    {
        $statuses = Status::all();
        return view('status.index',compact('statuses'));
    }

    public function store(Request $request)
    {
        Status::create($request->all());
        return redirect('statuses');
    }

    public function edit($id)
    {
        $statuses = Status::all();
        $status = Status::query()->findOrFail($id);
        return view('status.edit',compact('status','statuses'));
    }

    public function update($id, Request $request)
    {
        $status = Status::query()->findOrFail($id);
        $status->update($request->all());
        Session::flash('success','"'.$status->name.'" is updated!');
        return redirect('statuses');
    }

    public function destroy($id)
    {
        $status = Status::query()->findOrFail($id);
        $status->delete();
        Session::flash('success','"'.$status->name.'" has been deleted successfully!');
        return redirect('statuses');
    }
}
