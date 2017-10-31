<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stock extends Model
{
    use SoftDeletes;

    protected $fillable = ['product_id','quantity'];


    public function products()
    {
        $this->belongsTo(Product::class);
    }
}