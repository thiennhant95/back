<?php

namespace App\Repositories;
use App\Models\SellerCarEquipment;
use Illuminate\Database\Eloquent\Model;
/*****************************************************************************
* Repository seller 
****************************************************************************
* This is seller car  repository
*
**************************************************************************
* @author: Nguyen
****************************************************************************/
class SellerCarEquipmentRepository extends BaseRepository
{
    public function __construct(){
    	$this->model = new SellerCarEquipment();
    }
     public function getByCarSeller($p_id){
    	return $this->model->where([
		    		["seller_car_id","=",$p_id]
		    	])->get();
    }
}
