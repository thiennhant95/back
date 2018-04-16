<?php 
namespace App\Repositories;
use App\Models\Zone;
/**
***************************************************************************
* Repository Zone
***************************************************************************
*
* This is a repository to query Zone data
*
***************************************************************************
* @author: Duy
***************************************************************************
*/
class ZoneRepository extends BaseRepository
{
	public function __construct(){
    	$this->model = new Zone();
    }

    public function GetZoneAll()
    {
    	return Zone::all();
    }
}
?>