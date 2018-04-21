<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
/*****************************************************************************
* Model seller car status
****************************************************************************
* This is seler car model model
*
**************************************************************************
* @author: Nguyen
****************************************************************************/
class SellerCarStatus extends Model
{
    protected $table = 'seller_car_status';
    public $timestamps = false;
    public $sortable = ['re_tel_date', 'first_inquiry_date', 'listing_accuracy', 'tel_number_again'];
    protected $fillable = [
		'seller_car_id',
		'first_inquiry_date',
		'status',
		'listing_accuracy',
		're_tel_date',
		'tel_number_again',
		'pursuit',
		'offer_presentation',
		'campaign',
		'word_preparation'
    ];
    public function sellerCar()
    {
        return $this->belongsTo('App\Models\SellerCar', 'seller_car_id');
    }
}
