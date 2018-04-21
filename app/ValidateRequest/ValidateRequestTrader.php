<?php

namespace App\ValidateRequest;
use Illuminate\Http\Request;
/*****************************************************************************
 * ValidateRequestAssess
 ****************************************************************************
 *
 *
 **************************************************************************
 * @author: Nhan Viet Vang
 ****************************************************************************/

class ValidateRequestTrader extends ValidateRequest
{

    public static function validateTrader(Request $request){
        #get data input
        $data = $request->input('data');
        $arr_rule = [
            'data.trader.name'=>'required',
            'data.trader.phone_number'=>'required|numeric|min:8',
            'data.trader.pref_id'=>'required',
            'data.trader.address'=>'required',
            'data.trader.zip_code'=>'required',
            'data.trader.fax_number'=>'required|numeric|min:8',
            'data.trader.email'=>'required|email',
            'data.trader.website'=>'required|url',
            'data.trader.service_date'=>'required|date',
            'data.trader.curio_date'=>'required|date',
            'data.trader.new_email'=>'required|email',
            'data.trader.promotion_email'=>'required|email',
            'data.trader.business_email'=>'required|email',
            'data.trader.business_type'=>'required',
            'data.trader.withdraw_method'=>'required',
            'data.trader.payment_closing_date'=>'required',
            'data.trader.customer_degree'=>'required',
            'data.trader.method_statement'=>'required',
            'data.trader.document_confirmation_date'=>'required',
//            'data.trader.assessment_price'=>'regex:/^\d*(\.\d{2})?$/',
//            'data.trader.bought_price'=>'regex:/^\d*(\.\d{2})?$/'
            ];
        self::setRule($arr_rule);
        self::validate($request);

    }
}
