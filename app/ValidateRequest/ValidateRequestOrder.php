<?php

namespace App\ValidateRequest;

use Illuminate\Http\Request;
/*****************************************************************************
* ValidateRequestOrder
****************************************************************************
* Validate every block in order_detail.
*
**************************************************************************
* @author: Nguyen
****************************************************************************/

class ValidateRequestOrder extends ValidateRequest
{
	
    public static function validateSeller(Request $p_request){
        $arr_rule = [
            
        ];
        self::setRule($arr_rule);
        self::validate($p_request);

    }

    public static function validateStatus(Request $p_request){
        $arr_rule = [
            
        ];
        self::setRule($arr_rule);
        self::validate($p_request);

    }

    public static function validateDocument(Request $p_request){
        $arr_rule = [
            
        ];
        self::setRule($arr_rule);
        self::validate($p_request);

    }

    public static function validateAccount(Request $p_request){
        $arr_rule = [
            
        ];
        self::setRule($arr_rule);
        self::validate($p_request);

    }

    public static function validateInformation(Request $p_request){
        $arr_rule = [
            
        ];
        self::setRule($arr_rule);
        self::validate($p_request);

    }

    public static function validateHistory(Request $p_request){
        $arr_rule = [
            
        ];
        self::setRule($arr_rule);
        self::validate($p_request);

    }

     public static function validateRetrieval(Request $p_request){
        $arr_rule = [
            
        ];
        self::setRule($arr_rule);
        self::validate($p_request);

    }
    
}
