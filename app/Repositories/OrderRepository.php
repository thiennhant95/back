<?php

namespace App\Repositories;
use App\Models\Order;
use App\Models\SellerCar;
use App\Models\SellerCarInformation;
use App\Models\SellerCarReception;
use Illuminate\Database\Eloquent\Model;
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
    public function GetOrderIndex($n)
    {
    	$query = Order::select('order.id','order.seller_id','order.seller_car_id','seller.name','seller.erea_id')->join('seller','order.seller_id','=','seller.id')->paginate($n);
        return $query;
    }
    public function GetSellerCar($id)
    {
        $query = SellerCar::select('id')->where('seller_id',$id)->first();
        return $query;
    }
    public function GetInformationSellerCar($order_id)
    {
        $query = SellerCarInformation::select('seller_car_id','car_name','displacement','car_year','mileage')->where('id',$order_id)->get();
        return $query;
    }
    public function GetReceptionSellerCar($order_id)
    {
        $query = SellerCarReception::select('seller_car_id','end_desired_date')->where('id',$order_id)->get();
        return $query;
    }
    public function GetStatusSellerCar($order_id)
    {
        $query = SellerCarReception::select('seller_car_id','first_inquiry_date')->where('id',$order_id)->get();
        return $query;
    }
    public function getByCarSeller($p_id){
    	return $this->model->where([
		    		["seller_car_id","=",$p_id]
		    	])->first();
    }
}
