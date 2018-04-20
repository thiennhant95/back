<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SellerCarAssessment extends Model
{
    protected $table = 'seller_car_assessment';
    public $timestamps = false;
    protected $fillable = [
		'seller_car_id',
		'advance',
		'advance_method',
		'place',
		'place_map',
		'situation',
		'advance_date1',
		'advance_date2',
		'advance_date3',
		'remark1',
		'candidate_list',
		'assessor1',
		'assessor_id',
		'request_date',
		'assessor2',
		'arrival_date',
		'complete_confirmation',
		'table_img',
		'synthetic',
		'exterior',
		'interior',
		'comment',
		'rater',
		'remark2'
    ];
}
