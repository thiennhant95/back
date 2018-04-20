<?php

namespace App\Repositories;
use App\Models\SellerCarRefund;
use Illuminate\Database\Eloquent\Model;
/*****************************************************************************
* Repository seller car status
****************************************************************************
* This is seller car status repository
*
**************************************************************************
* @author: Nguyen
****************************************************************************/
class SellerCarRefundRepository extends BaseRepository
{
    public function __construct(){
    	$this->model = new SellerCarRefund();
    }

    public function getByCarSeller($p_id){
    	return $this->model->where([
		    		["seller_car_id","=",$p_id]
		    	])->first();
    }
}
