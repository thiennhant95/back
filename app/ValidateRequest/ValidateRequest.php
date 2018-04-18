<?php

namespace App\ValidateRequest;

use Illuminate\Http\Request;
/*****************************************************************************
* Helper
****************************************************************************
* Executes the validate request, which is the baseclass
*
**************************************************************************
* @author: Nguyen
****************************************************************************/

abstract class ValidateRequest
{
	protected static $_arr_rule = [];
	protected function __construct(){
    	$this->_arr_rule = [
    		'email' => 'email',
    		'email1' => 'email',
    		'email2' => 'email',
    		'zip_code' => 'number'
    	];
    }

   	public static function setRule($p_arrRule){
   		foreach ($p_arrRule as $key => $value) {
   			if(!isset(self::$_arr_rule[$key])){
   				self::$_arr_rule[$key] = "";
   			}else{
   				self::$_arr_rule[$key] .= "|";
   			}
   			self::$_arr_rule[$key] .= $value;
   		}
   	}

	public static function validate(Request $request){
		$request->validate(self::$_arr_rule);
	}
}
