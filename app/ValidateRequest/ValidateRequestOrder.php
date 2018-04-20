<?php

namespace App\ValidateRequest;

use Illuminate\Http\Request;
/*****************************************************************************
* ValidateRequestOrder
****************************************************************************
* Validate every block in order_detail.
*
**************************************************************************
* @author: Nguyen
****************************************************************************/

class ValidateRequestOrder extends ValidateRequest
{
	
    public static function validateSeller(Request $p_request){
        $arr_rule = [
            "name" => "required|max:50",
            "kana_name" => "max:50",
            "phone1" => "required|digits_between:0,13",
            "phone2" => "digits_between:0,13",
            "phone3" => "digits_between:0,13",
            "phone4" => "digits_between:0,13",
            "fax" => "digits_between:0,13",
            "zip_code" => "digits_between:0,8",
            "address" => "max:100",
            "building_number" => "max:50",
            "age" => "numeric|max:999",
            "email1" => "email|max:100",
            "email2" => "email|max:100",
            "license" => "max:10",
            "register_date" => "date",
            //"license_img" => "present|mimes:jpeg,bmp,png,gif|max:2048"
        ];
        self::setRule($arr_rule);
        self::validate($p_request);

    }

    public static function validateStatus(Request $p_request){
        $arr_rule = [
            "word_preparation" => "max:50"
        ];
        self::setRule($arr_rule);
        self::validate($p_request);

    }

    public static function validateDocument(Request $p_request){
        $arr_rule = [
            "re_tel_date" => "date"
        ];
        self::setRule($arr_rule);
        self::validate($p_request);

    }

    public static function validateAccount(Request $p_request){
        $arr_rule = [
            "bank_name" => "max:30",
            "bank_code" => "digits_between:0,4",
            "branch_name" => "max:30",
            "branch_code" => "digits_between:0,3",
            "number" => "digits_between:0,7",
            "holder" => "max:50",
        ];
        self::setRule($arr_rule);
        self::validate($p_request);

    }

    public static function validateInformation(Request $p_request){
        $arr_rule = [
            "car_year" => "date",
            "mileage" => "numeric|min:0|max:9999999999",
            "inspection_date" => "date",
            "body_color" => "numeric|min:0|max:99999",
            "displacement" => "date",
            "engine_model" => "max:10",
            "model_number" => "digits_between:0,6",
            "category_number" => "digits_between:0.4",
            "grade" => "max:50",
            "owner" => "max:50",
            "residence" => "max:100",
            "number_stamp" => "numeric|min:0|max:9",
            "balance_status" => "max:50",
            "written_guarantee" => "max:50",
            "record_book" => "max:50",
            "remark" => "max:50",
            "vehicle_number" => "max:20",
            "chassis_number" => "max:30",
        ];
        self::setRule($arr_rule);
        self::validate($p_request);

    }

    public static function validateHistory(Request $p_request){
        $arr_rule = [
            "content" => "requỉed"
        ];
        self::setRule($arr_rule);
        self::validate($p_request);

    }

    public static function validateQuestion(Request $p_request){
        $arr_rule = [
            "question" => "required"
        ];
        self::setRule($arr_rule);
        self::validate($p_request);

    }

    public static function validateReception(Request $p_request){
        $arr_rule = [
            "term_consent" => "date",
            "confirm_method" => "max:50",
            "producer_urged" => "max:50",
            "remark1" => "max:50",
            "recommend_price" => "numeric|min:1",
        ];
        self::setRule($arr_rule);
        self::validate($p_request);

    }

    public static function validateRetrieval(Request $p_request){
        $arr_rule = [
            "first_date" => "date",
            "second_date" => "date",
            "third_date" => "date",
            "takeover_place" => "max:100",
            "company_code" => "digits_between:0,10",
            "end_recognition_day" => "date",
            "end_quotation" => "date",
        ];
        self::setRule($arr_rule);
        self::validate($p_request);

    }

