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

    public function GetZoneByName($name)
    {
    	$query = $this->model->select("zone.name")->join('erea', 'zone.id', '=', 'erea.zone_id')->where('erea.name','=',$name)->first();
    	return $query;
    }
}
?>