<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SellerCarReception extends Model
{
    protected $table = 'seller_car_reception';
    public $timestamps = false;
    protected $fillable = [
		'seller_car_id',
		'listing_number',
		'term_consent',
		'confirm_method',
		'producer_urged',
		'remark1',
		'minimum_recommend_price',
		'end_desired_date',
		'claim',
		'notify_certified_copy',
		'deletion_work',
		'remark2'
    ];
}
