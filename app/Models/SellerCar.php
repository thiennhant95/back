<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/*****************************************************************************
* Model seller car
****************************************************************************
* This is car model
*
**************************************************************************
* @author: Nguyen
****************************************************************************/
class SellerCar extends Model
{
    protected $table = 'seller_car';
    public $timestamps = false;
    protected $fillable = [
		'seller_id',
		'assess_id',
		'car_id',
		'municipality',
		'type',
		'grade',
		'mileage',
		'displacement',
		'chassis_number',
		'driving_condition_remark',
		'smoking_status',
		'drive_system',
		'engine_model',
		'model_number',
		'partition_number',
		'transmission',
		'handle',
		'riding_capacity',
		'fuel',
		'accidents',
		'vehicle_number',
		'recycling_fee',
		'warranty_card',
		'check_record_book',
		'car_history',
		'equipment_remark',
		'exterior_condition',
		'interior_condition1',
		'interior_condition2',
		'remark',
		'evaluation_points',
		'car_verification_url',
		'car_information_url',
		'minimum_recommend_price',
		'start_time',
		'for_business_trip',
		'for_carry_on',
		'first_desired_date',
		'second_desired_date',
		'third_desired_date',
		'meter_replacement',
		'takeover_place',
		'deposite_status',
		'inspection_photo',
		'inspection_register_date',
		'document_photo',
		'document_register_date'
    ];
}