    public static function validateSale(Request $p_request){
        $arr_rule = [
            "sale_date" => "date",
            "amount" => "numeric|min:0|max:9999999999",
            "body_price" => "numeric|min:0|max:9999999999",
            "recycling_fee" => "numeric|min:0|max:9999999999",
            "refund_fee" => "numeric|min:0|max:9999999999",
            "delete_agent_cost" => "numeric|min:0|max:9999999999",
            "deducion_amount" => "numeric|min:0|max:9999999999",
            "distributor_name" => "max:100",
            "receivable_date" => "date",
            "billing_date" => "date",
            "golden_date" => "date",
        ];
        self::setRule($arr_rule);
        self::validate($p_request);

    }

    public static function validateSaleConfirm(Request $p_request){
        $arr_rule = [
            "confirm_body_price" => "numeric|min:0|max:9999999999",
            "confirm_established_amount" => "numeric|min:0|max:9999999999",
            "confirm_payment_deadline" => "date",
            "confirm_last_account_date" => "date",
            "confirm_billing_date" => "date",
            "confirm_clothing_date" => "date",
            "confirm_remark2" => "max:50"
        ];
        self::setRule($arr_rule);
        self::validate($p_request);

    }
    
    public static function validateAssessment(Request $p_request){
        $arr_rule = [
            "place" => "max:50",
            "place_map" => "max:50",
            "situation" => "date",
            "advance_date1" => "date",
            "advance_date2" => "date",
            "advance_date3" => "date",
            "remark1" => "max:50",
            "assessor1" => "max:50",
            "request_date" => "date",
            "assessor2" => "max:50",
            "arrival_date" => "date",
            "complete_confirmation" => "max:50",
            "synthetic" => "numeric|min:0",
            "exterior" => "numeric|min:0",
            "interior" => "numeric|min:0",
            "rater" => "max:50",
            "remark2" => "max:50"
        ];
        self::setRule($arr_rule);
        self::validate($p_request);

    }

    public static function validateTransfer(Request $p_request){
        $arr_rule = [
            "determine_amount" => "numeric|min:0|max:9999999999",
            "remark3" => "max:50"
        ];
        self::setRule($arr_rule);
        self::validate($p_request);

    }

    public static function validateOrder(Request $p_request){
        $arr_rule = [
            "asking_price" => "numeric|min:0|max:99999999",
            "deadline_date" => "date"
        ];
        self::setRule($arr_rule);
        self::validate($p_request);

    }

    public static function validateAddBid(Request $p_request){
        $arr_rule = [
            "price" => "required|numeric|min:0"
        ];
        self::setRule($arr_rule);
        self::validate($p_request);

    }

    public static function validateRemoveBid(Request $p_request){
        $arr_rule = [
            "id" => "required"
        ];
        self::setRule($arr_rule);
        self::validate($p_request);

    }

    public static function validateVariousCost(Request $p_request){
        $arr_rule = [
            "date" => "date"
        ];
        self::setRule($arr_rule);
        self::validate($p_request);

    }

    public static function validateRecycling(Request $p_request){
        $arr_rule = [
            "deposite_situation" => "max:100",
            "recycling_fee" => "numeric|min:0"
        ];
        self::setRule($arr_rule);
        self::validate($p_request);

    }

    public static function validateRefund(Request $p_request){
        $arr_rule = [
            "return_responsitory" => "numeric|min:0",
            "weight_tax_refund" => "numeric|min:0",
            "tax_date" => "date",
            "payment" => "numeric|min:0",
            "automobile_refund" => "numeric|min:0",
        ];
        self::setRule($arr_rule);
        self::validate($p_request);

    }

    public static function validateImage(Request $p_request){
        $arr_rule = [
            
        ];
        self::setRule($arr_rule);
        self::validate($p_request);

    }

    public static function validateRemoveImage(Request $p_request){
        $arr_rule = [
            "id" => "required"
        ];
        self::setRule($arr_rule);
        self::validate($p_request);

    }
}
