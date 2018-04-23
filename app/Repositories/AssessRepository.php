<?php 
namespace App\Repositories;
use App\Models\Assess;
/**
***************************************************************************
* Repository Assess
***************************************************************************
*
* This is a repository to query Assess data
*
***************************************************************************
* @author: Duy
***************************************************************************
*/
class AssessRepository extends BaseRepository
{
	public function __construct(){
    	$this->model = new Assess();
    }

    /**
    ***************************************************************************
    * Created: 2018/04/16
    * Query Search Assess
    ***************************************************************************
    * @author: Duy
    * 
    ***************************************************************************
    */

    public function GetSearchAssess($photographer_cd=null,$name=null,$phone_number=null,$email=null,$erea_id=null,$address=null,$n)
    {
    	$name = '%'.$name.'%';
    	$phone_number = '%'.$phone_number.'%';
    	$email = '%'.$email.'%';
        $address = '%'.$address.'%';
    	$query = Assess::select('assess.*')->where('assess.name','like',$name)->where('phone1','like',$phone_number)->where('email1','like',$email)->where('address1','like',$address);
		if($photographer_cd != '')
    	{
    		$query = $query->where('assess.id','=',$photographer_cd);
    	}
    	if($erea_id != '')
    	{
    		$query = $query->where('erea_id','=',$erea_id);
    	}
    	$query = $query->paginate($n);
    	return $query;
    }

    /**
    ***************************************************************************
    * Created: 2018/04/16
    * Query Sort Assess
    ***************************************************************************
    * @author: Duy
    * 
    ***************************************************************************
    */

    public function GetSort($column, $sort, $n)
    {
    	$query = Assess::orderBy($column,$sort)->paginate($n);
    	return $query;
    }
}
?>