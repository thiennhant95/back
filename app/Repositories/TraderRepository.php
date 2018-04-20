<?php
/**
 * Created by Nhan Viet Vang
 * Date: 04/17/2018
 * Time: 11:18 AM
 */

namespace App\Repositories;
use App\Models\Trader;
/**
 ***************************************************************************
 * Repository Erea
 ***************************************************************************
 *
 * This is a repository to query Erea data
 *
 ***************************************************************************
 * @author: Nhan Viet Vang JSC
 ***************************************************************************
 */
class TraderRepository extends BaseRepository
{
    public function __construct(){
        $this->model = new Trader();
    }

    public function GetTrader($trader_id)
    {
        return Trader::where('trader', $trader_id)->get();
    }

    /**
     * Function: getPaginateSortable
     * get list news with limit
     *
     * @param   Request   $request
     * @return  view _ return list of news
     *
     */
    public function getPaginateSortable($n)
    {
        return $this->model->sortable()->paginate($n);
    }
    /**
     ***************************************************************************
     * Created: 2018/04/17
     * Query Search Trader
     ***************************************************************************
     * @author: Nhan Viet Vang
     *
     ***************************************************************************
     */

    public function GetSearchTrader($search=array(),$n)
    {
        $name = '%'.$search['name'].'%';
        $phone_number = '%'.$search['phone_number'].'%';
        $email = '%'.$search['email'].'%';
        $status = '%'.$search['staff'].'%';
        $bring_assessment='%'.$search['bring_assessment'].'%';
        $assessment_classification='%'.$search['assessment_classification'].'%';
        $query = Trader::select('trader.*')
            ->where('trader.name','like',$name)
            ->where('phone','like',$phone_number)
            ->where('email','like',$email)
            ->where('member_status','like',$status)
        ;
        if ($assessment_classification!='')
        {
            $query=$query->where('assessment_classification','like',$assessment_classification);
        }
        if ($bring_assessment!='')
        {
            $query=$query->where('bring_asssessment','like',$bring_assessment);
        }
        if($search['pref_id'] != '')
        {
            $query = $query->where('erea_id','=',$search['pref_id']);
        }
        if (isset($search['bid_approval']))
        {
            $query =$query->where('bid_approval',$search['bid_approval']);
        }

        #search search service_date
        if ($search['service_start_date']!=null)
        {
            $query = $query->where('service_date', '>=', date("Y-m-d 00:00:00", strtotime($search['service_start_date'])));
        }

        if ($search['service_end_date']!=null)
        {
            $query = $query->where('service_date', '<=', date("Y-m-d 00:00:00", strtotime($search['service_end_date'])));
        }

        #search search curio_date
        if ($search['curio_start_date']!=null)
        {
            $query=$query->where('curio_date','>=',date("Y-m-d 00:00:00", strtotime($search['curio_start_date'])));
        }
        if ($search['curio_end_date']!=null)
        {
            $query=$query->where('curio_date','<=',date("Y-m-d 00:00:00", strtotime($search['curio_end_date'])));
        }

        #search excess

        if (isset($search['excess_deficit_money']) && $search['excess_deficit_money']==0)
        {
            $query=$query->where('excess_deficit money','0');
        }
        else if (isset($search['excess_deficit_money']) && $search['excess_deficit_money']==1)
        {
            $query=$query->where('excess_deficit money','!=','null');
        }
        $query = $query->paginate($n);
        return $query;
    }

    /**
     ***************************************************************************
     * Created: 2018/04/18
     * Query Sort Trader
     ***************************************************************************
     * @author: Nhan Viet Vang
     *
     ***************************************************************************
     */

    public function GetSort($column, $sort, $n)
    {
        $query =Trader::orderBy($column,$sort)->paginate($n);
        return $query;
    }
}
?>