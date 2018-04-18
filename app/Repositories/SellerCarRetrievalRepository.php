<?php

namespace App\Repositories;
use App\Models\SellerCarRetrieval;
use Illuminate\Database\Eloquent\Model;
/*****************************************************************************
* Repository seller car 
****************************************************************************
* This is seller car  repository
*
**************************************************************************
* @author: Nguyen
****************************************************************************/
class SellerCarRetrievalRepository extends BaseRepository
{
    public function __construct(){
    	$this->model = new SellerCarRetrieval();
    }

    public function getByCarSeller($p_id){
    	return $this->model->where([
		    		["seller_car_id","=",$p_id]
		    	])->first();
    }
}
