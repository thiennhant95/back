<?php

namespace App\Repositories;
use App\Models\Maker;
use Illuminate\Database\Eloquent\Model;
/*****************************************************************************
* Repository seller 
****************************************************************************
* This is seller car  repository
*
**************************************************************************
* @author: Nguyen
****************************************************************************/
class MakerRepository extends BaseRepository
{
    public function __construct(){
    	$this->model = new Maker();
    }
}
