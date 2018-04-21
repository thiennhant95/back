<?php

namespace App\Repositories;
use App\Models\SellerCar;
use Illuminate\Database\Eloquent\Model;
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
        $name = $param[0];
        $phone = $param[1];
        $address = $param[2];
        $mail = $param[3];
        $modelName = $param[4];
        $displacement = $param[5];
        $freeword = $param[6];
        $firstInquiryDateFrom = $param[7];
        $firstInquiryDateTo = $param[8];
        $lastQueryDateFrom = $param[9];
        $lastQueryDateTo = $param[10];
        $moneyPresentDateFrom = $param[11];
        $moneyPresentDateTo = $param[12];
        $reTelDateFrom = $param[13];
        $reTelDateTo = $param[14];
        $assessmentFrequency = $param[15];
        $status = $param[16];
        $firstPersoninCharge = $param[17];
        $personChangeHistory = $param[18];
        $listingAccuracy = $param[19];
        $selfRunning = $param[20];
        $assessmentService = $param[21];
        $query = 
        $this->model::whereHas('seller', function ($seller) use ($name, $phone, $address, $mail) {

            if ($name != '') {
                $seller->where('name', 'like', '%'.$name.'%');
            }
            if ($phone != '') {
                $seller->where('phone1', 'like', '%'.$phone.'%');
            }
            if ($address != '') {
                $seller->where('address', 'like', '%'.$address.'%');
            }
            if ($mail != '') {
                $seller->where('mail', 'like', '%'.$mail.'%');
            }
            
        })
        ->whereHas('sellerCarInformation', function ($sellerCarInformation) use ($modelName) {

            if ($modelName != '') {
                $sellerCarInformation->where('car_name', 'like', '%'.$modelName.'%');
            }
            
        });
        // ->whereHas('sellerCarAssessment', function ($sellerCarAssessment) use ($modelName) {

        //     if ($modelName != '') {
        //         $sellerCarAssessment->where('car_name', 'like', '%'.$modelName.'%');
        //     }
            
        // });

        if ($displacement != '') {
            $query .= $query->where('displacement', '=' , $displacement);
        }
        $result = $query->get();

        return $result;
    }
}
