<?php
/**
 * Created by Nhan Viet Vang JSC
 * Date: 04/17/2018
 * Time: 11:21 AM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TraderRepository;
use App\Repositories\EreaRepository;
use App\Repositories\ZoneRepository;
use Illuminate\Support\Facades\Route;

/**
 ***************************************************************************
 * Controller management Trader
 ***************************************************************************
 *
 * This is a controller management trader
 *
 ***************************************************************************
 * @author: Nhan Viet Vang
 *****************************************
**/
class TraderController extends Controller
{
    protected $TraderRepository;
    public function __construct()
    {
        $this->TraderRepository = new TraderRepository;
        $this->ereaRepository = new EreaRepository;
        $this->zoneRepository = new ZoneRepository;
    }

    /**
     * Function index
     * Get all information of an object
     * @param
     * @param array of object information
     * @access public
     * @author Nhan- VietVang JSC
     */
    public function index(Request $request)
    {
        #get list zone
        $list_zone = $this->zoneRepository->GetZoneAll();
        $data['list_zone'] = $list_zone;
        foreach($list_zone as $zone)
        {
            $list_erea[$zone->id] = array();
            $list_erea[$zone->id] = $this->ereaRepository->GetZoneErea($zone->id);
        }
        #get list erea
        $data['list_erea'] = $list_erea;
        $data['list_trader'] = $this->TraderRepository->getPaginate(5);
        $search = $request->input('data');
        $pagination_url = 'trader?';
        //search
        if($request->isMethod('post'))
        {
            $data['list_trader'] = $this->TraderRepository->GetSearchTrader($search['Trader'],5);
            $pagination_url .= ($search['Trader']['name'] !== '') ? '&t=' . $search['Trader']['name'] : null;
            $pagination_url .= ($search['Trader']['phone_number'] !== '') ? '&p=' . $search['Trader']['phone_number'] : null;
            $pagination_url .= ($search['Trader']['email'] !== '') ? '&e=' . $search['Trader']['email'] : null;
            $pagination_url .= ($search['Trader']['pref_id'] !== '') ? '&r=' . $search['Trader']['pref_id'] : null;
            $pagination_url .= ($search['Trader']['staff'] !== '') ? '&z=' . $search['Trader']['staff'] : null;
            $pagination_url .= ($search['Trader']['staff'] !== '') ? '&a=' . $search['Trader']['service_start_date'] : null;
            $pagination_url .= ($search['Trader']['staff'] !== '') ? '&b=' . $search['Trader']['service_end_date'] : null;
            $pagination_url .= ($search['Trader']['staff'] !== '') ? '&c=' . $search['Trader']['curio_start_date'] : null;
            $pagination_url .= ($search['Trader']['staff'] !== '') ? '&d=' . $search['Trader']['curio_start_date'] : null;
            $data['list_trader']->setPath($pagination_url);
        }
        else
        {

        }
        return view('trader.index',$data);
    }

    /**
     * Function sort
     * sort infomation trader
     * @param array of object information
     * @access public
     * @author Nhan- VietVang JSC
     */
    public function sort(Request $request)
    {
        if($request->isMethod('post'))
        {
            $sort = $request->input('sort');
            $column = $request->input('column');
            $list_trader = $this->TraderRepository->GetSort($column,$sort,5);
            $content = '';
            print_r($list_trader);
            exit();
            $pagination_url = 'trader?';
            $data['count_list_trader'] = count($list_trader);
            foreach ($list_trader as $trader)
            {
                $data['id'][] = $trader->id;
                $data['name'][] = $trader->name;
                $data['phonetic'][] = $trader->phonetic;
                $data['email1'][] = $trader->email1;
                $data['traderment_frequency'][] = $trader->traderment_frequency;
                $data['report_delivery_method'][] = $trader->report_delivery_method;
                $data['number_complain'][] = $trader->number_complain;
            }
            $pagination_url .= ($column !== '' && $sort !== '') ? 'col=' . $column . '&sort=' . $sort : null;
            $list_trader->setPath($pagination_url);
            $data['content'] = $content;
            $data['pagination'] = $list_trader->links()->toHtml();
            return json_encode( $data );
        }
    }

