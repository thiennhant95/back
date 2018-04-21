<?php
namespace App\Repositories;
use App\Models\Zip;
/**
 ***************************************************************************
 * Repository Zone
 ***************************************************************************
 *
 * This is a repository to query Zone data
 *
 ***************************************************************************
 * @author: Nhan Viet Vang
 ***************************************************************************
 */
class ZipcodeRepository extends BaseRepository
{
    public function __construct(){
        $this->model = new Zip();
    }

    public function GetZipcode($name)
    {
        $query = $this->model->select("zip_code.*")->where('zip_code.name','=',$name)->first();
        return $query;
    }
}
?>