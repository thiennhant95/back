<?php

namespace App\Repositories;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
/*****************************************************************************
* Repository order
****************************************************************************
* This is order repository
*
**************************************************************************
* @author: Nguyen
****************************************************************************/
class OrderRepository extends BaseRepository
{
    public function __construct(){
    	$this->model = new Order();
    }
}
