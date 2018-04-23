<?php

namespace App\Repositories;
use App\Models\SellerCar;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\SellerRepository;
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
use DB;

/*****************************************************************************
* Repository seller car 
****************************************************************************
* This is seller car  repository
*
**************************************************************************
* @author: Nguyen
****************************************************************************/
class SellerCarRepository extends BaseRepository
{
    public function __construct(){
    	$this->model = new SellerCar();
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
    * Function: getSearch
    * get list news with limit
    *   
    * @param   Request   $request   
    * @return  view _ return list of news  
    *   
    */
    public function getSeach($n, $param)
    {
        $name = $param['name'];
        $phone = $param['phone'];
        $address = $param['address'];
        $mail = $param['email'];
        $modelName = $param['carName'];
        $displacement = $param['displacement'];
        $freeword = $param['freeword'];
        $firstInquiryDateFrom = $param['firstinquiryStart'];
        $firstInquiryDateTo = $param['firstinquiryEnd'];
        $lastQueryDateFrom = $param['lastinquiryStart'];
        $lastQueryDateTo = $param['lastinquiryEnd'];
        $moneyPresentDateFrom = $param['proposalStart'];
        $moneyPresentDateTo = $param['proposalEnd'];
        $reTelDateFrom = $param['retelDateStart'];
        $reTelDateTo = $param['retelDateEnd'];
        $assessmentFrequency = $param['assessmentFrequency'];
        $status = $param['status'];
        $firstPersoninCharge = $param['registrant'];
        $personChangeHistory = $param['updater'];
        $listingAccuracy = $param['listingAccuracy'];
        $selfRunning = $param['selfRunning'];
        $assessmentService = $param['assessmentService'];
        $query = 
        $this->model::whereHas('seller', function ($seller) use ($name, $phone, $address, $mail, $freeword) {

            if ($name != '') {
                $seller->where('name', 'like', '%'.$name.'%');
            }
            if ($freeword != '') {
                $seller->orWhere('name', 'like', '%'.$freeword.'%');
            }
            if ($phone != '') {
                $seller->where('phone1', 'like', '%'.$phone.'%');
            }
            if ($address != '') {
                $seller->where('address', 'like', '%'.$address.'%');
            }
            if ($mail != '') {
                $seller->where('email1', 'like', '%'.$mail.'%');
            }
            
        })
        ->whereHas('sellerCarInformation', function ($sellerCarInformation) use ($modelName, $displacement, $freeword) {

            if ($modelName != '') {
                $sellerCarInformation->where('car_name', 'like', '%'.$modelName.'%');
            }
            if ($freeword != '') {
                $sellerCarInformation->orWhere('car_name', 'like', '%'.$freeword.'%');
            }
            if ($displacement != '' && $displacement != 0) {
                switch ($displacement) {
                    case 1:
                        $sellerCarInformation->where('displacement', '<=', $displacement.'000');
                        break;
                    case 6:
                        $sellerCarInformation->where('displacement', '>=', ($displacement - 1).'000');
                        break;
                    default:
                        $sellerCarInformation->where('displacement', '>=', ($displacement - 1).'000')
                                            ->where('displacement', '<', ($displacement).'000');
                        break;
                }
            }
            
        })
        ->whereHas('sellerCarStatus', function ($sellerCarStatus) use ($firstInquiryDateFrom, $firstInquiryDateTo, $reTelDateFrom, $reTelDateTo, $status, $listingAccuracy) {
            if ($firstInquiryDateFrom != ''){
                if ($firstInquiryDateTo != '') {
                    $sellerCarStatus->whereBetween('first_inquiry_date', [$firstInquiryDateFrom, $firstInquiryDateTo]);
                }else{
                    $sellerCarStatus->where('first_inquiry_date','>=', $firstInquiryDateFrom);
                }
            }else{
                if ($firstInquiryDateTo != '') {
                    $sellerCarStatus->where('first_inquiry_date','<=', $firstInquiryDateTo);
                }
            }
            
            if ($reTelDateFrom != ''){
                if ($reTelDateTo != '') {
                    $sellerCarStatus->whereBetween('re_tel_date', [$reTelDateFrom, $reTelDateTo]);
                }else{
                    $sellerCarStatus->where('re_tel_date','>=', $reTelDateFrom);
                }
            }else{
                if ($reTelDateTo != '') {
                    $sellerCarStatus->where('re_tel_date','<=', $reTelDateTo);
                }
            }

            if ($status != '' && $status != 0) {
                $sellerCarStatus->where('status','=', $status);
            }

            if ($listingAccuracy != '') {
                $sellerCarStatus->where('listing_accuracy','=', $listingAccuracy);
            }
        })
        ->whereHas('sellerCarAssessment', function ($sellerCarAssessment) use ($assessmentService) {
            if ($assessmentService != ''){
                if ($assessmentService == 1) {
                    $sellerCarAssessment->where('advance', '=', '2');
                }else{
                    $sellerCarAssessment->where('advance', '=', '1') ->where('advance_method', '=', $assessmentService - 1);
                }
            }
        });

        if ($lastQueryDateFrom != ''){
            if ($lastQueryDateTo != '') {
                $query = $query->whereBetween('updated_date', [$lastQueryDateFrom, $lastQueryDateTo]);
            }else{
                $query = $query->where('updated_date','>=', $lastQueryDateFrom);
            }
        }else{
            if ($lastQueryDateTo != '') {
                $query = $query->where('updated_date','<=', $lastQueryDateTo);
            }
        }
        $result = $query->sortable()->paginate($n);

        return $result;
    }

    public function createSellerCar(){
        $data = array();
        $sellerRepo = new SellerRepository();
        $sellerCarRepo = new SellerCarRepository();
        $sellerCarStatusRepo = new SellerCarStatusRepository();
        $sellerCarDocumentRepo = new SellerCarDocumentRepository();
        $sellerCarInformationRepo = new SellerCarInformationRepository();
        $sellerCarRetrievalRepo = new SellerCarRetrievalRepository();
        $sellerCarReceptionRepo = new SellerCarReceptionRepository();
        $sellerCarSaleRepo = new SellerCarSaleRepository();
        $sellerCarAssessmentRepo = new SellerCarAssessmentRepository();
        $sellerCarSaleRepo = new SellerCarSaleRepository();
        $sellerCarRefundRepo = new SellerCarRefundRepository();
        $orderRepo = new OrderRepository();
        DB::beginTransaction();
        try {
            $data['seller_id'] = $sellerRepo->insert(array());
            $data['seller_car_id'] = $sellerCarRepo->insert(array("seller_id" => $data['seller_id']));
            $data['status_id'] = $sellerCarStatusRepo->insert(array("seller_car_id" => $data['seller_car_id']));
            $data['document_id'] = $sellerCarDocumentRepo->insert(array("seller_car_id" => $data['seller_car_id']));
            $data['infor_id'] = $sellerCarInformationRepo->insert(array("seller_car_id" => $data['seller_car_id']));
            $data['retrieval_id'] = $sellerCarRetrievalRepo->insert(array("seller_car_id" => $data['seller_car_id']));
            $data['reception_id'] = $sellerCarReceptionRepo->insert(array("seller_car_id" => $data['seller_car_id']));
            $data['assessment_id'] = $sellerCarAssessmentRepo->insert(array("seller_car_id" => $data['seller_car_id']));
            $data['sale_id'] = $sellerCarSaleRepo->insert(array("seller_car_id" => $data['seller_car_id']));
            $data['refund_id'] = $sellerCarRefundRepo->insert(array("seller_car_id" => $data['seller_car_id']));
            $data['order_id'] = $orderRepo->insert(array("seller_car_id" => $data['seller_car_id']));
            DB::commit();
            return $data;
            // all good
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            return null;
        }
    }
}
