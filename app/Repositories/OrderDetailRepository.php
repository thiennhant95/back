<?php

namespace App\Repositories;
use App\Models\OrderDetail;
use Illuminate\Database\Eloquent\Model;
/*****************************************************************************
* Repository order detail
****************************************************************************
* This is seller car  repository
*
**************************************************************************
* @author: Nguyen
****************************************************************************/
class OrderDetailRepository extends BaseRepository
{
    public function __construct(){
    	$this->model = new OrderDetail();
    }

    public function getByCarSeller($p_id){
    	return $this->model->where([
		    		["seller_car_id","=",$p_id]
		    	])->get();
    }
}
