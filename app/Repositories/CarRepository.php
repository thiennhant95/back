<?php

namespace App\Repositories;
use App\Models\Car;
use Illuminate\Database\Eloquent\Model;
/*****************************************************************************
* Repository seller 
****************************************************************************
* This is seller car  repository
*
**************************************************************************
* @author: Nguyen
****************************************************************************/
class CarRepository extends BaseRepository
{
    public function __construct(){
    	$this->model = new Car();
    }
}
