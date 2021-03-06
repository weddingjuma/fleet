<?php
namespace App\Repositories;

use App\Driver;
use App\Employee;
use App\Party;
use App\Vehicle;

class ProgramRepository {

    public function vehicles(){
        //return Vehicle::all()->pluck('vehicleNo','id');
        return Vehicle::query()->where('status_id',2)->pluck('vehicleNo','id');
    }

    public function drivers(){
        return Driver::all()->pluck('name','id');
    }

    public function parties(){
        return Party::all()->pluck('name','id');
    }

    public function employees()
    {
        return Employee::all()->pluck('name','id');
    }


}