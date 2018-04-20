<?php

namespace App\Repositories;
use App\Models\SellerCarImage;
use Illuminate\Database\Eloquent\Model;
/*****************************************************************************
* Repository seller car document
****************************************************************************
* This is seller car document repository
*
**************************************************************************
* @author: Nguyen
****************************************************************************/
class SellerCarImageRepository extends BaseRepository
{
    public function __construct(){
    	$this->model = new SellerCarImage();
    }

    public function getByCarSeller($p_id){
    	return $this->model->where([
		    		["seller_car_id","=",$p_id]
		    	])->get();
    }
}