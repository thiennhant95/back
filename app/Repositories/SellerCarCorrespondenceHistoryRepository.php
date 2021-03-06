<?php

namespace App\Repositories;
use App\Models\SellerCarCorrespondenceHistory;
use Illuminate\Database\Eloquent\Model;
/*****************************************************************************
* Repository seller car document
****************************************************************************
* This is seller car document repository
*
**************************************************************************
* @author: Nguyen
****************************************************************************/
class SellerCarCorrespondenceHistoryRepository extends BaseRepository
{
    public function __construct(){
    	$this->model = new SellerCarCorrespondenceHistory();
    }

    public function getByCarSeller($p_id){
    	return $this->model->where([
		    		["seller_car_id","=",$p_id]
		    	])->get();
    }
}
