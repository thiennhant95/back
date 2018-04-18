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
    protected $table = 'seller';
    public $timestamps = false;
    protected $fillable = [
        'seller_code',
		'name',
		'kana_name',
		'erea_id',
		'zip_code',
		'address',
		'age',
		'email1',
		'email2',
		'building_number',
		'municipality',
		'participant',
		'phone1',
		'phone2',
		'phone3',
		'phone4',
		'phone_home1',
		'phone_home2',
		'phone_home3',
		'phone_home4',
		'phone_check1',
		'phone_check2',
		'phone_check3',
		'phone_check4',
		'fax',
		'career',
		'gender',
		'license',
		'license_img',
		'delivery_email',
		'register_date',
		'bank_name',
		'bank_code',
		'branch_name',
		'branch_number',
		'account_type',
		'account_number',
		'account_holder',
		'transfer_status',
		'is_contact',
    ];
}
