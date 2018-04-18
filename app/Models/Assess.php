<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assess extends Model
{
    protected $table = "assess";
    public $timestamps = false;
    protected $fillable = ['id','name','contract_date','phonetic','zip_code','erea_id','municipality','address1','building_name1','phone1','phone2','fax','email1','email2','report_delivery_method','level','price','assessment_frequency','number_complain','remark','bank_name','bank_code','branch_name','branch_number','account_type','account_number','account_holder','expire_date','other_remark','gender','pw','address2','building_name2','corresponding_erea'];
}
