<?php

namespace App\Repositories;
use App\Models\Order;
use App\Models\SellerCar;
use App\Models\SellerCarInformation;
use App\Models\SellerCarReception;
use Illuminate\Database\Eloquent\Model;
use DB;
/*****************************************************************************
* Repository order
****************************************************************************
* This is order repository
*
**************************************************************************
* @author: Nguyen
****************************************************************************/
class OrderRepository extends BaseRepository
{
    public function __construct(){
    	$this->model = new Order();
    }

    public function GetInfoOrder($n)
    {
        $query = SellerCar::select('order.id','seller.name','seller.erea_id','seller_car_information.car_name','seller_car_information.displacement','seller_car_information.car_year','seller_car_information.mileage','seller_car_reception.end_desired_date','seller_car_sale.refund_fee','seller_car_refund.weight_tax_refund','seller_car_status.first_inquiry_date','seller_car_retrieval.first_date','seller_car_sale.destination','seller_car_sale.final_charge_amount','order.deadline','seller_car_sale.deposite_due_date','seller_car.document_register_date','seller_car_sale.receivable_date','seller_car.id as seller_car','seller_car.minimum_recommend_price')
        ->join('order','seller_car.id','=','order.seller_car_id')
        ->leftJoin('seller','order.seller_id','=','seller.id')
        ->join('seller_car_information','seller_car.id','=','seller_car_information.seller_car_id')
        ->join('seller_car_status','seller_car.id','=','seller_car_status.seller_car_id')
        ->join('seller_car_reception','seller_car.id','=','seller_car_reception.seller_car_id')
        ->join('seller_car_sale','seller_car.id','=','seller_car_sale.seller_car_id')
        ->join('seller_car_refund','seller_car.id','=','seller_car_refund.seller_car_id')
        ->join('seller_car_retrieval','seller_car.id','=','seller_car_retrieval.seller_car_id')
        ->paginate($n);
        return $query;
    }

    public function GetSearchOrder($id=null,$name = null,$phone_number = null,$car_name = null,$s_end_desired_date = null, $e_end_desired_date = null,$millage = null, $pref_name = null, $s_deadline = null, $e_deadline = null,$displacement = null, $destination = null, $s_deposite = null, $e_deposite = null, $s_receive_date = null, $e_receive_date = null,$n)
    {
        $name = '%'.$name.'%';
        $phone_number = '%'.$phone_number.'%';
        $car_name = '%'.$car_name.'%';
        $query = SellerCar::select('order.id','seller.name','seller.erea_id','seller_car_information.car_name','seller_car_information.displacement','seller_car_information.car_year','seller_car_information.mileage','seller_car_reception.end_desired_date','seller_car_sale.refund_fee','seller_car_refund.weight_tax_refund','seller_car_status.first_inquiry_date','seller_car_retrieval.first_date','seller_car_sale.destination','seller_car_sale.final_charge_amount','order.deadline','seller_car_sale.deposite_due_date','seller_car.document_register_date','seller_car_sale.receivable_date','seller_car.id as seller_car','seller_car.minimum_recommend_price')
        ->join('order','seller_car.id','=','order.seller_car_id')
        ->leftJoin('seller','order.seller_id','=','seller.id')
        ->join('seller_car_information','seller_car.id','=','seller_car_information.seller_car_id')
        ->join('seller_car_status','seller_car.id','=','seller_car_status.seller_car_id')
        ->join('seller_car_reception','seller_car.id','=','seller_car_reception.seller_car_id')
        ->join('seller_car_sale','seller_car.id','=','seller_car_sale.seller_car_id')
        ->join('seller_car_refund','seller_car.id','=','seller_car_refund.seller_car_id')
        ->join('seller_car_retrieval','seller_car.id','=','seller_car_retrieval.seller_car_id')
        ->where('seller.name','like',$name)
        ->where('seller.phone1','like',$phone_number)
        ->where('seller_car_information.car_name','like',$car_name);
        if($s_end_desired_date != null)
        {
            $query = $query->where('seller_car_reception.end_desired_date','>=', date('Y-m-d',strtotime($s_end_desired_date)));
        }
        if($s_end_desired_date != null)
        {
            $query = $query->where('seller_car_reception.end_desired_date','<=', date('Y-m-d',strtotime($e_end_desired_date)));
        }
        if($id != '')
        {
            $query = $query->where('order.id','=',$id);
        }
        if($millage != '')
        {
            $query = $query->where('seller_car_information.mileage','=',$millage);
        }
        if($pref_name != '')
        {
            $query = $query->where('seller.erea_id','=',$pref_name);
        }
        if($s_deadline != '')
        {
            $query = $query->where('order.deadline','>=',$s_deadline);
        }
        if($e_deadline != '')
        {
            $query = $query->where('order.deadline','<=',$e_deadline);
        }
        if($displacement != '')
        {
            $query = $query->where('seller_car_information.displacement','=',$displacement);
        }
        if($destination != '')
        {
            $query = $query->where('seller_car_sale.destination','=',$destination);
        }
        if($s_deposite != '')
        {
            $query = $query->where('seller_car_sale.deposite_due_date','>=',$s_deposite);
        }
        if($e_deposite != '')
        {
            $query = $query->where('seller_car_sale.deposite_due_date','<=',$e_deposite);
        }
        if($s_receive_date != '')
        {
            $query = $query->where('seller_car_sale.receivable_date','>=',$s_receive_date);
        }
        if($e_receive_date != '')
        {
            $query = $query->where('seller_car_sale.receivable_date','<=',$e_receive_date);
        }
        $query = $query->paginate($n);
        return $query;
    }

