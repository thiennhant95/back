<?php

namespace App\Repositories;
use App\Models\SellerCarReception;
use Illuminate\Database\Eloquent\Model;
/*****************************************************************************
* Repository seller car status
****************************************************************************
* This is seller car status repository
*
**************************************************************************
* @author: Nguyen
****************************************************************************/
class SellerCarReceptionRepository extends BaseRepository
{
    public function __construct(){
    	$this->model = new SellerCarReception();
    }

    public function getByCarSeller($p_id){
    	return $this->model->where([
		    		["seller_car_id","=",$p_id]
		    	])->first();
    }
}
