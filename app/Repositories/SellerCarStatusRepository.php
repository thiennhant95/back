<?php

namespace App\Repositories;
use App\Models\SellerCarStatus;
use Illuminate\Database\Eloquent\Model;
/*****************************************************************************
* Repository seller car status
****************************************************************************
* This is seller car status repository
*
**************************************************************************
* @author: Nguyen
****************************************************************************/
class SellerCarStatusRepository extends BaseRepository
{
    public function __construct(){
    	$this->model = new SellerCarStatus();
    }

    public function getByCarSeller($p_id){
    	return $this->model->where([
		    		["seller_car_id","=",$p_id]
		    	])->first();
    }
}
