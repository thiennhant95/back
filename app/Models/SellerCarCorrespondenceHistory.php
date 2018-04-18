<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SellerCarCorrespondenceHistory extends Model
{
    protected $table = 'seller_car_correspondence_history';
    public $timestamps = false;
    protected $fillable = [
		'seller_car_id',
		'type',
		'name',
		'content',
		'date'
    ];
}
