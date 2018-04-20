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
class OrderDetail extends Model
{
    protected $table = 'order_detail';
    public $timestamps = false;
    protected $fillable = [
        'seller_car_id',
		'trader_id',
		'name',
		'price',
		'remark',
		'status',
		'date'
    ];
}
