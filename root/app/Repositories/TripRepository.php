<?php
namespace App\Repositories;

use App\Program;

class TripRepository {

    public function programs($id){
//        dd($id);
        return Program::all()->pluck('serial','id');
    }
}