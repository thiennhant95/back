<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Trader extends Model
{
    use Sortable;
    protected $table = 'trader';
    public $timestamps = false;
    public $sortable = ['id','name','zip_code','address','phone','fax','member_status','credit','excess_deficit money','bring_assessment',
    'assessment_classification','bid_approval','complaint_count','claim_number','furigana_phone','service_date','curio_date','account_holder',
        'remark','remark1'
    ];
    protected $fillable = [
        'id','username','password','name','phonetic','zip_code','erea_id','address','phone','fax','building_name','destination_fax',
        'contact_name','furigana_name','furigana_phone','email','website','service_date','curio_date','remark','permit_number',
        'document_confirmation_date','remark','assessment_area','assessment_classification','assessment_level','assessment_price',
        'assessment_trip','remark1','member_status','remark2','bid_approval','service_classification','remark3','email_classification',
        'new_email','promotion_email_classification','promotion_email','business_email_classification','business_email','parent_company',
        'business_type','category','additional_correspondence','withdraw_method','number_transaction','complaint_count','claim_number',
        'remark5','remark6','remark7','payment_closing_date','customer_degree','method_statement','credit','deposite',
        'excess_deficit_money','bank_name','bank_code','branch_name','branch_code','account_type','account_number','account_holder','remark4',
        'bring_asssessment','bought_level','bought_price','bought_frequency','password'
        ];
}
