<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
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
use App\Repositories\SellerCarRetrievalRepository;
use App\Repositories\SellerCarQuestionRepository;
/*****************************************************************************
* Controller seller car
****************************************************************************
* This is  controller management seller car
*
**************************************************************************
* @author: Nguyen
****************************************************************************/
class SellerCarController extends Controller
{
	/*****************************************************************************
    * Created: 2018/04/16* Edit seller car status
    ***************************************************************************
    * @author: Nguyen. Return result json: success or fail
    ****************************************************************************/
    public function editStatus(Request $p_request){
        ValidateRequestOrder::validateStatus($p_request);
        $id = $p_request->input('id');
        $carStatus['status'] = $p_request->input('status');
        $carStatus['listing_accuracy'] = $p_request->input('listing_accuracy');
        $carStatus['re_tel_date'] = $p_request->input('re_tel_date');
        $carStatus['tel_number_again'] = $p_request->input('tel_number_again');
        $carStatus['pursuit'] = $p_request->input('pursuit');
        $carStatus['pursuit'] = implode(',',$carStatus['pursuit']);
        $carStatus['offer_presentation'] = $p_request->input('offer_presentation');
        $carStatus['campaign'] = $p_request->input('campaign');
        $carStatus['word_preparation'] = $p_request->input('word_preparation');
        $sellerCarStatusRepo = new SellerCarStatusRepository();
        $status = $sellerCarStatusRepo->update($id,$carStatus);
        $result = [
            "status" => true,
            "message" => "success"
        ];
        if($status == false){
            $result["status"] = false;
            $result["message"] = "fail";
        }
        return Response::json($result);
    }

    /*****************************************************************************
    * Created: 2018/04/16* Edit seller car document
    ***************************************************************************
    * @author: Nguyen. Return result json: success or fail
    ****************************************************************************/
     public function editDocument(Request $p_request){
        ValidateRequestOrder::validateDocument($p_request);
        $id = $p_request->input('id');
        $carDocument['cancel_type'] = $p_request->input('cancel_type');
        $carDocument['document_arrival'] = $p_request->input('document_arrival');
        $carDocument['vehicle_license'] = $p_request->input('vehicle_license');
        $carDocument['insurance_card'] = $p_request->input('insurance_card');
        $carDocument['recycling_ticket'] = $p_request->input('recycling_ticket');
        $carDocument['seal_certificate'] = $p_request->input('seal_certificate');
        $carDocument['transfer_certificate'] = $p_request->input('transfer_certificate');
        $carDocument['power_attorney'] = $p_request->input('power_attorney');
        $carDocument['license_plate'] = $p_request->input('license_plate');
        $carDocument['resident_card'] = $p_request->input('seal_certificate');
        $carDocument['inheritance'] = $p_request->input('transfer_certificate');
        $carDocument['remark'] = $p_request->input('remark');
        $sellerCarDocumentRepo = new SellerCarDocumentRepository();
        $status = $sellerCarDocumentRepo->update($id,$carDocument);
        $result = [
            "status" => true,
            "message" => "success"
        ];
        if($status == false){
            $result["status"] = false;
            $result["message"] = "fail";
        }
        return Response::json($result);
    }