    public function GetSort($column, $sort, $n)
    {
        $query = SellerCar::select('order.id','seller.name','seller.erea_id','seller_car_information.car_name','seller_car_information.displacement','seller_car_information.car_year','seller_car_information.mileage','seller_car_reception.end_desired_date','seller_car_sale.refund_fee','seller_car_refund.weight_tax_refund','seller_car_status.first_inquiry_date','seller_car_retrieval.first_date','seller_car_sale.destination','seller_car_sale.final_charge_amount','order.deadline','seller_car_sale.deposite_due_date','seller_car.document_register_date','seller_car_sale.receivable_date','seller_car.id as seller_car','seller_car.minimum_recommend_price')
        ->join('order','seller_car.id','=','order.seller_car_id')
        ->leftJoin('seller','order.seller_id','=','seller.id')
        ->join('seller_car_information','seller_car.id','=','seller_car_information.seller_car_id')
        ->join('seller_car_status','seller_car.id','=','seller_car_status.seller_car_id')
        ->join('seller_car_reception','seller_car.id','=','seller_car_reception.seller_car_id')
        ->join('seller_car_sale','seller_car.id','=','seller_car_sale.seller_car_id')
        ->join('seller_car_refund','seller_car.id','=','seller_car_refund.seller_car_id')
        ->join('seller_car_retrieval','seller_car.id','=','seller_car_retrieval.seller_car_id')
        ->orderBy($column,$sort)->paginate($n);
        return $query;
    }

    public function GetCountOrder($id)
    {
        $query = SellerCar::join('order_detail','seller_car.id','=','order_detail.seller_car_id')->where('seller_car.id','=',$id)->count('order_detail.seller_car_id');
        return $query;
    }

    public function GetMaxPriceOrder($id)
    {
        $query = SellerCar::join('order_detail','seller_car.id','=','order_detail.seller_car_id')->where('seller_car.id','=',$id)->max('order_detail.price');
        return $query;
    }

    public function GetVariousCost($id)
    {
        $query = SellerCar::rightJoin('seller_car_various_cost','seller_car.id','=','seller_car_various_cost.seller_car_id')->where('seller_car.id','=',$id)->orderBy('seller_car.id','desc')->first();
        return $query;
    }

    public function GetSeller()
    {
        $query = SellerCar::all();
        return $query;
    }
    public function getByCarSeller($p_id){
        return $this->model->where([
                    ["seller_car_id","=",$p_id]
                ])->first();
    }
}
