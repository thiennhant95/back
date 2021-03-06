<?php

namespace App\Http\Controllers;
use App\Models\Seller;
use App\ValidateRequest\ValidateRequestOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Repositories\SellerRepository;
use App\Repositories\SellerCarRepository;
use App\Helper\FileHelper;
/*****************************************************************************
* Controller management seller
****************************************************************************
* This is a controller management seller car
*
**************************************************************************
* @author: Nguyen
****************************************************************************/
class SellerController extends Controller
{
    /*****************************************************************************
    * Created: 2018/04/16
    * Edit seller information
    ***************************************************************************
    * @author: Nguyen. Return result json: success or fail
    ****************************************************************************/
    public function add(Request $p_request){
        ValidateRequestOrder::validateSeller($p_request);
        $sellerCarRepository = new SellerCarRepository();
        if($p_request->input('id') == null){
            $arr_id = $sellerCarRepository->createSellerCar();
            if($arr_id == null){
                return Response::json([
                    "status" => false,
                    "message" => "fail"
                ]);
            }
            $p_request->request->add(['id' => $arr_id['seller_id']]);
            $p_request->request->add(['arr_id' => $arr_id]);
        }
        return $this->edit($p_request);
    }

	/*****************************************************************************
    * Created: 2018/04/16
    * Edit seller information
    ***************************************************************************
    * @author: Nguyen. Return result json: success or fail
    ****************************************************************************/
    public function edit(Request $p_request){
    	ValidateRequestOrder::validateSeller($p_request);
        $sellerRepo = new SellerRepository();
    	$id = $p_request->input('id');
        $sellerInfo = $sellerRepo->getById($id);
        if($sellerInfo == null){
            return Response::json([
                "status" => false,
                "message" => "fail"
            ]);
        }
        $seller['name'] = $p_request->input('name');
        $seller['kana_name'] = $p_request->input('kana_name');
        $seller['participant'] = $p_request->input('participant');
        $seller['phone1'] = $p_request->input('phone1');
        $seller['phone2'] = $p_request->input('phone2');
        $seller['phone3'] = $p_request->input('phone3');
        $seller['phone4'] = $p_request->input('phone4');
        $seller['phone_home1'] = $p_request->input('home_phone1');
        $seller['phone_home2'] = $p_request->input('home_phone2');
        $seller['phone_home3'] = $p_request->input('home_phone3');
        $seller['phone_home4'] = $p_request->input('home_phone4');
        $seller['phone_check1'] = $p_request->input('phone_check1');
        $seller['phone_check2'] = $p_request->input('phone_check2');
        $seller['phone_check3'] = $p_request->input('phone_check3');
        $seller['phone_check4'] = $p_request->input('phone_check4');
        $seller['fax'] = $p_request->input('fax');
        $seller['zip_code'] = $p_request->input('zip_code');
        $seller['erea_id'] = $p_request->input('erea_id');
        $seller['address'] = $p_request->input('address');
        $seller['building_number'] = $p_request->input('building_number');
        $seller['age'] = $p_request->input('age');
        $seller['career'] = $p_request->input('career');
        $seller['email1'] = $p_request->input('email1');
        $seller['email2'] = $p_request->input('email2');
        $seller['gender'] = $p_request->input('gender');
        $seller['license'] = $p_request->input('license');
        $license_img = FileHelper::saveImage($p_request,'license_img','sl',$id);
        if($license_img != null){
            $seller['license_img'] = $license_img;
            FileHelper::deleteImage($sellerInfo->license_img);
        }
        
        $seller['register_date'] = $p_request->input('register_date');
        
        $status = $sellerRepo->update($id,$seller);
        $result = [
            "status" => true,
            "message" => "success",
            "new_id" => $p_request->input('arr_id')
        ];
        if($status == false){
            $result["status"] = false;
            $result["message"] = "fail";
        }
        return Response::json($result);
    }

    /*****************************************************************************
    * Created: 2018/04/22
    * Edit seller information
    ***************************************************************************
    * @author: Nguyen. Return result json: success or fail
    ****************************************************************************/
    public function addAccount(Request $p_request){
        ValidateRequestOrder::validateAccount($p_request);
        $sellerCarRepository = new SellerCarRepository();
        if($p_request->input('id') == null){
            $arr_id = $sellerCarRepository->createSellerCar();
            if($arr_id == null){
                return Response::json([
                    "status" => false,
                    "message" => "fail"
                ]);
            }
            $p_request->request->add(['id' => $arr_id['seller_id']]);
            $p_request->request->add(['arr_id' => $arr_id]);
        }
        return $this->editAccount($p_request);
    }

    /*****************************************************************************
    * Created: 2018/04/16* Edit seller account
    ***************************************************************************
    * @author: Nguyen. Return result json: success or fail
    ****************************************************************************/

    public function editAccount(Request $p_request){
    	ValidateRequestOrder::validateAccount($p_request);
    	$id = $p_request->input('id');
        $seller['bank_name'] = $p_request->input('bank_name');
        $seller['bank_code'] = $p_request->input('bank_code');
        $seller['branch_name'] = $p_request->input('branch_name');
        $seller['branch_code'] = $p_request->input('branch_code');
        $seller['account_type'] = $p_request->input('account_type');
        $seller['account_number'] = $p_request->input('account_number');
        $seller['account_holder'] = $p_request->input('account_holder');
        $seller['transfer_status'] = $p_request->input('transfer_status');
        $sellerRepo = new SellerRepository();
        $status = $sellerRepo->update($id,$seller);
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
