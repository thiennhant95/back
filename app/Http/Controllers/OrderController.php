<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ValidateRequest\ValidateRequestOrder;
use App\Repositories\SellerRepository;
use App\Repositories\OrderRepository;
use App\Repositories\SellerCarRepository;
use App\Repositories\SellerCarStatusRepository;
use App\Repositories\SellerCarDocumentRepository;
use App\Repositories\SellerCarInformationRepository;
use App\Repositories\SellerCarEquipmentRepository;
use App\Repositories\SellerCarCorrespondenceHistoryRepository;
use App\Repositories\SellerCarReceptionRepository;
use App\Repositories\SellerCarQuestionRepository;
use App\Repositories\MakerRepository;
use App\Repositories\CarRepository;
use App\Repositories\EquipmentRepository;
use App\Repositories\SellerCarRetrievalRepository;
use Carbon\Carbon;
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
        $this->sellerCarQuestionRepository = new SellerCarQuestionRepository();
        $this->sellerCarReceptionRepository = new SellerCarReceptionRepository();
        $this->sellerCarRepository = new SellerCarRepository();
        $this->carRepository = new CarRepository();
        $this->makerRepository = new MakerRepository();
        $this->equipmentRepository = new EquipmentRepository();
    }


    /*****************************************************************************
    * Created: 2018/04/13* View order detail
    ***************************************************************************
    * @author: Nguyen
    ****************************************************************************/
    public function orderDetail(){
        $seller_car = $this->sellerCarRepository->getById(1);
    	$seller = $this->sellerRepository->getById(1);
    	$data['seller'] = $seller;
        $status = $this->sellerCarStatusRepository->getByCarSeller(1);
        $status->pursuit = explode(',',$status->pursuit);
        if(count($status->pursuit) < 3){
            $status->pursuit = array();
            $status->pursuit = array_prepend ($status->pursuit, 0);
            $status->pursuit = array_prepend ($status->pursuit, 0);
            $status->pursuit = array_prepend ($status->pursuit, 0);
        }
        $data['status'] = $status;
        $document = $this->sellerCarDocumentRepository->getByCarSeller(1);
        $data['document'] = $document;
        $information = $this->sellerCarInformationRepository->getByCarSeller(1);
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
        $information->car = $car->where("id",$seller_car->car_id)->first();
        $information->car_id = $seller_car->car_id;
        $information->maker_id = $information->car == null?null:$information->car->maker_id;
        $information->remove_part = explode(',', $information->remove_part);
        $information->equipment = $this->sellerCarEquipmentRepository->getByCarSeller(1);

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
        $history = $this->sellerCarCorrespondenceHistory->getByCarSeller(1);
        $data['history'] = $history;
        $retrieval = $this->sellerCarRetrievalRepository->getByCarSeller(1);
        $data['retrieval'] = $retrieval;
        $question = $this->sellerCarQuestionRepository->getByCarSeller(1);
        foreach ($question as $key => $value) {
            $question[$key]->date = Carbon::parse($question[$key]->date)->format('d-m-Y(h:i)');
        }
        $data['question'] = $question;
        $reception = $this->sellerCarReceptionRepository->getByCarSeller(1);
        $data['reception'] = $reception;
    	return view("order.detail",$data);
    }


}
