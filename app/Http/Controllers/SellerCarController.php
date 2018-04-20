<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Helper\FileHelper;
use App\ValidateRequest\ValidateRequestOrder;
use App\Repositories\SellerRepository;
use App\Repositories\SellerCarRepository;
use App\Repositories\SellerCarStatusRepository;
use App\Repositories\SellerCarDocumentRepository;
use App\Repositories\SellerCarInformationRepository;
use App\Repositories\SellerCarEquipmentRepository;
use App\Repositories\SellerCarCorrespondenceHistoryRepository;
use App\Repositories\SellerCarReceptionRepository;
use App\Repositories\SellerCarRetrievalRepository;
use App\Repositories\SellerCarQuestionRepository;
use App\Repositories\SellerCarSaleRepository;
use App\Repositories\SellerCarAssessmentRepository;
use App\Repositories\SellerCarVariousCostRepository;
use App\Repositories\SellerCarRefundRepository;
use App\Repositories\SellerCarImageRepository;
use App\Repositories\OrderRepository;
use App\Repositories\OrderDetailRepository;

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
    * Created: 2018/04/16
    * Edit seller car status
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
    * Created: 2018/04/16
    * Edit seller car document
    ***************************************************************************
    * @author: Nguyen. Return result json: success or fail
    ****************************************************************************/
     public function editDocument(Request $p_request){
        ValidateRequestOrder::validateDocument($p_request);
        $id = $p_request->input('id');
        $carDocument['cancel_type'] = $p_request->input('cancel_type');
        $carDocument['document_arrival'] = $p_request->input('document_arrival');
        /*$carDocument['vehicle_license'] = $p_request->input('vehicle_license');
        $carDocument['insurance_card'] = $p_request->input('insurance_card');
        $carDocument['recycling_ticket'] = $p_request->input('recycling_ticket');
        $carDocument['seal_certificate'] = $p_request->input('seal_certificate');
        $carDocument['transfer_certificate'] = $p_request->input('transfer_certificate');
        $carDocument['power_attorney'] = $p_request->input('power_attorney');
        $carDocument['resident_card'] = $p_request->input('seal_certificate');
        $carDocument['inheritance'] = $p_request->input('transfer_certificate');*/
        $carDocument['condition'] = $p_request->input('condition');
        $carDocument['license_plate'] = $p_request->input('license_plate');
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
    * Created: 2018/04/17
    * Edit seller car vehicle information
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
        $carInformation['type'] = $p_request->input('type');
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
    * Created: 2018/04/18
    * add seller car history
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
    * Created: 2018/04/16
    * Edit seller car status
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
    * Created: 2018/04/18
    * add seller car question
    ***************************************************************************
    * @author: Nguyen. Return result json: success or fail
    ****************************************************************************/
     public function addQuestion(Request $p_request){
        ValidateRequestOrder::validateQuestion($p_request);
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
    * Created: 2018/04/18
    * Edit seller car reception
    ***************************************************************************
    * @author: Nguyen. Return result json: success or fail
    ****************************************************************************/
    public function editReception(Request $p_request){
        ValidateRequestOrder::validateReception($p_request);
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

    /*****************************************************************************
    * Created: 2018/04/18
    * Edit seller car sale
    ***************************************************************************
    * @author: Nguyen. Return result json: success or fail
    ****************************************************************************/
    public function editSale(Request $p_request){
        ValidateRequestOrder::validateSale($p_request);
        $id = $p_request->input('id');
        $carSale['sale_date'] = $p_request->input('sale_date');
        $carSale['accounting_method'] = $p_request->input('accounting_method');
        $carSale['amount'] = $p_request->input('amount');
        $carSale['body_price'] = $p_request->input('body_price');
        $carSale['recycling_fee'] = $p_request->input('recycling_fee');
        $carSale['bid_fee'] = $p_request->input('bid_fee');
        $carSale['refund_fee'] = $p_request->input('refund_fee');
        $carSale['delete_agent_cost'] = $p_request->input('delete_agent_cost');
        $carSale['destination'] = $p_request->input('destination');
        $carSale['distributor_name'] = $p_request->input('distributor_name');
        $carSale['remark'] = $p_request->input('remark');
        $carSale['deducion_amount'] = $p_request->input('deducion_amount');
        $carSale['deposite_due_date'] = $p_request->input('deposite_due_date');
        $carSale['receivable_date'] = $p_request->input('receivable_date');
        $carSale['billing_date'] = $p_request->input('billing_date');
        $carSale['golden_date'] = $p_request->input('golden_date');
        $sellerCarSaleRepo = new SellerCarSaleRepository();
        $status = $sellerCarSaleRepo->update($id,$carSale);
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
    * Created: 2018/04/18
    * Edit seller car sale confirm
    ***************************************************************************
    * @author: Nguyen. Return result json: success or fail
    ****************************************************************************/
    public function editSaleConfirm(Request $p_request){
        ValidateRequestOrder::validateSaleConfirm($p_request);
        $id = $p_request->input('id');
        $carSale['body_price'] = $p_request->input('body_price');
        $carSale['established_amount'] = $p_request->input('established_amount');
        $carSale['payment_deadline'] = $p_request->input('payment_deadline');
        $carSale['last_account_date'] = $p_request->input('last_account_date');
        $carSale['billing_date'] = $p_request->input('billing_date');
        $carSale['clothing_date'] = $p_request->input('clothing_date');
        $carSale['remark2'] = $p_request->input('remark2');
        $sellerCarSaleRepo = new SellerCarSaleRepository();
        $status = $sellerCarSaleRepo->update($id,$carSale);
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
    * Created: 2018/04/18
    * Edit seller car assessment
    ***************************************************************************
    * @author: Nguyen. Return result json: success or fail
    ****************************************************************************/
    public function editAssessment(Request $p_request){
        ValidateRequestOrder::validateAssessment($p_request);
        $id = $p_request->input('id');
        $sellerCarAssessmentRepo = new SellerCarAssessmentRepository();
        $assessmentInfor = $sellerCarAssessmentRepo->getById($id);
        if($assessmentInfor == null){
            return Response::json([
                        "status" => false,
                        "message" => "fail"
                    ]);
        }
        $carAssessment['advance'] = $p_request->input('advance');
        $carAssessment['advance_method'] = $p_request->input('advance_method');
        $carAssessment['place'] = $p_request->input('place');
        $carAssessment['place_map'] = $p_request->input('place_map');
        $carAssessment['situation'] = $p_request->input('situation');
        $carAssessment['advance_date1'] = $p_request->input('advance_date1');
        $carAssessment['advance_date2'] = $p_request->input('advance_date2');
        $carAssessment['advance_date3'] = $p_request->input('advance_date3');
        $carAssessment['remark1'] = $p_request->input('remark1');
        $carAssessment['candidate_list'] = $p_request->input('candidate_list');
        $carAssessment['assessor1'] = $p_request->input('assessor1');
        $carAssessment['assessor_id'] = $p_request->input('assessor_id');
        $carAssessment['request_date'] = $p_request->input('request_date');
        $carAssessment['assessor2'] = $p_request->input('assessor2');
        $carAssessment['arrival_date'] = $p_request->input('arrival_date');
        $carAssessment['complete_confirmation'] = $p_request->input('complete_confirmation');
        $carAssessment['synthetic'] = $p_request->input('synthetic');
        $carAssessment['exterior'] = $p_request->input('exterior');
        $carAssessment['interior'] = $p_request->input('interior');
        $carAssessment['comment'] = $p_request->input('comment');
        $carAssessment['rater'] = $p_request->input('rater');
        $carAssessment['remark2'] = $p_request->input('remark2');
        $table_img = FileHelper::saveImage($p_request,'table_img','sca',$id);
        if($table_img != null){
            $carAssessment['table_img'] = $table_img;
            FileHelper::deleteImage($assessmentInfor->table_img);
        }
        $status = $sellerCarAssessmentRepo->update($id,$carAssessment);
        $result = [
            "status" => true,
            "message" => "success",
            "data" => array("table_img" => $table_img)
        ];
        if($status == false){
            $result["status"] = false;
            $result["message"] = "fail";
        }
        return Response::json($result);
    }

    /*****************************************************************************
    * Created: 2018/04/18
    * Edit seller car transfer
    ***************************************************************************
    * @author: Nguyen. Return result json: success or fail
    ****************************************************************************/
    public function editTransfer(Request $p_request){
        ValidateRequestOrder::validateTransfer($p_request);
        $id = $p_request->input('id');
        $carTransfer['determine_amount'] = $p_request->input('determine_amount');
        $carTransfer['remark3'] = $p_request->input('remark3');
        $sellerCarSaleRepo = new SellerCarSaleRepository();
        $status = $sellerCarSaleRepo->update($id,$carTransfer);
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
    * Created: 2018/04/19
    * Edit seller car transfer
    ***************************************************************************
    * @author: Nguyen. Return result json: success or fail
    ****************************************************************************/
    public function editOrder(Request $p_request){
        ValidateRequestOrder::validateOrder($p_request);
        $id = $p_request->input('id');
        $carOrder['status'] = $p_request->input('status');
        $carOrder['asking_price'] = $p_request->input('asking_price');
        $carOrder['deadline'] = $p_request->input('deadline');
        $carOrder['remark'] = $p_request->input('remark');
        $orderRepo = new OrderRepository();
        $status = $orderRepo->update($id,$carOrder);
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
    * Created: 2018/04/19
    * add seller car question
    ***************************************************************************
    * @author: Nguyen. Return result json: success or fail
    ****************************************************************************/
     public function addBid(Request $p_request){
        ValidateRequestOrder::validateAddBid($p_request);
        $addBid['seller_car_id'] = $p_request->input('seller_car_id');
        $addBid['name'] = $p_request->input('name');
        $addBid['price'] = $p_request->input('price');
        $addBid['status'] = 1;
        $orderDetailRepo = new OrderDetailRepository();
        $status = $orderDetailRepo->insert($addBid);
        unset($addBid['seller_car_id']);
        $result = [
            "status" => true,
            "message" => "success",
            'data' =>$addBid
        ];
        if($status == false){
            $result["status"] = false;
            $result["message"] = "fail";
        }
        return Response::json($result);
    }

    /*****************************************************************************
    * Created: 2018/04/19
    * add seller car question
    ***************************************************************************
    * @author: Nguyen. Return result json: success or fail
    ****************************************************************************/
     public function removeBid(Request $p_request){
        ValidateRequestOrder::validateAddBid($p_request);
        $id = $p_request->input('id');
        $removeBid['status'] = 0;
        $orderDetailRepo = new OrderDetailRepository();
        $status = $orderDetailRepo->update($id,$removeBid);
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
    * Created: 2018/04/19
    * add seller car question
    ***************************************************************************
    * @author: Nguyen. Return result json: success or fail
    ****************************************************************************/
     public function addVariousCost(Request $p_request){
        ValidateRequestOrder::validateVariousCost($p_request);
        $addVariousCost['seller_car_id'] = $p_request->input('seller_car_id');
        $addVariousCost['date'] = $p_request->input('date');
        $addVariousCost['classification'] = $p_request->input('classification');
        $addVariousCost['remark'] = $p_request->input('remark');
        $addVariousCost['commission'] = $p_request->input('commission');
        $sellerCarVariousCostRepo = new SellerCarVariousCostRepository();
        $status = $sellerCarVariousCostRepo->insert($addVariousCost);
        unset($addVariousCost['seller_car_id']);
        $result = [
            "status" => true,
            "message" => "success",
            'data' =>$addVariousCost
        ];
        if($status == false){
            $result["status"] = false;
            $result["message"] = "fail";
        }
        return Response::json($result);
    }


    /*****************************************************************************
    * Created: 2018/04/19
    * Edit seller car transfer
    ***************************************************************************
    * @author: Nguyen. Return result json: success or fail
    ****************************************************************************/
    public function editRecycling(Request $p_request){
        ValidateRequestOrder::validateRecycling($p_request);
        $id = $p_request->input('id');
        $carRecycling['deposite_situation'] = $p_request->input('deposite_situation');
        $carRecycling['recycling_fee'] = $p_request->input('recycling_fee');
        $sellerCarSaleRepo = new SellerCarSaleRepository();
        $status = $sellerCarSaleRepo->update($id,$carRecycling);
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
    * Created: 2018/04/19
    * Edit seller car transfer
    ***************************************************************************
    * @author: Nguyen. Return result json: success or fail
    ****************************************************************************/
    public function editRefund(Request $p_request){
        ValidateRequestOrder::validateRefund($p_request);
        $id = $p_request->input('id');
        $carRefund['return_responsitory'] = $p_request->input('return_responsitory');
        $carRefund['weight_tax_refund'] = $p_request->input('weight_tax_refund');
        $carRefund['tax_date'] = $p_request->input('tax_date');
        $carRefund['payment'] = $p_request->input('payment');
        $carRefund['automobile_refund'] = $p_request->input('automobile_refund');
        $sellerCarRefundRepo = new SellerCarRefundRepository();
        $status = $sellerCarRefundRepo->update($id,$carRefund);
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
    * Created: 2018/04/19
    * Edit seller car transfer
    ***************************************************************************
    * @author: Nguyen. Return result json: success or fail
    ****************************************************************************/
    public function editImage(Request $p_request){
        ValidateRequestOrder::validateImage($p_request);
        $id = $p_request->input('id');
        $sellerCarImageRepo = new SellerCarImageRepository();
        $imageInfor = $sellerCarImageRepo->getById($id);
        if($imageInfor == null){
            return Response::json([
                "status" => false,
                "message" => "fail"
            ]);
        }
        $carImage['name'] = $p_request->input('name');
        $carImage['index'] = $p_request->input('index');
        $carImage['seller_car_id'] = $p_request->input('seller_car_id');
        $url = FileHelper::saveImage($p_request,'url','sci',$id);
        if($url != null){
            $carImage['url'] = $url;
            FileHelper::deleteImage($imageInfor->url);
        }
        $status = $sellerCarImageRepo->update($id,$carImage);
        unset($carImage['seller_car_id']);
        $result = [
            "status" => true,
            "message" => "success",
            "data" => $carImage
        ];
        if($status == false){
            $result["status"] = false;
            $result["message"] = "fail";
        }
        return Response::json($result);
    }

    /*****************************************************************************
    * Created: 2018/04/19
    * Edit seller car transfer
    ***************************************************************************
    * @author: Nguyen. Return result json: success or fail
    ****************************************************************************/
    public function addImage(Request $p_request){
        ValidateRequestOrder::validateImage($p_request);
        $carImage['name'] = $p_request->input('name');
        $carImage['index'] = $p_request->input('index');
        $carImage['seller_car_id'] = $p_request->input('seller_car_id');
        $sellerCarImageRepo = new SellerCarImageRepository();
        $status = $sellerCarImageRepo->insert($carImage);
        if($status != false){
            $url = FileHelper::saveImage($p_request,'url','sci',$status);
            if($url != null){
                $carImage['url'] = $url;
                $sellerCarImageRepo->update($status,$carImage);
            }
            $carImage['id'] = $status;
        }
        unset($carImage['seller_car_id']);
        $result = [
            "status" => true,
            "message" => "success",
            "data" => $carImage
        ];
        if($status == false){
            $result["status"] = false;
            $result["message"] = "fail";
        }
        return Response::json($result);
    }

    /*****************************************************************************
    * Created: 2018/04/20
    * Edit seller car transfer
    ***************************************************************************
    * @author: Nguyen. Return result json: success or fail
    ****************************************************************************/
    public function removeImage(Request $p_request){
        ValidateRequestOrder::validateRemoveImage($p_request);
        $id = $p_request->input('id');
        $sellerCarImageRepo = new SellerCarImageRepository();
        $imageInfor = $sellerCarImageRepo->getById($id);
        if($imageInfor == null){
            return Response::json([
                "status" => false,
                "message" => "fail"
            ]);
        }
        $status = $sellerCarImageRepo->destroy($id);
        if($status != false){
            FileHelper::deleteImage($imageInfor->url);
        }
        $result = [
            "status" => true,
            "message" => "success",
        ];
        if($status == false){
            $result["status"] = false;
            $result["message"] = "fail";
        }
        return Response::json($result);
    }

}
