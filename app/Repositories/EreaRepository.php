<?php
namespace App\Repositories;
use App\Models\Erea;
/**
 ***************************************************************************
 * Repository Erea
 ***************************************************************************
 *
 * This is a repository to query Erea data
 *
 ***************************************************************************
 * @author: Duy
 ***************************************************************************
 */
class EreaRepository extends BaseRepository
{
    public function __construct(){
        $this->model = new Erea();
    }

    public function GetZoneErea($zone_id)
    {
        return Erea::where('zone_id', $zone_id)->get();
    }

    public function getByGroupByZone(){
    	$data = Erea::join('zone','erea.zone_id',"=","zone.id")
    			->select('erea.*','zone.name AS zone_name')
    			->get();
    	$result = array();
    	foreach ($data as $key => $value) {
    		if(!isset($result[$value->zone_id])){
    			$result[$value->zone_id]['zone_name'] = $value->zone_name;
    			$result[$value->zone_id]['data'] = array();
    		}
    		array_push($result[$value->zone_id]['data'], $value);
    	}
    	return $result;
    }
}
?>