    /*****************************************************************************
    * Created: 2018/04/17* Edit seller car vehicle information
    ***************************************************************************
    * @author: Nguyen. Return result json: success or fail
    ****************************************************************************/
     public function editInformation(Request $p_request){
        ValidateRequestOrder::validateInformation($p_request);
        $id = $p_request->input('id');
        $seller_car_id = $p_request->input('seller_car_id');
        $carInformation['car_name'] = $p_request->input('car_name');
        $carInformation['maker_id'] = $p_request->input('maker_id');
        $sellerCar['car_id'] = $p_request->input('car_id');
        $carInformation['classification'] = $p_request->input('classification');
        $carInformation['car_year'] = $p_request->input('car_year');
        $carInformation['about_check'] = $p_request->input('about_check');
        $carInformation['purchase'] = $p_request->input('purchase');
        $carInformation['mileage'] = $p_request->input('mileage');
        $carInformation['inspection_date'] = $p_request->input('inspection_date');
        $carInformation['self_propelled1'] = $p_request->input('self_propelled1');
        $carInformation['self_propelled2'] = $p_request->input('self_propelled2');
        $carInformation['self_propelled2'] = implode(',', $carInformation['self_propelled2']);
        $carInformation['t4_unic'] = $p_request->input('t4_unic');
        $carInformation['running_condition'] = $p_request->input('running_condition');
        $carInformation['body_color'] = $p_request->input('body_color');
        $carInformation['displacement'] = $p_request->input('displacement');
        $carInformation['about_check'] = $p_request->input('about_check');
        $carInformation['engine_model'] = $p_request->input('engine_model');
        $carInformation['turbo'] = $p_request->input('turbo');
        $carInformation['ambiguous_check'] = $p_request->input('ambiguous_check');
        $carInformation['model_number'] = $p_request->input('model_number');
        $carInformation['category_number'] = $p_request->input('category_number');
        $carInformation['grade'] = $p_request->input('grade');
        $carInformation['drive_system'] = $p_request->input('drive_system');
        $carInformation['transmission'] = $p_request->input('transmission');
        $carInformation['speed'] = $p_request->input('speed');
        $carInformation['fuel'] = $p_request->input('fuel');
        $carInformation['owner'] = $p_request->input('owner');
        $carInformation['personal_check'] = $p_request->input('personal_check');
        $carInformation['residence'] = $p_request->input('residence');
        $carInformation['number_stamp'] = $p_request->input('number_stamp');
        $carInformation['balance_status'] = $p_request->input('balance_status');
        $carInformation['delete_temp'] = $p_request->input('delete_temp');
        $carInformation['accident_repair'] = $p_request->input('accident_repair');
        $carInformation['written_guarantee'] = $p_request->input('written_guarantee');
        $carInformation['record_book'] = $p_request->input('record_book');
        $carInformation['history'] = $p_request->input('history');
        $carInformation['smoking_status'] = $p_request->input('smoking_status');
        $equipment = $p_request->input('equipment');
        $carInformation['air_condition'] = $p_request->input('air_condition');
        $carInformation['remark'] = $p_request->input('remark');
        $carInformation['number_door'] = $p_request->input('number_door');
        $carInformation['number_passenger'] = $p_request->input('number_passenger');
        $carInformation['condition'] = $p_request->input('condition');
        $carInformation['state_interior'] = $p_request->input('state_interior');
        $carInformation['state_other'] = $p_request->input('state_other');
        $carInformation['pr_points'] = $p_request->input('pr_points');
        $carInformation['vehicle_number'] = $p_request->input('vehicle_number');
        $carInformation['chassis_number'] = $p_request->input('chassis_number');
        $carInformation['remove_part'] = $p_request->input('remove_part');
        $carInformation['remove_part'] = implode(',', $carInformation['remove_part']);

        $sellerCarInformationRepo = new SellerCarInformationRepository();
        $status = $sellerCarInformationRepo->update($id,$carInformation);
        $sellerCarRepo = new SellerCarRepository();
        $status = $sellerCarRepo->update($seller_car_id,$sellerCar);
        $sellerCarEquipmentRepo = new SellerCarEquipmentRepository();
        $sellerCarEquipmentRepo->destroyByWhere([
            ["seller_car_id","=",$seller_car_id]
        ]);
        foreach ($equipment as $key => $value) {
            $carEquipment['equipment_id'] = $value;
            $carEquipment['seller_car_id'] = $seller_car_id;
            $sellerCarEquipmentRepo->insert($carEquipment);
        }
        $result = [
            "status" => true,
            "message" => "success"
        ];
        if($status == false){
            $result["status"] = false;
            $result["message"] = "fail";
        }
        return Response::json($result);
    }


    /*****************************************************************************
    * Created: 2018/04/18* add seller car history
    ***************************************************************************
    * @author: Nguyen. Return result json: success or fail
    ****************************************************************************/
     public function addHistory(Request $p_request){
        ValidateRequestOrder::validateDocument($p_request);
        $carHítory['type'] = $p_request->input('type');
        $carHítory['name'] = \Auth::user()->name;
        $carHítory['content'] = $p_request->input('content');
        $carHítory['date'] = date('Y-m-d H:i:s');
        $carHítory['seller_car_id'] = $p_request->input('seller_car_id');
        $sellerCarHistoryRepo = new SellerCarCorrespondenceHistoryRepository();
        $status = $sellerCarHistoryRepo->insert($carHítory);
        unset($carHítory['seller_car_id']);
        $result = [
            "status" => true,
            "message" => "success",
            'data' =>$carHítory
        ];
        if($status == false){
            $result["status"] = false;
            $result["message"] = "fail";
        }
        return Response::json($result);
    }

