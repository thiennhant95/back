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
use App\Repositories\ZipcodeRepository;
use Illuminate\Support\Facades\Route;
use App\ValidateRequest\ValidateRequestTrader;
use Hash;

/**
 ***************************************************************************
 * Controller management trader
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
    protected $ereaRepository;
    protected $zoneRepository;
    protected $ZipcodeRepository;
    protected $Validate;
    public function __construct()
    {
        $this->TraderRepository = new TraderRepository;
        $this->ereaRepository = new EreaRepository;
        $this->zoneRepository = new ZoneRepository;
        $this->ZipcodeRepository= new ZipcodeRepository;
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
        $data['list_trader'] = $this->TraderRepository->Trader(2);
        $data['list_trader1'] = $this->customTrader($data['list_trader']);
        $search = $request->input('data');
        $pagination_url = 'trader?';
        //search
        if($request->isMethod('post'))
        {
            $data['list_trader'] = $this->TraderRepository->GetSearchTrader($search['trader'],2);
            $pagination_url .= ($search['trader']['name'] !== '') ? '&name=' . $search['trader']['name'] : null;
            $pagination_url .= ($search['trader']['phone_number'] !== '') ? '&phone=' . $search['trader']['phone_number'] : null;
            $pagination_url .= ($search['trader']['email'] !== '') ? '&email=' . $search['trader']['email'] : null;
            $pagination_url .= ($search['trader']['pref_id'] !== '') ? '&erea=' . $search['trader']['pref_id'] : null;
            $pagination_url .= ($search['trader']['staff'] !== '') ? '&status=' . $search['trader']['staff'] : null;
            $pagination_url .= ($search['trader']['service_start_date'] !== '') ? '&service_start=' . $search['trader']['service_start_date'] : null;
            $pagination_url .= ($search['trader']['service_end_date'] !== '') ? '&service_end=' . $search['trader']['service_end_date'] : null;
            $pagination_url .= ($search['trader']['curio_start_date'] !== '') ? '&curio_start=' . $search['trader']['curio_start_date'] : null;
            $pagination_url .= ($search['trader']['curio_end_date'] !== '') ? '&curio_end=' . $search['trader']['curio_end_date'] : null;
            $pagination_url .= ($search['trader']['bring_assessment'] !== '') ? '&bring=' . $search['trader']['bring_assessment'] : null;
            $pagination_url .= ($search['trader']['assessment_classification'] !== '') ? '&classification=' . $search['trader']['assessment_classification'] : null;
            $pagination_url .= (isset($search['trader']['excess_deficit_money']) && $search['trader']['excess_deficit_money'] !== '') ? '&deficit=' . $search['trader']['excess_deficit_money'] : '';
            $pagination_url .= (isset($search['trader']['bid_approval']) && $search['trader']['bid_approval'] !== '') ? '&bid=' . $search['trader']['bid_approval'] : null;
            $data['list_trader']->setPath($pagination_url);
        }
        else
        {
            if(isset($_GET['name']))
            {
                $search['trader']=[
                    'name' => $_GET['name'],
                    'phone_number' => $_GET['phone'],
                    'email' => $_GET['email'],
                    'pref_id' => $_GET['erea'],
                    'staff' => $_GET['status'],
                    'service_start_date' => $_GET['service_start'],
                    'service_end_date' => $_GET['service_end'],
                    'curio_start_date' => $_GET['curio_start'],
                    'curio_end_date' => $_GET['curio_end'],
                    'bring_assessment' => $_GET['bring'],
                    'assessment_classification' => $_GET['classification'],
                ];
                if (isset($_GET['deficit']))
                {
                    $search['trader']['excess_deficit_money']=$_GET['deficit'];
                }
                if (isset($_GET['bid']))
                {
                    $search['trader']['bid_approval']=$_GET['bid'];
                }
                $data['list_trader'] = $this->TraderRepository->GetSearchTrader($search['trader'],2);
                $pagination_url .= ($search['trader']['name'] !== '') ? 'name=' . $search['trader']['name'] : 'name=';
                $pagination_url .= ($search['trader']['phone_number'] !== '') ? '&phone=' . $search['trader']['phone_number'] : '&phone=';
                $pagination_url .= ($search['trader']['email'] !== '') ? '&email=' . $search['trader']['email'] : '&email=';
                $pagination_url .= ($search['trader']['pref_id'] !== '') ? '&erea=' . $search['trader']['pref_id']: '&erea=';
                $pagination_url .= ($search['trader']['staff'] !== '') ? '&status=' . $search['trader']['staff'] : '&status=';
                $pagination_url .= ($search['trader']['service_start_date'] !== '') ? '&service_start=' . $search['trader']['service_start_date'] : '&service_start=';
                $pagination_url .= ($search['trader']['service_end_date'] !== '') ? '&service_end=' . $search['trader']['service_end_date'] : '&service_end=';
                $pagination_url .= ($search['trader']['curio_start_date'] !== '') ? '&curio_start=' . $search['trader']['curio_start_date'] : '&curio_start=';
                $pagination_url .= ($search['trader']['curio_end_date'] !== '') ? '&curio_end=' . $search['trader']['curio_end_date'] : '&curio_end=';
                $pagination_url .= ($search['trader']['bring_assessment'] !== '') ? '&bring=' .$search['trader']['bring_assessment']: '&bring=';
                $pagination_url .= ($search['trader']['assessment_classification'] !== '') ? '&classification=' . $search['trader']['assessment_classification'] : '&classification=';
                $pagination_url .= (isset($search['trader']['excess_deficit_money']) && $search['trader']['excess_deficit_money'] !== '') ? '&excess_deficit_money=' . $search['trader']['excess_deficit_money'] : '';
                $pagination_url .= (isset($search['trader']['bid_approval']) && $search['trader']['bid_approval'] !== '') ? '&bid=' . $search['trader']['bid_approval'] : '';
                $data['list_trader']->setPath($pagination_url);
            }

            if(isset($_GET['col']) && isset($_GET['sort']))
            {
                $col = $_GET['col'];
                $sort = $_GET['sort'];
                $data['list_trader'] = $this->TraderRepository->GetSort($col,$sort,2);
                $pagination_url .= ($col !== '') ? 'col=' . $col : 'col=';
                $pagination_url .= ($sort !== '') ? '&sort=' . $sort : '&sort=';
                $data['list_trader']->setPath($pagination_url);
            }
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
//        if($request->isMethod('post'))
//        {
            echo $sort = $request->input('sort');
            echo $column = $request->input('column');
            $list_trader = $this->TraderRepository->GetSort($column,$sort,5);
            $content = '';
            $pagination_url = 'trader?';
            $data['count_list_trader'] = count($list_trader);
            foreach ($list_trader as $trader)
            {
                $data['id'][] = $trader->id;
                $data['name'][] = $trader->name;
                $data['phonetic'][] = $trader->phonetic;
                $data['zip_code'][] = $trader->zip_code;
                $data['address'][]=$trader->address;
                $data['phone'][]=$trader->phone;
                $data['fax'][]=$trader->fax;
                if ($trader->fax==0)
                {
                    $data['member_status']="非会員";
                }
                elseif($trader->fax==1)
                {
                    $data['member_status']="無料会員";
                }
                elseif($trader->fax==2)
                {
                    $data['member_status']="有料会員";
                }
                elseif($trader->fax==3)
                {
                    $data['member_status']="取引中止";
                }
                $data['credit'][] = number_format($trader->credit);
                $data['excess_deficit_money'][] = number_format($trader->excess_deficit_money);
                $trader->bring_assessment=='1'?$data['bring_assessment'][] ='不可':$data['bring_assessment'][]='可';
                $trader->assessment_classification=='1'?$data['assessment_classification'][] ='不可':$data['assessment_classification'][]='可';
                $trader->bid_approval=='1'?$data['bid_approval'][] ='不可':$data['bid_approval'][]='可';

//                $data['email'][] = $trader->email;
//                $data['report_delivery_method'][] = $trader->report_delivery_method;
//                $data['number_complain'][] = $trader->number_complain;
            }
            echo "<pre>";
            print_r($data);
            exit();
            $pagination_url .= ($column !== '' && $sort !== '') ? 'col=' . $column . '&sort=' . $sort : null;
            $list_trader->setPath($pagination_url);
            $data['content'] = $content;
            $data['pagination'] = $list_trader->links()->toHtml();
            return json_encode( $data);
//        }
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

            #validate input
            ValidateRequestTrader::validateTrader($request);

            #set data input to array insert
            $info_trader['name'] = $data['trader']['name'];
            $info_trader['phonetic'] = $data['trader']['phonetic'];
            $info_trader['zip_code'] = $data['trader']['zip_code'];
            $info_trader['erea_id'] = $data['trader']['pref_id'];
            $info_trader['zip_code'] = $data['trader']['zip_code'];
            $info_trader['address'] = $data['trader']['address'];
            $info_trader['phone'] = $data['trader']['phone_number'];
            $info_trader['fax'] = $data['trader']['fax_number'];
            $info_trader['building_name'] = $data['trader']['building_name'];
            $info_trader['destination_fax'] = $data['trader']['destination_fax'];
            $info_trader['contact_name'] = $data['trader']['contact_name'];
            $info_trader['furigana_name'] = $data['trader']['furigana_name'];
            $info_trader['furigana_phone'] = $data['trader']['furigana_phone'];
            $info_trader['email'] = $data['trader']['email'];
            $info_trader['website'] = $data['trader']['website'];
            $info_trader['service_date'] = $data['trader']['service_date'];
            $info_trader['curio_date'] = $data['trader']['curio_date'];
            $info_trader['permit_number'] = $data['trader']['permit_number'];
            $info_trader['document_confirmation_date'] = $data['trader']['document_confirmation_date'];
            $info_trader['remark'] = $data['trader']['remark'];
            $info_trader['bring_asssessment'] = $data['trader']['bring_assessment'];
            $info_trader['bought_level'] = $data['trader']['bought_level'];
            $info_trader['bought_price'] = intval(preg_replace('/[^\d.]/', '', $data['trader']['bought_price']));
            $info_trader['bought_frequency'] = $data['trader']['bought_frequency'];
            $info_trader['assessment_area'] = $data['trader']['assessment_area'];
            $info_trader['assessment_classification'] = $data['trader']['assessment_classification'];
            $info_trader['assessment_level'] = $data['trader']['assessment_level'];
            $info_trader['assessment_price'] = intval(preg_replace('/[^\d.]/', '', $data['trader']['assessment_price']));
            $info_trader['assessment_trip'] = $data['trader']['assessment_trip'];
            $info_trader['remark1'] = $data['trader']['remark1'];
            $info_trader['member_status'] = $data['trader']['member_status'];
            $info_trader['remark2'] = $data['trader']['remark2'];
            $info_trader['bid_approval'] = $data['trader']['bid_approval'];
            $info_trader['service_classification'] = $data['trader']['service_classification'];
            $info_trader['remark3'] = $data['trader']['remark3'];
            $info_trader['email_classification'] = $data['trader']['email_classification'];
            $info_trader['new_email'] = $data['trader']['new_email'];
            $info_trader['promotion_email_classification'] = $data['trader']['promotion_email_classification'];
            $info_trader['promotion_email'] = $data['trader']['promotion_email'];
            $info_trader['business_email_classification'] = $data['trader']['business_email_classification'];
            $info_trader['business_email'] = $data['trader']['business_email'];
            $info_trader['parent_company'] = $data['trader']['parent_company'];
            $info_trader['business_type'] = $data['trader']['business_type'];
            $info_trader['member_status'] = $data['trader']['member_status'];
            $info_trader['category'] = implode(',',$data['trader']['category']);
            $info_trader['additional_correspondence'] =implode(',',$data['trader']['additional_correspondence']);
            $info_trader['withdraw_method'] = $data['trader']['withdraw_method'];
            $info_trader['complaint_count'] = $data['trader']['complaint_count'];
            $info_trader['remark4'] = $data['trader']['remark4'];
            $info_trader['claim_number'] = $data['trader']['claim_number'];
            $info_trader['remark5'] = $data['trader']['remark5'];
            $info_trader['remark6'] = $data['trader']['remark6'];
            $info_trader['remark7'] = $data['trader']['remark7'];
            $info_trader['payment_closing_date'] = $data['trader']['payment_closing_date'];
            $info_trader['customer_degree'] = $data['trader']['customer_degree'];
            $info_trader['method_statement'] = $data['trader']['method_statement'];
            $info_trader['credit'] = $data['trader']['credit'];
            $info_trader['deposite'] = $data['trader']['deposite'];
            $info_trader['excess_deficit_money'] = $data['trader']['excess_deficit_money'];
            $info_trader['bank_name'] = $data['trader']['bank_name'];
            $info_trader['bank_code'] = $data['trader']['bank_code'];
            $info_trader['branch_name'] = $data['trader']['branch_name'];
            $info_trader['branch_code'] = $data['trader']['branch_code'];
            $info_trader['account_type'] = $data['trader']['account_type'];
            $info_trader['account_number'] = $data['trader']['account_number'];
            $info_trader['account_holder'] = $data['trader']['account_holder'];

            //if password!=null
            if (isset($data['trader']['password']))
            {
                $info_trader['password'] = Hash::make($data['trader']['password']);
            }
            //if insert data trader success
            if ($insert = $this->TraderRepository->store($info_trader))
            {
                session()->forget('zone');
                session()->forget('save_erea');
                session()->forget('corresponding_erea');
                $request->session()->forget('save_erea');
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
    public function edit(Request $request,$id)
    {
        $list_zone = $this->zoneRepository->GetZoneAll();
        $data['list_zone'] = $list_zone;
        foreach($list_zone as $zone)
        {
            $list_erea[$zone->id] = array();
            $list_erea[$zone->id] = $this->ereaRepository->GetZoneErea($zone->id);
        }
        $data['list_erea'] = $list_erea;
        $data['trader'] = $this->TraderRepository->getById($id);
        if($request->isMethod('post'))
        {

            #get data input
            $data = $request->input('data');

            #validate input
            ValidateRequestTrader::validateTrader($request);

            #set data input to array update
            $info_trader['name'] = $data['trader']['name'];
            $info_trader['phonetic'] = $data['trader']['phonetic'];
            $info_trader['zip_code'] = $data['trader']['zip_code'];
            $info_trader['erea_id'] = $data['trader']['pref_id'];
            $info_trader['zip_code'] = $data['trader']['zip_code'];
            $info_trader['address'] = $data['trader']['address'];
            $info_trader['phone'] = $data['trader']['phone_number'];
            $info_trader['fax'] = $data['trader']['fax_number'];
            $info_trader['building_name'] = $data['trader']['building_name'];
            $info_trader['destination_fax'] = $data['trader']['destination_fax'];
            $info_trader['contact_name'] = $data['trader']['contact_name'];
            $info_trader['furigana_name'] = $data['trader']['furigana_name'];
            $info_trader['furigana_phone'] = $data['trader']['furigana_phone'];
            $info_trader['email'] = $data['trader']['email'];
            $info_trader['website'] = $data['trader']['website'];
            $info_trader['service_date'] = $data['trader']['service_date'];
            $info_trader['curio_date'] = $data['trader']['curio_date'];
            $info_trader['permit_number'] = $data['trader']['permit_number'];
            $info_trader['document_confirmation_date'] = $data['trader']['document_confirmation_date'];
            $info_trader['remark'] = $data['trader']['remark'];
            $info_trader['bring_asssessment'] = $data['trader']['bring_assessment'];
            $info_trader['bought_level'] = $data['trader']['bought_level'];
            $info_trader['bought_price'] = intval(preg_replace('/[^\d.]/', '', $data['trader']['bought_price']));
            $info_trader['bought_frequency'] = $data['trader']['bought_frequency'];
            $info_trader['assessment_area'] = $data['trader']['assessment_area'];
            $info_trader['assessment_classification'] = $data['trader']['assessment_classification'];
            $info_trader['assessment_level'] = $data['trader']['assessment_level'];
            $info_trader['assessment_price'] = intval(preg_replace('/[^\d.]/', '', $data['trader']['assessment_price']));
            $info_trader['assessment_trip'] = $data['trader']['assessment_trip'];
            $info_trader['remark1'] = $data['trader']['remark1'];
            $info_trader['member_status'] = $data['trader']['member_status'];
            $info_trader['remark2'] = $data['trader']['remark2'];
            $info_trader['bid_approval'] = $data['trader']['bid_approval'];
            $info_trader['service_classification'] = $data['trader']['service_classification'];
            $info_trader['remark3'] = $data['trader']['remark3'];
            $info_trader['email_classification'] = $data['trader']['email_classification'];
            $info_trader['new_email'] = $data['trader']['new_email'];
            $info_trader['promotion_email_classification'] = $data['trader']['promotion_email_classification'];
            $info_trader['promotion_email'] = $data['trader']['promotion_email'];
            $info_trader['business_email_classification'] = $data['trader']['business_email_classification'];
            $info_trader['business_email'] = $data['trader']['business_email'];
            $info_trader['parent_company'] = $data['trader']['parent_company'];
            $info_trader['business_type'] = $data['trader']['business_type'];
            $info_trader['member_status'] = $data['trader']['member_status'];
            $info_trader['category'] = implode(',',$data['trader']['category']);
            $info_trader['additional_correspondence'] =implode(',',$data['trader']['additional_correspondence']);
            $info_trader['withdraw_method'] = $data['trader']['withdraw_method'];
            $info_trader['complaint_count'] = $data['trader']['complaint_count'];
            $info_trader['remark4'] = $data['trader']['remark4'];
            $info_trader['claim_number'] = $data['trader']['claim_number'];
            $info_trader['remark5'] = $data['trader']['remark5'];
            $info_trader['remark6'] = $data['trader']['remark6'];
            $info_trader['remark7'] = $data['trader']['remark7'];
            $info_trader['payment_closing_date'] = $data['trader']['payment_closing_date'];
            $info_trader['customer_degree'] = $data['trader']['customer_degree'];
            $info_trader['method_statement'] = $data['trader']['method_statement'];
            $info_trader['credit'] = $data['trader']['credit'];
            $info_trader['deposite'] = $data['trader']['deposite'];
            $info_trader['excess_deficit_money'] = $data['trader']['excess_deficit_money'];
            $info_trader['bank_name'] = $data['trader']['bank_name'];
            $info_trader['bank_code'] = $data['trader']['bank_code'];
            $info_trader['branch_name'] = $data['trader']['branch_name'];
            $info_trader['branch_code'] = $data['trader']['branch_code'];
            $info_trader['account_type'] = $data['trader']['account_type'];
            $info_trader['account_number'] = $data['trader']['account_number'];
            $info_trader['account_holder'] = $data['trader']['account_holder'];

            //if password!=null
            if (isset($data['trader']['password']))
            {
                $info_trader['password'] = Hash::make($data['trader']['password']);
            }

            //if update data trader success
            if ($insert = $this->TraderRepository->update($id,$info_trader))
            {
                session()->forget('zone');
                session()->forget('save_erea');
                session()->forget('corresponding_erea');
                $request->session()->forget('save_erea');
                return redirect('trader')->with('message','Updated!');
            }
            //if update data trader fail
            else
            {
                return redirect('trader/update/'.$id)->with('message','Update Fail!');
            }
        }
        return view('trader.detail',$data);
    }


    /**
     * Get and save name trader by session to trader erea
     * @access public
     * @author Nhan- VietVang JSC
     */
    public function getinfo(Request $request)
    {
        $request->session()->put('trader_first_name',$request->input('first_name'));
        if($request->input('corresponding_erea')  !== null)
        {
            $request->session()->put('corresponding_erea',$request->input('corresponding_erea'));
            echo session()->get('corresponding_erea');
        }
//        echo $request->input('first_name');
//        echo session()->get('trader_first_name');
//        echo session()->get('corresponding_erea');
//        die();
    }

    /**
     * Controller edit return view trader erea
     * @access public
     * @author Nhan- VietVang JSC
     */
    public function area(Request $request)
    {
        $list_zone = $this->zoneRepository->GetZoneAll();
        $data['list_zone'] = $list_zone;
        return view('trader.area',$data);
    }

    /**
     * Controller edit return view trader erea
     * @access public
     * @author Nhan- VietVang JSC
     */
    public function ajaxerea(Request $request)
    {
        $select_erea = $request->input('select_erea');
        $get_erea = $this->ereaRepository->GetZoneErea($select_erea);
        $count_erea = count($get_erea);
        $data = $get_erea;
        $data['count_erea'] = $count_erea;
        return json_encode($data);
    }

    /**
     * Controller save erea selected by session
     * @access public
     * @author Nhan- VietVang JSC
     */
    public function saveerea(Request $request)
    {
        $request->session()->put('save_erea',$request->input('save_erea'));
    }

    /**
     * Controller get Erea selected to view add/ edit
     * @access public
     * @author Nhan- VietVang JSC
     */
    public function getErea(Request $request)
    {
        $data=['erea'=>$erea=session()->get('save_erea')];
        echo json_encode($data);
        $request->session()->forget('save_erea');
        die();
    }

    /**
     ***************************************************************************
     * Created: 2018/04/19
     * Load zone edit Trader
     ***************************************************************************
     * @author: Nhan Viet Vang
     *
     ***************************************************************************
     */
    public function loadzone(Request $request)
    {
        $erea = $request->input('erea');
        $get_erea = $this->zoneRepository->GetZoneByName($erea);
        if($get_erea->name != null)
        {
            $request->session()->put('zone',$get_erea->name);
        }
    }

    /**
     ***************************************************************************
     * Created: 2018/04/19
     * Check exist zip code
     ***************************************************************************
     * @author: Nhan Viet Vang
     *
     ***************************************************************************
     */
    public function check_Zipcode(Request $request,$zip_code)
    {
        $izip=$this->ZipcodeRepository->GetZipcode($zip_code);
        if ($izip)
        {
            return json_encode(['status'=>1]);
        }
        else
        {
            return json_encode(['status'=>0]);
        }
    }


    /**
     * Group by trader by status and date of order
     * @access public
     * @author Nhan- VietVang JSC
     */
    public function customTrader($adata)
    {
//        echo "<pre>";
//        print_r($adata);
//        die();
        $status_buy=0;
        foreach ($adata as $row)
        {
            if ($row['id']==$row['trader_id'])
            {
                if ($row['status']==0)
                {
                    $status_buy++;
                }
                if ($row['status']==1)
                {

                }
            }
        }
        echo   $status_buy;


//        die();
    }
}
