<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ValidateRequest\ValidateRequestOrder;
use App\Repositories\SellerRepository;
use App\Repositories\SellerCarRepository;
use App\Repositories\SellerCarStatusRepository;
use App\Repositories\SellerCarDocumentRepository;
use App\Repositories\SellerCarInformationRepository;
use App\Repositories\SellerCarEquipmentRepository;
use App\Repositories\SellerCarCorrespondenceHistoryRepository;
use App\Repositories\SellerCarReceptionRepository;
use App\Repositories\SellerCarQuestionRepository;
use App\Repositories\SellerCarVariousCostRepository;
use App\Repositories\SellerCarRefundRepository;
use App\Repositories\MakerRepository;
use App\Repositories\CarRepository;
use App\Repositories\EquipmentRepository;
use App\Repositories\SellerCarRetrievalRepository;
use App\Repositories\SellerCarSaleRepository;
use App\Repositories\SellerCarAssessmentRepository;
use App\Repositories\SellerCarImageRepository;
use App\Repositories\OrderRepository;
use App\Repositories\OrderDetailRepository;
use Carbon\Carbon;
use App\Repositories\EreaRepository;
/*****************************************************************************
* Controller order
****************************************************************************
* This is a controller management order
*
**************************************************************************
* @author: Nguyen
****************************************************************************/

class OrderController extends Controller
{
	protected  $sellerRepository;
	public function __construct()
    {
        $this->sellerRepository = new SellerRepository();
        $this->sellerCarStatusRepository = new SellerCarStatusRepository();
        $this->sellerCarDocumentRepository = new SellerCarDocumentRepository();
        $this->sellerCarInformationRepository = new SellerCarInformationRepository();
        $this->sellerCarEquipmentRepository = new SellerCarEquipmentRepository();
        $this->sellerCarCorrespondenceHistory = new SellerCarCorrespondenceHistoryRepository();
        $this->sellerCarRetrievalRepository = new SellerCarRetrievalRepository();
        $this->sellerCarReceptionRepository = new SellerCarReceptionRepository();
        $this->sellerCarQuestionRepository = new SellerCarQuestionRepository();
        $this->sellerCarVariousCostRepository = new SellerCarVariousCostRepository();
        $this->sellerCarSaleRepository = new SellerCarSaleRepository();
        $this->sellerCarRefundRepository = new SellerCarRefundRepository();
        $this->sellerCarRepository = new SellerCarRepository();
        $this->sellerCarAssessmentRepository = new SellerCarAssessmentRepository();
        $this->sellerCarImageRepository = new SellerCarImageRepository();
        $this->sellerCarVariousCostRepository = new SellerCarVariousCostRepository();
        $this->orderRepository = new OrderRepository();
        $this->orderDetailRepository = new OrderDetailRepository();
        $this->carRepository = new CarRepository();
        $this->makerRepository = new MakerRepository();
        $this->equipmentRepository = new EquipmentRepository();
        $this->ereaRepository = new EreaRepository();
        //duy
        $this->orderRepository = new OrderRepository();
    }


