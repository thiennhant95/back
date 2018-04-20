<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SellerCarVariousCost extends Model
{
    protected $table = 'seller_car_various_cost';
    public $timestamps = false;
    protected $fillable = [
		'seller_car_id',
		'date',
		'classification',
		'remark',
		'commission'
    ];
}