    /**
     * Controller Add new record trader
     * @access public
     * @return id new record
     * @author Nhan- VietVang JSC
     */
    public function add(Request $request)
    {
        #get list zone
        $list_zone = $this->zoneRepository->GetZoneAll();
        $data['list_zone'] = $list_zone;
        foreach($list_zone as $zone)
        {
            $list_erea[$zone->id] = array();
            $list_erea[$zone->id] = $this->ereaRepository->GetZoneErea($zone->id);
        }
        #get list erea
        $data['list_erea'] = $list_erea;
        #if post != null
        if($request->isMethod('post'))
        {
            #get data input
            $data = $request->input('data');
            $info_trader['name'] = $data['Trader']['name'];
            $info_trader['zip_code'] = $data['Trader']['zip_code'];
            $info_trader['erea_id'] = $data['Trader']['pref_id'];
            $info_trader['zip_code'] = $data['Trader']['zip_code'];
            $info_trader['address'] = $data['Trader']['address'];
            $info_trader['phone'] = $data['Trader']['phone_number'];
            $info_trader['fax'] = $data['Trader']['fax_number'];
            $info_trader['building_name'] = $data['Trader']['building_name'];
            $info_trader['destination_fax'] = $data['Trader']['destination_fax'];
            $info_trader['contact_name'] = $data['Trader']['contact_name'];
            $info_trader['furigana_name'] = $data['Trader']['furigana_name'];
            $info_trader['furigana_phone'] = $data['Trader']['furigana_phone'];
            $info_trader['email'] = $data['Trader']['email'];
            $info_trader['website'] = $data['Trader']['website'];
            $info_trader['service_date'] = $data['Trader']['service_date'];
            $info_trader['curio_date'] = $data['Trader']['curio_date'];
            $info_trader['permit_number'] = $data['Trader']['permit_number'];
            $info_trader['document_confirmation_date'] = $data['Trader']['document_confirmation_date'];
            $info_trader['remark'] = $data['Trader']['remark'];
            $info_trader['assessment_area'] = $data['Trader']['assessment_area'];
            $info_trader['assessment_classification'] = $data['Trader']['assessment_classification'];
            $info_trader['assessment_level'] = $data['Trader']['assessment_level'];
            $info_trader['assessment_price'] = $data['Trader']['assessment_price'];
            $info_trader['assessment_trip'] = $data['Trader']['assessment_trip'];
            $info_trader['remark1'] = $data['Trader']['remark1'];
            $info_trader['member_status'] = $data['Trader']['member_status'];
            $info_trader['remark2'] = $data['Trader']['remark2'];
            $info_trader['bid_approval'] = $data['Trader']['bid_approval'];
            $info_trader['service_classification'] = $data['Trader']['service_classification'];
            $info_trader['remark3'] = $data['Trader']['remark3'];
            $info_trader['email_classification'] = $data['Trader']['email_classification'];
            $info_trader['new_email'] = $data['Trader']['new_email'];
            $info_trader['promotion_email_classification'] = $data['Trader']['promotion_email_classification'];
            $info_trader['promotion_email'] = $data['Trader']['promotion_email'];
            $info_trader['business_email_classification'] = $data['Trader']['business_email_classification'];
            $info_trader['business_email'] = $data['Trader']['business_email'];
            $info_trader['parent_company'] = $data['Trader']['parent_company'];
            $info_trader['business_type'] = $data['Trader']['business_type'];
            $info_trader['member_status'] = $data['Trader']['member_status'];
            $info_trader['category'] = implode(',',$data['Trader']['category']);
            $info_trader['additional_correspondence'] =implode(',',$data['Trader']['additional_correspondence']);
            $info_trader['withdraw_method'] = $data['Trader']['withdraw_method'];
            $info_trader['number_transaction'] = $data['Trader']['number_transaction'];
            $info_trader['complaint_count'] = $data['Trader']['complaint_count'];
            $info_trader['remark4'] = $data['Trader']['remark4'];
            $info_trader['claim_number'] = $data['Trader']['claim_number'];
            $info_trader['remark5'] = $data['Trader']['remark5'];
            $info_trader['payment_closing_date'] = $data['Trader']['payment_closing_date'];
            $info_trader['customer_degree'] = $data['Trader']['customer_degree'];
            $info_trader['method_statement'] = $data['Trader']['method_statement'];
            $info_trader['credit'] = $data['Trader']['credit'];
            $info_trader['deposite'] = $data['Trader']['deposite'];
            $info_trader['excess_deficit money'] = $data['Trader']['excess_deficit money'];
            $info_trader['bank_name'] = $data['Trader']['bank_name'];
            $info_trader['bank_code'] = $data['Trader']['bank_code'];
            $info_trader['branch_name'] = $data['Trader']['branch_name'];
            $info_trader['branch_code'] = $data['Trader']['branch_code'];
            $info_trader['account_type'] = $data['Trader']['account_type'];
            $info_trader['account_number'] = $data['Trader']['account_number'];
            $info_trader['account_number'] = $data['Trader']['promotion_email'];
            $info_trader['account_holder'] = $data['Trader']['account_holder'];

            //if insert data trader success
            if ($insert = $this->TraderRepository->store($info_trader))
            {
                return redirect('trader')->with('message','Inserted!');
            }
            //if insert data trader fail
            else
            {
                return redirect('trader/add.html')->with('message','Insert Fail!');
            }
        }
        return view('trader.add',$data);
    }

    /**
     * Controller edit record trader
     * @param int $id the object ID
     * @access public
     * @return boolean
     * @author Nhan- VietVang JSC
     */
    public function edit(Request $request)
    {

    }


}