    /*****************************************************************************
    * Created: 2018/04/16* Edit seller car status
    ***************************************************************************
    * @author: Nguyen. Return result json: success or fail
    ****************************************************************************/
    public function editRetrieval(Request $p_request){
        ValidateRequestOrder::validateRetrieval($p_request);
        $id = $p_request->input('id');
        $carRetrieval['status'] = $p_request->input('status');
        $carRetrieval['first_date'] = $p_request->input('first_date');
        $carRetrieval['second_date'] = $p_request->input('second_date');
        $carRetrieval['third_date'] = $p_request->input('third_date');
        $carRetrieval['first_date_check'] = $p_request->input('first_date_check');
        $carRetrieval['second_date_check'] = $p_request->input('second_date_check');
        $carRetrieval['third_date_check'] = $p_request->input('third_date_check');
        $carRetrieval['pending_schedule'] = $p_request->input('pending_schedule');
        $carRetrieval['takeover_place'] = $p_request->input('takeover_place');
        $carRetrieval['availability'] = $p_request->input('availability');
        $carRetrieval['company_code'] = $p_request->input('company_code');
        $carRetrieval['remark'] = $p_request->input('remark');
        $carRetrieval['number_cut'] = $p_request->input('number_cut');
        $carRetrieval['end_recognition_day'] = $p_request->input('end_recognition_day');
        $carRetrieval['end_quotation'] = $p_request->input('end_quotation');
        $sellerCarRetrievalRepo = new SellerCarRetrievalRepository();
        $status = $sellerCarRetrievalRepo->update($id,$carRetrieval);
        $result = [
            "status" => true,
            "message" => "success"
        ];
        if($status == false){
            $result["status"] = false;
            $result["message"] = "fail";
        }
        return Response::json($result);
    }

    /*****************************************************************************
    * Created: 2018/04/18* add seller car question
    ***************************************************************************
    * @author: Nguyen. Return result json: success or fail
    ****************************************************************************/
     public function addQuestion(Request $p_request){
        ValidateRequestOrder::validateDocument($p_request);
        if($p_request->input('trader_id') == null){
            $carQuestion['user_id'] = \Auth::user()->id;
            $carQuestion['name'] = \Auth::user()->name;
        }else{
            $carQuestion['trader_id'] = $p_request->input('trader_id');
            $carQuestion['name'] = $p_request->input('name');
        }
        $carQuestion['question'] = $p_request->input('question');
        $carQuestion['date'] = date('Y-m-d H:i:s');
        $carQuestion['seller_car_id'] = $p_request->input('seller_car_id');
        $sellerCarQuestionRepo = new SellerCarQuestionRepository();
        $status = $sellerCarQuestionRepo->insert($carQuestion);
        $carQuestion['date'] = date('d/m/Y(H:i)');
        unset($carQuestion['seller_car_id']);
        $result = [
            "status" => true,
            "message" => "success",
            'data' =>$carQuestion
        ];
        if($status == false){
            $result["status"] = false;
            $result["message"] = "fail";
        }
        return Response::json($result);
    }

    /*****************************************************************************
    * Created: 2018/04/18* Edit seller car status
    ***************************************************************************
    * @author: Nguyen. Return result json: success or fail
    ****************************************************************************/
    public function editReception(Request $p_request){
        ValidateRequestOrder::validateRetrieval($p_request);
        $id = $p_request->input('id');
        $carReception['term_consent'] = $p_request->input('term_consent');
        $carReception['confirm_method'] = $p_request->input('confirm_method');
        $carReception['producer_urged'] = $p_request->input('producer_urged');
        $carReception['remark1'] = $p_request->input('remark1');
        $carReception['minimum_recommend_price'] = $p_request->input('minimum_recommend_price');
        $carReception['end_desired_date'] = $p_request->input('end_desired_date');
        $carReception['claim'] = $p_request->input('claim');
        $carReception['notify_certified_copy'] = $p_request->input('notify_certified_copy');
        $carReception['deletion_work'] = $p_request->input('deletion_work');
        $carReception['remark2'] = $p_request->input('remark2');
        $sellerCarReceptionRepo = new SellerCarReceptionRepository();
        $status = $sellerCarReceptionRepo->update($id,$carReception);
        $result = [
            "status" => true,
            "message" => "success"
        ];
        if($status == false){
            $result["status"] = false;
            $result["message"] = "fail";
        }
        return Response::json($result);
    }

}
