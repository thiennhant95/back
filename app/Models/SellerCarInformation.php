<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
/*****************************************************************************
* Model seller car document
****************************************************************************
* This is seller car document model
*
**************************************************************************
* @author: Nguyen
****************************************************************************/
class SellerCarInformation extends Model
{
	use Sortable;
    protected $table = 'seller_car_information';
    public $timestamps = false;
    public $sortable = ['car_name', 'car_year','mileage', 'displacement'];
    protected $fillable = [
		'seller_car_id',
		'car_name',
		'car_year',
		'classification',
		'purchase',
		'mileage',
		'inspection_date',
		'self_propelled1',
		'self_propelled2',
		'running_condition',
		't4_unic',
		'body_color',
		'displacement',
		'about_check',
		'engine_model',
		'turbo',
		'type',
		'ambiguous_check',
		'model_number',
		'category_number',
		'grade',
		'drive_system',
		'transmission',
		'speed',
		'fuel',
		'owner',
		'personal_check',
		'residence',
		'number_stamp',
		'balance_status',
		'delete_temp',
		'accident_repair',
		'written_guarantee',
		'record_book',
		'history',
		'smoking_status',
		'equipment_id',
		'air_condition',
		'remark',
		'number_door',
		'number_passenger',
		'condition',
		'state_interior',
		'state_other',
		'pr_points',
		'vehicle_number',
		'chassis_number',
		'remove_part'	
    ];
    public function sellerCar()
    {
        return $this->belongsTo('App\Models\SellerCar', 'seller_car_id');
    }
}
