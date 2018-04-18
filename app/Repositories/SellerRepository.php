<?php

namespace App\Repositories;
use App\Models\Seller;
use Illuminate\Database\Eloquent\Model;
/*****************************************************************************
* Repository seller 
****************************************************************************
* This is seller car  repository
*
**************************************************************************
* @author: Nguyen
****************************************************************************/
class SellerRepository extends BaseRepository
{
    public function __construct(){
    	$this->model = new Seller();
    }
}
