<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SellerCarRefund extends Model
{
    protected $table = 'seller_car_refund';
    public $timestamps = false;
    protected $fillable = [
		'seller_car_id',
		'return_responsitory',
		'weight_tax_refund',
		'tax_date',
		'payment',
		'automobile_refund',
    ];
}
