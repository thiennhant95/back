<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SellerCarQuestion extends Model
{
    protected $table = 'seller_car_question';
    public $timestamps = false;
    protected $fillable = [
		'seller_car_id',
		'trader_id',
		'user_id',
		'name',
		'question',
		'date'
    ];
}
