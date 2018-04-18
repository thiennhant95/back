<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SellerCarRetrieval extends Model
{
    protected $table = 'seller_car_retrieval';
    public $timestamps = false;
    protected $fillable = [
		'seller_car_id',
		'first_date',
		'first_date_check',
		'second_date',
		'second_date_check',
		'third_date',
		'third_date_check',
		'pending_schedule',
		'takeover_place',
		'availability',
		'receiving_dismantling',
		'company_code',
		'remark',
		'number_cut',
		'end_recognition_day',
		'end_quotation'
    ];
}
