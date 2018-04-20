<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/*****************************************************************************
* Model seller car document
****************************************************************************
* This is seller car document model
*
**************************************************************************
* @author: Nguyen
****************************************************************************/
class SellerCarDocument extends Model
{
    protected $table = 'seller_car_document';
    public $timestamps = false;
    protected $fillable = [
		'seller_car_id',
		'cancel_type',
		'shipment',
		'document_arrival',
		'condition',
		'vehicle_license',
		'insurance_card',
		'recycling_ticket',
		'seal_certificate',
		'transfer_certificate',
		'power_attorney',
		'resident_card',
		'inheritance',
		'license_plate',
		'remark',
		'deposite_confirm_form',
		'report_confirmation',
		'quo_card'
    ];
}
