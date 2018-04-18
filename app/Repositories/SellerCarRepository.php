<?php

namespace App\Repositories;
use App\Models\SellerCar;
use Illuminate\Database\Eloquent\Model;
/*****************************************************************************
* Repository seller car 
****************************************************************************
* This is seller car  repository
*
**************************************************************************
* @author: Nguyen
****************************************************************************/
class SellerCarRepository extends BaseRepository
{
    public function __construct(){
    	$this->model = new SellerCar();
    }
}
