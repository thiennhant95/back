<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class SellerCarAssessment extends Model
{
	use Sortable;
    protected $table = 'seller_car_assessment';
    public $timestamps = false;
    public $sortable = ['situation', 'request_date', 'advance'];
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
    public function sellerCar()
    {
        return $this->belongsTo('App\Models\SellerCar', 'seller_car_id');
    }
}