    /*****************************************************************************
    * Created: 2018/04/13* View order detail
    ***************************************************************************
    * @author: Nguyen
    ****************************************************************************/
    public function orderDetail(Request $p_request){
        $id = $p_request->input("id");
        $sellerCar = $this->sellerCarRepository->getById($id);
        if($sellerCar == null){
            return redirect('order');;
        }
        $data['sellerCar'] = $sellerCar;
    	$seller = $this->sellerRepository->getById($sellerCar->seller_id);
    	$data['seller'] = $seller;
        $status = $this->sellerCarStatusRepository->getByCarSeller($id);
        $status->pursuit = explode(',',$status->pursuit);
        if(count($status->pursuit) < 3){
            $status->pursuit = array();
            $status->pursuit = array_prepend ($status->pursuit, 0);
            $status->pursuit = array_prepend ($status->pursuit, 0);
            $status->pursuit = array_prepend ($status->pursuit, 0);
        }
        $data['status'] = $status;
        $document = $this->sellerCarDocumentRepository->getByCarSeller($id);
        $data['document'] = $document;
        $information = $this->sellerCarInformationRepository->getByCarSeller($id);
        $information->self_propelled2 = explode(',',$information->self_propelled2);
        if(count($information->self_propelled2) != 8){
            $information->self_propelled2 = array();
            $information->self_propelled2 = array_prepend ($information->self_propelled2, 0);
            $information->self_propelled2 = array_prepend ($information->self_propelled2, 0);
            $information->self_propelled2 = array_prepend ($information->self_propelled2, 0);
            $information->self_propelled2 = array_prepend ($information->self_propelled2, 0);
            $information->self_propelled2 = array_prepend ($information->self_propelled2, 0);
            $information->self_propelled2 = array_prepend ($information->self_propelled2, 0);
            $information->self_propelled2 = array_prepend ($information->self_propelled2, 0);
            $information->self_propelled2 = array_prepend ($information->self_propelled2, 0);

        }
        $information->car_year = explode(',', $information->car_year);
        if(count($information->car_year) != 3){
            $information->car_year = array();
            $information->car_year = array_prepend ($information->car_year, 'H');
            $information->car_year = array_prepend ($information->car_year, '');
            $information->car_year = array_prepend ($information->car_year, '');
        }
        $information->car_year_type = $information->car_year[0];
        $information->car_month = $information->car_year[2];
        $information->car_year = $information->car_year[1];
        $information->inspection_date = explode(',', $information->inspection_date);
        if(count($information->inspection_date) != 4){
            $information->inspection_date = array();
            $information->inspection_date = array_prepend ($information->inspection_date, 'H');
            $information->inspection_date = array_prepend ($information->inspection_date, '');
            $information->inspection_date = array_prepend ($information->inspection_date, '');
            $information->inspection_date = array_prepend ($information->inspection_date, '');
        }
        $information->inspection = $information->inspection_date[0];
        $information->inspection_month = $information->inspection_date[2];
        $information->inspection_day = $information->inspection_date[3];
        $information->inspection_year = $information->inspection_date[1];
        $car = $this->carRepository->getAll();
        $data['car'] = $car;
        $information->car = $car->where("id",$sellerCar->car_id)->first();
        $information->car_id = $sellerCar->car_id;
        $information->maker_id = $information->car == null?null:$information->car->maker_id;
        $information->remove_part = explode(',', $information->remove_part);
        $information->equipment = $this->sellerCarEquipmentRepository->getByCarSeller($id);

        if($information->equipment != null){
            $temp= array();
            foreach ($information->equipment as $key => $value) {
                $temp = array_prepend($temp,$value->equipment_id);
            }
            $information->equipment = $temp;
        }
        $data['infor'] = $information;
        $maker = $this->makerRepository->getAll();
        $data['maker'] = $maker;
        $car = $this->carRepository->getAll();
        $data['car'] = $car;
        $equipment = $this->equipmentRepository->getAll();
        $data['equipment'] = $equipment;
        $history = $this->sellerCarCorrespondenceHistory->getByCarSeller($id);
        $data['history'] = $history;
        $retrieval = $this->sellerCarRetrievalRepository->getByCarSeller($id);
        $data['retrieval'] = $retrieval;
        $question = $this->sellerCarQuestionRepository->getByCarSeller($id);
        foreach ($question as $key => $value) {
            $question[$key]->date = Carbon::parse($question[$key]->date)->format('d-m-Y(h:i)');
        }
        $data['question'] = $question;
        $reception = $this->sellerCarReceptionRepository->getByCarSeller($id);
        $data['reception'] = $reception;
        $sale = $this->sellerCarSaleRepository->getByCarSeller($id);
        $data['sale'] = $sale;
        $assessment = $this->sellerCarAssessmentRepository->getByCarSeller($id);
        $data['assessment'] = $assessment;
        $order = $this->orderRepository->getByCarSeller($id);
        $order->deadline_date = null;
        $order->deadline_hour = null;
        $order->deadline_minute = null;
        if($order->deadline != null){
            $deadline = Carbon::parse($order->deadline);
            $order->deadline_date = $deadline->format('Y-m-d');
            $order->deadline_hour = $deadline->hour;
            $order->deadline_minute = $deadline->minute;
        }
        $data['order'] = $order;
        $orderDetail = $this->orderDetailRepository->getByCarSeller($id);
        $data['orderDetail'] = $orderDetail;
        $variousCost = $this->sellerCarVariousCostRepository->getByCarSeller($id);
        $data['variousCost'] = $variousCost;
        $refund = $this->sellerCarRefundRepository->getByCarSeller($id);
        $data['refund'] = $refund;
        $images = $this->sellerCarImageRepository->getByCarSeller($id);
        $data['images'] = $images;
        $erea = $this->ereaRepository->getByGroupByZone();
        $data['erea'] = $erea;
    	return view("order.detail",$data);
    }

    /*****************************************************************************
    * Created: 2018/04/20
    * View order index
    ***************************************************************************
    * @author: Duy
    ****************************************************************************/
    public function index()
    {
        $list_order = $this->orderRepository->GetOrderIndex(5);
        $data['list_order'] = $list_order;
        foreach($list_order as $order_id)
        {
            $seller_car_information = $this->orderRepository->GetSellerCar($order_id->seller_id);
            $data['list_seller_car'][$order_id->seller_id] = $seller_car_information;
            $data['list_seller_car_information'][$order_id->id] = $this->orderRepository->GetInformationSellerCar($order_id->id);
            $data['list_seller_car_reception'][$order_id->id] = $this->orderRepository->GetReceptionSellerCar($order_id->id);   
        }
        return view("order.index",$data);
    }
}
