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
	/*****************************************************************************
    * Created: 2018/04/19
    * Validate seller block
    ***************************************************************************
    * @author: Nguyen. If get error, it returns an error message and stops.
    ****************************************************************************/
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
            "age" => "nullable|numeric|max:999",
            "email1" => "nullable|email|max:100",
            "email2" => "nullable|email|max:100",
            "license" => "max:10",
            "register_date" => "nullable|date",
            "license_img" => "nullable|image|max:2048"
        ];
        self::setRule($arr_rule);
        self::validate($p_request);

    }

    /*****************************************************************************
    * Created: 2018/04/19
    * Validate statú block
    ***************************************************************************
    * @author: Nguyen. If get error, it returns an error message and stops.
    ****************************************************************************/
    public static function validateStatus(Request $p_request){
        $arr_rule = [
            "word_preparation" => "max:50",
            "re_tel_date" => "nullable|date"
        ];
        self::setRule($arr_rule);
        self::validate($p_request);

    }

    /*****************************************************************************
    * Created: 2018/04/19
    * Validate document block
    ***************************************************************************
    * @author: Nguyen. If get error, it returns an error message and stops.
    ****************************************************************************/
    public static function validateDocument(Request $p_request){
        $arr_rule = [
            "re_tel_date" => "nullable|date"
        ];
        self::setRule($arr_rule);
        self::validate($p_request);

    }

    /*****************************************************************************
    * Created: 2018/04/19
    * Validate account block
    ***************************************************************************
    * @author: Nguyen. If get error, it returns an error message and stops.
    ****************************************************************************/
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

    /*****************************************************************************
    * Created: 2018/04/19
    * Validate vehicle information block
    ***************************************************************************
    * @author: Nguyen. If get error, it returns an error message and stops.
    ****************************************************************************/
    public static function validateInformation(Request $p_request){
        $arr_rule = [
            "mileage" => "nullable|numeric|min:0|max:9999999999",
            "body_color" => "nullable|numeric|min:0|max:99999",
            "displacement" => "nullable|date",
            "engine_model" => "max:10",
            "model_number" => "digits_between:0,6",
            "category_number" => "digits_between:0,4",
            "grade" => "max:50",
            "owner" => "max:50",
            "residence" => "max:100",
            "number_stamp" => "nullable|numeric|min:0|max:9",
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

    /*****************************************************************************
    * Created: 2018/04/19
    * Validate history block
    ***************************************************************************
    * @author: Nguyen. If get error, it returns an error message and stops.
    ****************************************************************************/
    public static function validateHistory(Request $p_request){
        $arr_rule = [
            "content" => "required"
        ];
        self::setRule($arr_rule);
        self::validate($p_request);

    }

    /*****************************************************************************
    * Created: 2018/04/19
    * Validate question block
    ***************************************************************************
    * @author: Nguyen. If get error, it returns an error message and stops.
    ****************************************************************************/
    public static function validateQuestion(Request $p_request){
        $arr_rule = [
            "question" => "required"
        ];
        self::setRule($arr_rule);
        self::validate($p_request);

    }

    /*****************************************************************************
    * Created: 2018/04/19
    * Validate reception block
    ***************************************************************************
    * @author: Nguyen. If get error, it returns an error message and stops.
    ****************************************************************************/
    public static function validateReception(Request $p_request){
        $arr_rule = [
            "term_consent" => "nullable|date",
            "confirm_method" => "max:50",
            "producer_urged" => "max:50",
            "remark1" => "max:50",
            "recommend_price" => "nullable|numeric|min:1",
        ];
        self::setRule($arr_rule);
        self::validate($p_request);

    }

    /*****************************************************************************
    * Created: 2018/04/19
    * Validate retrieval block
    ***************************************************************************
    * @author: Nguyen. If get error, it returns an error message and stops.
    ****************************************************************************/
    public static function validateRetrieval(Request $p_request){
        $arr_rule = [
            "first_date" => "nullable|date",
            "second_date" => "nullable|date",
            "third_date" => "nullable|date",
            "takeover_place" => "max:100",
            "company_code" => "digits_between:0,10",
            "end_recognition_day" => "nullable|date",
            "end_quotation" => "nullable|date",
        ];
        self::setRule($arr_rule);
        self::validate($p_request);

    }

    /*****************************************************************************
    * Created: 2018/04/19
    * Validate sale block
    ***************************************************************************
    * @author: Nguyen. If get error, it returns an error message and stops.
    ****************************************************************************/
    public static function validateSale(Request $p_request){
        $arr_rule = [
            "sale_date" => "nullable|date",
            "amount" => "nullable|numeric|min:0|max:9999999999",
            "body_price" => "nullable|numeric|min:0|max:9999999999",
            "recycling_fee" => "nullable|numeric|min:0|max:9999999999",
            "refund_fee" => "nullable|numeric|min:0|max:9999999999",
            "delete_agent_cost" => "nullable|numeric|min:0|max:9999999999",
            "deducion_amount" => "nullable|numeric|min:0|max:9999999999",
            "distributor_name" => "max:100",
            "receivable_date" => "nullable|date",
            "billing_date" => "nullable|date",
            "golden_date" => "nullable|date",
        ];
        self::setRule($arr_rule);
        self::validate($p_request);

    }

    /*****************************************************************************
    * Created: 2018/04/19
    * Validate sale confirm block
    ***************************************************************************
    * @author: Nguyen. If get error, it returns an error message and stops.
    ****************************************************************************/
    public static function validateSaleConfirm(Request $p_request){
        $arr_rule = [
            "confirm_body_price" => "nullable|numeric|min:0|max:9999999999",
            "confirm_established_amount" => "nullable|numeric|min:0|max:9999999999",
            "confirm_payment_deadline" => "nullable|date",
            "confirm_last_account_date" => "nullable|date",
            "confirm_billing_date" => "nullable|date",
            "confirm_clothing_date" => "nullable|date",
            "confirm_remark2" => "max:50"
        ];
        self::setRule($arr_rule);
        self::validate($p_request);

    }
    
    /*****************************************************************************
    * Created: 2018/04/19
    * Validate assess ment block
    ***************************************************************************
    * @author: Nguyen. If get error, it returns an error message and stops.
    ****************************************************************************/
    public static function validateAssessment(Request $p_request){
        $arr_rule = [
            "place" => "max:50",
            "place_map" => "max:50",
            "situation" => "nullable|date",
            "advance_date1" => "nullable|date",
            "advance_date2" => "nullable|date",
            "advance_date3" => "nullable|date",
            "remark1" => "max:50",
            "assessor1" => "max:50",
            "request_date" => "nullable|date",
            "assessor2" => "max:50",
            "arrival_date" => "nullable|date",
            "complete_confirmation" => "max:50",
            "synthetic" => "nullable|numeric|min:0",
            "exterior" => "nullable|numeric|min:0",
            "interior" => "nullable|numeric|min:0",
            "rater" => "max:50",
            "remark2" => "max:50",
            "table_img" => "nullable|image|max:2048"
        ];
        self::setRule($arr_rule);
        self::validate($p_request);

    }

    /*****************************************************************************
    * Created: 2018/04/19
    * Validate transfer block
    ***************************************************************************
    * @author: Nguyen. If get error, it returns an error message and stops.
    ****************************************************************************/
    public static function validateTransfer(Request $p_request){
        $arr_rule = [
            "determine_amount" => "nullable|numeric|min:0|max:9999999999",
            "remark3" => "max:50"
        ];
        self::setRule($arr_rule);
        self::validate($p_request);

    }

    /*****************************************************************************
    * Created: 2018/04/19
    * Validate order block
    ***************************************************************************
    * @author: Nguyen. If get error, it returns an error message and stops.
    ****************************************************************************/
    public static function validateOrder(Request $p_request){
        $arr_rule = [
            "asking_price" => "nullable|numeric|min:0|max:99999999",
            "deadline_date" => "nullable|date"
        ];
        self::setRule($arr_rule);
        self::validate($p_request);

    }

    /*****************************************************************************
    * Created: 2018/04/19
    * Validate order block
    ***************************************************************************
    * @author: Nguyen. If get error, it returns an error message and stops.
    ****************************************************************************/
    public static function validateAddBid(Request $p_request){
        $arr_rule = [
            "price" => "required|numeric|min:0"
        ];
        self::setRule($arr_rule);
        self::validate($p_request);

    }

    /*****************************************************************************
    * Created: 2018/04/19
    * Validate order block
    ***************************************************************************
    * @author: Nguyen. If get error, it returns an error message and stops.
    ****************************************************************************/
    public static function validateRemoveBid(Request $p_request){
        $arr_rule = [
            "id" => "required"
        ];
        self::setRule($arr_rule);
        self::validate($p_request);

    }

    /*****************************************************************************
    * Created: 2018/04/19
    * Validate various cost block
    ***************************************************************************
    * @author: Nguyen. If get error, it returns an error message and stops.
    ****************************************************************************/
    public static function validateVariousCost(Request $p_request){
        $arr_rule = [
            "date" => "nullable|date"
        ];
        self::setRule($arr_rule);
        self::validate($p_request);

    }

    /*****************************************************************************
    * Created: 2018/04/19
    * Validate recycling block
    ***************************************************************************
    * @author: Nguyen. If get error, it returns an error message and stops.
    ****************************************************************************/
    public static function validateRecycling(Request $p_request){
        $arr_rule = [
            "deposite_situation" => "max:100",
            "recycling_fee" => "nullable|numeric|min:0"
        ];
        self::setRule($arr_rule);
        self::validate($p_request);

    }

    /*****************************************************************************
    * Created: 2018/04/19
    * Validate refund block
    ***************************************************************************
    * @author: Nguyen. If get error, it returns an error message and stops.
    ****************************************************************************/
    public static function validateRefund(Request $p_request){
        $arr_rule = [
            "return_responsitory" => "nullable|numeric|min:0",
            "weight_tax_refund" => "nullable|numeric|min:0",
            "tax_date" => "nullable|date",
            "payment" => "nullable|numeric|min:0",
            "automobile_refund" => "nullable|numeric|min:0",
        ];
        self::setRule($arr_rule);
        self::validate($p_request);

    }

    /*****************************************************************************
    * Created: 2018/04/19
    * Validate image block
    ***************************************************************************
    * @author: Nguyen. If get error, it returns an error message and stops.
    ****************************************************************************/
    public static function validateImage(Request $p_request){
        $arr_rule = [
            "url" => "nullable|image|max:2048"
        ];
        self::setRule($arr_rule);
        self::validate($p_request);

    }

    /*****************************************************************************
    * Created: 2018/04/19
    * Validate image block
    ***************************************************************************
    * @author: Nguyen. If get error, it returns an error message and stops.
    ****************************************************************************/
    public static function validateRemoveImage(Request $p_request){
        $arr_rule = [
            "id" => "required"
        ];
        self::setRule($arr_rule);
        self::validate($p_request);

    }

    /*****************************************************************************
    * Created: 2018/04/19
    * Validate photo self
    ***************************************************************************
    * @author: Nguyen. If get error, it returns an error message and stops.
    ****************************************************************************/
    public static function validatePhoto(Request $p_request){
        $arr_rule = [
            "inspection_photo" => "nullable|image|max:2048",
            "document_photo" => "nullable|image|max:2048",
        ];
        self::setRule($arr_rule);
        self::validate($p_request);

    }
}
