<?php

namespace App\Helper;

use Illuminate\Http\Request;
use Carbon\Carbon;
use File;
/*****************************************************************************
* Helper
****************************************************************************
* This is Hepler file. Used to perform additional processing
*
**************************************************************************
* @author: Nguyen
****************************************************************************/

class FileHelper
{
	public static function saveImage(Request $p_request,$input,$type,$id){
		$file = $p_request->file($input);
		if($file == null){
			return null;
		}
		$extensionn = $file->getClientOriginalExtension();
		$name = $type."_".strtotime(Carbon::now())."_".$id.".".$extensionn;
		while(File::exists('images/img_kupac/'.$name)){
			$name = $type."_".strtotime(date())."_".$id.".".$extensionn;
		}
        $status = $file->move('images/img_kupac',$name);
        if($status == false)
        	return null;
        return 'images/img_kupac/'.$name;
	}

	public static function deleteImage($path){
		if(File::exists($path)) {
		    File::delete($path);
		}
	}
}
