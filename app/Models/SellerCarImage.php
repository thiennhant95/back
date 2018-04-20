<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SellerCarImage extends Model
{
    protected $table = 'seller_car_image';
    public $timestamps = false;
    protected $fillable = [
		'seller_car_id',
		'url',
		'name',
		'index'
    ];
}
