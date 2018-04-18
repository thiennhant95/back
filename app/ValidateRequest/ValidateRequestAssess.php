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
            
        ];
        self::setRule($arr_rule);
        self::validate($request);

    }
}
