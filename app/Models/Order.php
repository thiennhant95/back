<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/*****************************************************************************
* Model order
****************************************************************************
* This is order model
*
**************************************************************************
* @author: Nguyen
****************************************************************************/
class Order extends Model
{
    protected $table = 'order';
    public $timestamps = false;
    protected $fillable = [
        'seller_id',
		'trader_id',
		'seller_car_id',
		'asking_price',
		'step_price',
		'evaluation_points',
		'listing_number',
		'number_bidder',
		'document',
		'recycling_fee',
		'deadline',
		'status',
		'user_id',
		'remark',
		'date'
    ];
}
