<?php

namespace App\Repositories;
use App\Models\SellerCarSale;
use Illuminate\Database\Eloquent\Model;
/*****************************************************************************
* Repository seller car status
****************************************************************************
* This is seller car status repository
*
**************************************************************************
* @author: Nguyen
****************************************************************************/
class SellerCarSaleRepository extends BaseRepository
{
    public function __construct(){
    	$this->model = new SellerCarSale();
    }

    public function getByCarSeller($p_id){
    	return $this->model->where([
		    		["seller_car_id","=",$p_id]
		    	])->first();
    }
}
