<?php

namespace App\ValidateRequest;

use Illuminate\Http\Request;
/*****************************************************************************
* ValidateRequestAssess
****************************************************************************
*
*
**************************************************************************
* @author: Duy
****************************************************************************/

class ValidateRequestAssess extends ValidateRequest
{
	
    public static function validateAssess(Request $request){
        $arr_rule = [
            'data.photographer.id'=>'required',
            'data.photographer.family_name'=>'required',
            'data.photographer.pw'=>'required',
            'data.photographer.contract_date'=>'required|date',
            'data.photographer.zip_code'=>'required',
            'data.photographer.pref_id'=>'required',
            'data.photographer.address1'=>'required',
            'data.photographer.phone_number1'=>'required',
            'data.photographer.email1'=>'required|email',
            'data.photographer.email2'=>'required|email',
            'data.photographer.report_method'=>'required',
            'data.photographer.gender'=>'required',
            'data.photographer.rank'=>'required',
            'data.photographer.price'=>'required',
            'data.photographer.assessment_frequency'=>'required',
            'data.photographer.bank'=>'required',
            'data.photographer.bank_code'=>'required',
            'data.photographer.expiration_date'=>'required|date'
        ];
        self::setRule($arr_rule);
        self::validate($request);

    }
}
