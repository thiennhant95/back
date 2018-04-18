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
}
?>