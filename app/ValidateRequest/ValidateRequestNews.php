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

class ValidateRequestNews extends ValidateRequest
{
	/*****************************************************************************
    * Created: 2018/04/23
    * Validate news page
    ***************************************************************************
    * @author: Nguyen. If get error, it returns an error message and stops.
    ****************************************************************************/
    public static function validateNews(Request $p_request){
        $arr_rule = [
            "data.title" => "required|max:100",
            "data.content" => "max:255",
            "data.category" => "required",
            "upfile" => "nullable|image|max:2048"
        ];
        self::setRule($arr_rule);
        self::validate($p_request);

    }
}
