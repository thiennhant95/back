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
	
    public static function validateSeller(Request $request){
        $arr_rule = [
            "email1" => "required"
        ];
        self::setRule($arr_rule);
        self::validate($request);

    }

}
