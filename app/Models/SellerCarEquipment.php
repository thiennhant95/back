<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SellerCarEquipment extends Model
{
    protected $table = 'seller_car_equipment';
    public $timestamps = false;
    protected $fillable = [
		'seller_car_id',
		'equipment_id',
		'status'
    ];
}
