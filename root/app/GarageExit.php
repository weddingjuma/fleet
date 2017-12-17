<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GarageExit extends Model
{
    use SoftDeletes;

    protected $fillable = ['date','vehicle_id','employee_id','description'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * A garage entry is belongs to vehicle
     */
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}