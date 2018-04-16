<?php

namespace App\ValidateRequest;

use Illuminate\Http\Request;
/*****************************************************************************
* Helper
****************************************************************************
* Executes the validate request, which is the superclass
*
**************************************************************************
* @author: Nguyen
****************************************************************************/

abstract class ValidateRequest
{
	protected static $arr_rule = [];
	protected function __construct(){
    	$this->arr_rule = [
    		'email' => 'email',
    		'email1' => 'email'
    	];
    }

   	public static function setRule($arr){
   		foreach ($arr as $key => $value) {
   			if(!isset(self::$arr_rule[$key])){
   				self::$arr_rule[$key] = "";
   			}else{
   				self::$arr_rule[$key] .= "|";
   			}
   			self::$arr_rule[$key] .= $value;
   		}
   	}

	public static function validate(Request $request){
		$request->validate(self::$arr_rule);
	}
}
