<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SellerCarSale extends Model
{
    protected $table = 'seller_car_sale';
    public $timestamps = false;
    protected $fillable = [
		'seller_car_id',
		'sale_date',
		'accounting_method',
		'amount',
		'body_price',
		'recycling_fee',
		'bid_fee',
		'refund_fee',
		'delete_agent_cost',
		'final_charge_amount',
		'destination',
		'distributor_name',
		'part_number',
		'remark1',
		'deducion_amount',
		'deposite_due_date',
		'receivable_date',
		'billing_date',
		'golden_date',
		'established_amount',
		'payment_deadline',
		'last_account_date',
		'clothing_date',
		'remark2',
		'determine_amount',
		'remark3',
		'deposite_situation'

    ];
}
