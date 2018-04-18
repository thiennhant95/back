<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
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
}
