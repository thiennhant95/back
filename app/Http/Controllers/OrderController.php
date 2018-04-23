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
    * Created: 2018/04/13
    * View order detail
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
        if(count($information->remove_part) != 4){
            $information->remove_part = array();
            $information->remove_part = array_prepend ($information->remove_part, 0);
            $information->remove_part = array_prepend ($information->remove_part, 0);
            $information->remove_part = array_prepend ($information->remove_part, 0);
            $information->remove_part = array_prepend ($information->remove_part, 0);
        }
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
    * Created: 2018/04/22
    * View add order
    ***************************************************************************
    * @author: Nguyen
    ****************************************************************************/
    public function addOrder(Request $p_request){
        $car = $this->carRepository->getAll();
        $data['car'] = $car;
        $equipment = $this->equipmentRepository->getAll();
        $data['equipment'] = $equipment;
        $maker = $this->makerRepository->getAll();
        $data['maker'] = $maker;
        $erea = $this->ereaRepository->getByGroupByZone();
        $data['erea'] = $erea;
        return view("order.add",$data);
    }

    /*****************************************************************************
    * Created: 2018/04/20
    * View order index
    ***************************************************************************
    * @author: Duy
    ****************************************************************************/
    public function index(Request $request)
    {
        $list_order = $this->orderRepository->GetInfoOrder(5);
        foreach($list_order as $order)
        {
            $count[$order->seller_car] = $this->orderRepository->GetCountOrder($order->seller_car);
            $price[$order->seller_car] = $this->orderRepository->GetMaxPriceOrder($order->seller_car);
            $price_difference[$order->seller_car] = $price[$order->seller_car] - $order->minimum_recommend_price;
            $various_cost[$order->seller_car] = $this->orderRepository->GetVariousCost($order->seller_car);
        }
        $data['count_order_detail'] = $count;
        $data['price_max'] = $price;
        $data['price_differences'] = $price_difference;
        $data['various_costs'] = $various_cost;
        $data['list_order'] = $list_order;
        $search = $request->input('data');
        $pagination_url = 'order?';
        if($request->isMethod('post'))
        {
            $data['list_order'] = $this->orderRepository->GetSearchOrder($search['agreementorder']['id'],$search['agreementorder']['name'],$search['agreementorder']['phone_number'],$search['agreementorder']['own_car_name'],$search['agreementorder']['agreement_start'],$search['agreementorder']['agreement_end'],$search['agreementorder']['mileage'],$search['agreementorder']['pref_name'],$search['agreementorder']['s_deadline'],$search['agreementorder']['e_deadline'],$search['agreementorder']['displacement'], $search['agreementorder']['sales_contact'],$search['agreementorder']['start_deposite'],$search['agreementorder']['end_deposite'], $search['agreementorder']['start_receive'], $search['agreementorder']['end_receive'],5);
            foreach($data['list_order']as $order)
            {
                $count[$order->seller_car] = $this->orderRepository->GetCountOrder($order->seller_car);
                $price[$order->seller_car] = $this->orderRepository->GetMaxPriceOrder($order->seller_car);
                $price_difference[$order->seller_car] = $price[$order->seller_car] - $order->minimum_recommend_price;
                $various_cost[$order->seller_car] = $this->orderRepository->GetVariousCost($order->seller_car);
            }
            $data['count_order_detail'] = $count;
            $data['price_max'] = $price;
            $data['price_differences'] = $price_difference;
            $data['various_costs'] = $various_cost;
            $pagination_url .= ($search['agreementorder']['id'] !== '') ? 'n=' . $search['agreementorder']['id'] : null;
            $pagination_url .= ($search['agreementorder']['name'] !== '') ? '&t=' . $search['agreementorder']['name'] : null;
            $pagination_url .= ($search['agreementorder']['phone_number'] !== '') ? '&p=' . $search['agreementorder']['phone_number'] : null;
            $pagination_url .= ($search['agreementorder']['agreement_start'] !== '') ? '&e=' . $search['agreementorder']['agreement_start'] : null;
            $pagination_url .= ($search['agreementorder']['agreement_end'] !== '') ? '&ae=' . $search['agreementorder']['agreement_end'] : null;
            $pagination_url .= ($search['agreementorder']['mileage'] !== '') ? '&r=' . $search['agreementorder']['mileage'] : null;
            $pagination_url .= ($search['agreementorder']['pref_name'] !== '') ? '&pr=' . $search['agreementorder']['pref_name'] : null;
            $pagination_url .= ($search['agreementorder']['s_deadline'] !== '') ? '&sd=' . $search['agreementorder']['s_deadline'] : null;
            $pagination_url .= ($search['agreementorder']['e_deadline'] !== '') ? '&ed=' . $search['agreementorder']['e_deadline'] : null;
            $pagination_url .= ($search['agreementorder']['displacement'] !== '') ? '&d=' . $search['agreementorder']['displacement'] : null;
            $pagination_url .= ($search['agreementorder']['sales_contact'] !== '') ? '&s=' . $search['agreementorder']['sales_contact'] : null;
            $pagination_url .= ($search['agreementorder']['start_deposite'] !== '') ? '&st=' . $search['agreementorder']['start_deposite'] : null;
            $pagination_url .= ($search['agreementorder']['end_deposite'] !== '') ? '&et=' . $search['agreementorder']['end_deposite'] : null;
            $pagination_url .= ($search['agreementorder']['start_receive'] !== '') ? '&sr=' . $search['agreementorder']['start_receive'] : null;
            $pagination_url .= ($search['agreementorder']['end_receive'] !== '') ? '&er=' . $search['agreementorder']['end_receive'] : null;
            $pagination_url .= ($search['agreementorder']['own_car_name'] !== '') ? '&ow=' . $search['agreementorder']['own_car_name'] : null;
            $data['list_order']->setPath($pagination_url);
        }
        else
        {
            if(isset($_GET['n']))
            {
                $n = $_GET['n'];
                $t = $_GET['t'];
                $p = $_GET['p'];
                $e = $_GET['e'];
                $r = $_GET['r'];
                $sd = $_GET['sd'];
                $ed = $_GET['ed'];
                $d = $_GET['d'];
                $s = $_GET['s'];
                $st = $_GET['st'];
                $et = $_GET['et'];
                $sr = $_GET['sr'];
                $er = $_GET['er'];
                $ow = $_GET['ow'];
                $pr = $_GET['pr'];
                $ae = $_GET['ae'];
                $data['list_order'] = $this->orderRepository->GetSearchOrder($n,$t,$p,$ow,$e,$ae,$r,$pr,$sd,$ed,$d,$s,$st,$et,$sr,$er,5);
                foreach($data['list_order']as $order)
                {
                    $count[$order->seller_car] = $this->orderRepository->GetCountOrder($order->seller_car);
                    $price[$order->seller_car] = $this->orderRepository->GetMaxPriceOrder($order->seller_car);
                    $price_difference[$order->seller_car] = $price[$order->seller_car] - $order->minimum_recommend_price;
                    $various_cost[$order->seller_car] = $this->orderRepository->GetVariousCost($order->seller_car);
                }
                $data['count_order_detail'] = $count;
                $data['price_max'] = $price;
                $data['price_differences'] = $price_difference;
                $data['various_costs'] = $various_cost;
                $pagination_url .= ($n !== '') ? 'n=' . $n : 'n=';
                $pagination_url .= ($t !== '') ? '&t=' . $t : '&t=';
                $pagination_url .= ($p !== '') ? '&p=' . $p : '&p=';
                $pagination_url .= ($e !== '') ? '&e=' . $e : '&e=';
                $pagination_url .= ($r !== '') ? '&r=' . $r : '&r=';
                $pagination_url .= ($sd !== '') ? '&sd=' . $sd : '&sd=';
                $pagination_url .= ($ed !== '') ? '&ed=' . $ed : '&ed=';
                $pagination_url .= ($d !== '') ? '&d=' . $d : '&d=';
                $pagination_url .= ($s !== '') ? '&s=' . $s : '&s=';
                $pagination_url .= ($st !== '') ? '&st=' . $st : '&st=';
                $pagination_url .= ($et !== '') ? '&et=' . $et : '&et=';
                $pagination_url .= ($sr !== '') ? '&sr=' . $sr : '&sr=';
                $pagination_url .= ($er !== '') ? '&er=' . $er : '&er=';
                $pagination_url .= ($ow !== '') ? '&ow=' . $ow : '&ow=';
                $pagination_url .= ($ae !== '') ? '&ae=' . $ae : '&ae=';
                $pagination_url .= ($er !== '') ? '&er=' . $er : '&er=';
                $pagination_url .= ($pr !== '') ? '&pr=' . $pr : '&pr=';
                $data['list_order']->setPath($pagination_url);
            }
            if(isset($_GET['col']) && isset($_GET['sort']))
            {
                $col = $_GET['col'];
                $sort = $_GET['sort'];
                $data['list_order'] = $this->orderRepository->GetSort($col,$sort,5);
                $pagination_url .= ($col !== '') ? 'col=' . $col : 'col=';
                $pagination_url .= ($sort !== '') ? '&sort=' . $sort : '&sort=';
                $data['list_order']->setPath($pagination_url);
            }
        }
        return view("order.index",$data);
    }

    /**
     * Function sort
     * sort order
     * @return result json: success or fail
     * @param array of object information
     * @access public
     */
    public function sort(Request $request)
    {
        if($request->isMethod('post'))
        {
            $sort = $request->input('sort');
            $column = $request->input('column');
            $list_order = $this->orderRepository->GetSort($column,$sort,5);
            $content = '';
            $pagination_url = 'order?';
            $data['count_list_order'] = count($list_order);
            foreach ($list_order as $order)
            {
                $data['id'][] = $order->id;
                $data['name'][] = $order->name;
                $data['erea_id'][] = $order->erea_id;
                $data['car_name'][] = $order->car_name;
                $data['displacement'][] = $order->displacement;
                $data['car_year'][] = $order->car_year;
                $data['mileage'][] = $order->mileage;
                $data['end_desired_date'][] = $order->end_desired_date;
                $data['refund_fee'][] = $order->refund_fee;
                $data['weight_tax_refund'][] = $order->weight_tax_refund;
                $data['first_inquiry_date'][] = $order->first_inquiry_date;
                $data['first_date'][] = $order->first_date;
                $data['destination'][] = $order->destination;
                $data['final_charge_amount'][] = $order->final_charge_amount;
                $data['deadline'][] = $order->deadline;
                $data['deposite_due_date'][] = $order->deposite_due_date;
                $data['document_register_date'][] = $order->document_register_date;
                $data['receivable_date'][] = $order->receivable_date;
            }
            $pagination_url .= ($column !== '' && $sort !== '') ? 'col=' . $column . '&sort=' . $sort : null;
            $list_order->setPath($pagination_url);
            $data['content'] = $content;
            $data['pagination'] = $list_order->links('layouts.pagination')->toHtml();
            return json_encode( $data );
        }
    }
}
