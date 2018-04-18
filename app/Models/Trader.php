<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trader extends Model
{
    protected $table = 'trader';
    public $timestamps = false;
    protected $fillable = [
        'id','username','password','name','phonetic','zip_code','erea_id','address','phone','fax','building_name','destination_fax',
        'contact_name','furigana_name','furigana_phone','email','website','service_date','curio_date','remark','permit_number',
        'document_confirmation_date','remark','assessment_area','assessment_classification','assessment_level','assessment_price',
        'assessment_trip','remark1','member_status','remark2','bid_approval','service_classification','remark3','email_classification',
        'new_email','promotion_email_classification','promotion_email','business_email_classification','business_email','parent_company',
        'business_type','category','additional_correspondence','withdraw_method','number_transaction','complaint_count','claim_number',
        'remark5','remark6','remark7','payment_closing_date','customer_degree','method_statement','credit','deposite',
        'excess_deficit money','bank_name','bank_code','branch_name','branch_code','account_type','account_number','account_holder'
        ];

}
