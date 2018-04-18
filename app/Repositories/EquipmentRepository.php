<?php

namespace App\Repositories;
use App\Models\Equipment;
use Illuminate\Database\Eloquent\Model;
/*****************************************************************************
* Repository seller 
****************************************************************************
* This is seller car  repository
*
**************************************************************************
* @author: Nguyen
****************************************************************************/
class EquipmentRepository extends BaseRepository
{
    public function __construct(){
    	$this->model = new Equipment();
    }
}
