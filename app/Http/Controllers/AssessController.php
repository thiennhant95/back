<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\AssessRepository;
use App\Repositories\EreaRepository;
use App\Repositories\ZoneRepository;
use App\ValidateRequest\ValidateRequestAssess;
use App\Repositories\ZipcodeRepository;
use Session;

/**
***************************************************************************
* Controller management Assess
***************************************************************************
*
* This is a controller management assess
*
***************************************************************************
* @author: Duy Viet Vang
***************************************************************************
*/
class AssessController extends Controller
{
    protected $assessRepository;
    public function __construct()
    {
          $this->assessRepository = new AssessRepository;
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
     */
    public function index(Request $p_request)
    {
        $list_zone = $this->zoneRepository->GetZoneAll();
        $oData['list_zone'] = $list_zone;
        foreach($list_zone as $zone)
        {
            $list_erea[$zone->id] = array();
            $list_erea[$zone->id] = $this->ereaRepository->GetZoneErea($zone->id);
        }
        $oData['list_erea'] = $list_erea;
    	$oData['list_assess'] = $this->assessRepository->getPaginate(5);
        $search = $p_request->input('data');
        $pagination_url = 'assess?';
        if($p_request->isMethod('post'))
        {
            $oData['list_assess'] = $this->assessRepository->GetSearchAssess($search['photographer']['photographer_cd'],$search['photographer']['name'],$search['photographer']['phone_number'],$search['photographer']['email'],$search['photographer']['pref_id'],$search['photographer']['address'],5);
            $pagination_url .= ($search['photographer']['photographer_cd'] !== '') ? 'n=' . $search['photographer']['photographer_cd'] : null;
            $pagination_url .= ($search['photographer']['name'] !== '') ? '&t=' . $search['photographer']['name'] : null;
            $pagination_url .= ($search['photographer']['phone_number'] !== '') ? '&p=' . $search['photographer']['phone_number'] : null;
            $pagination_url .= ($search['photographer']['email'] !== '') ? '&e=' . $search['photographer']['email'] : null;
            $pagination_url .= ($search['photographer']['pref_id'] !== '') ? '&r=' . $search['photographer']['pref_id'] : null;
            $pagination_url .= ($search['photographer']['address'] !== '') ? '&z=' . $search['photographer']['address'] : null;
            $oData['list_assess']->setPath($pagination_url);
        }
        else
        {
            if(isset($_GET['n']) && isset($_GET['t']) && isset($_GET['p']) && isset($_GET['e']) && isset($_GET['r']) && isset($_GET['z']))
            {
                $n = $_GET['n'];
                $t = $_GET['t'];
                $p = $_GET['p'];
                $e = $_GET['e'];
                $r = $_GET['r'];
                $z = $_GET['z'];
                $oData['list_assess'] = $this->assessRepository->GetSearchAssess($n,$t,$p,$e,$r,$z,5);
                $pagination_url .= ($n !== '') ? 'n=' . $n : 'n=';
                $pagination_url .= ($t !== '') ? '&t=' . $t : '&t=';
                $pagination_url .= ($p !== '') ? '&p=' . $p : '&p=';
                $pagination_url .= ($e !== '') ? '&e=' . $e : '&e=';
                $pagination_url .= ($r !== '') ? '&r=' . $r : '&r=';
                $pagination_url .= ($z !== '') ? '&z=' . $z : '&z=';
                $oData['list_assess']->setPath($pagination_url);
            }
            if(isset($_GET['col']) && isset($_GET['sort']))
            {
                $col = $_GET['col'];
                $sort = $_GET['sort'];
                $oData['list_assess'] = $this->assessRepository->GetSort($col,$sort,5);
                $pagination_url .= ($col !== '') ? 'col=' . $col : 'col=';
                $pagination_url .= ($sort !== '') ? '&sort=' . $sort : '&sort=';
                $oData['list_assess']->setPath($pagination_url);
            }
        }
    	return view('assess.index',$oData);
    }

    /**
     * Function sort
     * sort infomation assess
     * @return result json: success or fail
     * @param array of object information
     * @access public
     */
    public function sort(Request $p_request)
    {
        if($p_request->isMethod('post'))
        {
            $sort = $p_request->input('sort');
            $column = $p_request->input('column');
            $list_assess = $this->assessRepository->GetSort($column,$sort,5);
            $content = '';
            $pagination_url = 'assess?';
            $oData['count_list_assess'] = count($list_assess);
            foreach ($list_assess as $assess)
            {
                $oData['id'][] = $assess->id;
                $oData['name'][] = $assess->name;
                $oData['phone1'][] = $assess->phone1;
                $oData['email1'][] = $assess->email1;
                $oData['assessment_frequency'][] = $assess->assessment_frequency;
                $oData['report_delivery_method'][] = $assess->report_delivery_method;
                $oData['number_complain'][] = $assess->number_complain;
            }
            $pagination_url .= ($column !== '' && $sort !== '') ? 'col=' . $column . '&sort=' . $sort : null;
            $list_assess->setPath($pagination_url);
            $oData['content'] = $content;
            $oData['pagination'] = $list_assess->links('layouts.pagination')->toHtml();
            return json_encode( $oData );
        }
    }

    /**
     * Controller Add new record assess
     * @access public
     * @return id new record
     */
    public function add(Request $p_request)
    {
        $list_zone = $this->zoneRepository->GetZoneAll();
        $oData['list_zone'] = $list_zone;
        foreach($list_zone as $zone)
        {
            $list_erea[$zone->id] = array();
            $list_erea[$zone->id] = $this->ereaRepository->GetZoneErea($zone->id);
        }
        $oData['list_erea'] = $list_erea;
        if($p_request->isMethod('post'))
        {
            ValidateRequestAssess::validateAssess($p_request);
            $data = $p_request->input('data');
            $list_corresponding_erea = '';
            if(isset($data['photographer']['corresponding_erea']))
            {
                $count_correspoding_erea = count($data['photographer']['corresponding_erea']);
                $count = 0;
                foreach($data['photographer']['corresponding_erea'] as $corresponding_erea)
                {
                    $count++;
                    if($count == $count_correspoding_erea)
                    {
                        $list_corresponding_erea .= $corresponding_erea;
                    }
                    else
                    {
                        $list_corresponding_erea .= $corresponding_erea.",";
                    }
                }
            }
            $info_assess['id'] = $data['photographer']['id'];
            $info_assess['name'] = $data['photographer']['family_name']."|".$data['photographer']['first_name'];
            $info_assess['pw'] = $data['photographer']['pw'];
            $info_assess['contract_date'] = $data['photographer']['contract_date'];
            $info_assess['phonetic'] = $data['photographer']['family_kana_name']."|".$data['photographer']['first_kana_name'];
            $info_assess['zip_code'] = $data['photographer']['zip_code'];
            $info_assess['erea_id'] = $data['photographer']['pref_id'];
            $info_assess['corresponding_erea'] = session()->get('save_erea');
            $info_assess['municipality'] = $data['photographer']['municipality'];
            $info_assess['address1'] = $data['photographer']['address1'];
            $info_assess['building_name1'] = $data['photographer']['building_name1'];
            $info_assess['address2'] = $data['photographer']['address2'];
            $info_assess['building_name2'] = $data['photographer']['building_name2'];
            $info_assess['phone1'] = $data['photographer']['phone_number1'];
            $info_assess['phone2'] = $data['photographer']['phone_number2'];
            $info_assess['fax'] = $data['photographer']['fax_number'];
            $info_assess['email1'] = $data['photographer']['email1'];
            $info_assess['email2'] = $data['photographer']['email2'];
            $info_assess['report_delivery_method'] = $data['photographer']['report_method'];
            $info_assess['gender'] = $data['photographer']['gender'];
            $info_assess['level'] = $data['photographer']['rank'];
            $info_assess['price'] = $data['photographer']['price'];
            $info_assess['assessment_frequency'] = $data['photographer']['assessment_frequency'];
            $info_assess['number_complain'] = $data['photographer']['number_complain'];
            $info_assess['remark'] = $data['photographer']['remark'];
            $info_assess['bank_name'] = $data['photographer']['bank'];
            $info_assess['bank_code'] = $data['photographer']['bank_code'];
            $info_assess['branch_name'] = $data['photographer']['branch_name'];
            $info_assess['branch_number'] = $data['photographer']['branch_number'];
            $info_assess['account_type'] = $data['photographer']['account_classification'];
            $info_assess['account_number'] = $data['photographer']['account_number'];
            $info_assess['account_holder'] = $data['photographer']['nominee_name'];
            $info_assess['expire_date'] = $data['photographer']['expiration_date'];
            $info_assess['other_remark'] = $data['photographer']['other_remark'];
            $insert = $this->assessRepository->store($info_assess);
            if($insert)
            {
                session()->forget('save_erea');
                session()->forget('assess_first_name');
                session()->forget('assess_family_name');
                return redirect('assess/add')->with(['results' => 'success', 'flash_messages' => 'Success']);
            }
            else
            {
                return redirect('assess/add')->with(['results' => 'success', 'flash_messages' => 'Fail']);
            }
        }
        return view('assess.add',$data);
    }

    /**
     * Controller edit record assess
     * @param int $id the object ID
     * @access public
     * @return boolean
     */

    public function edit(Request $p_request, $id)
    {
        $list_zone = $this->zoneRepository->GetZoneAll();
        $data['list_zone'] = $list_zone;
        foreach($list_zone as $zone)
        {
            $list_erea[$zone->id] = array();
            $list_erea[$zone->id] = $this->ereaRepository->GetZoneErea($zone->id);
        }
        $data['list_erea'] = $list_erea;
        $assess = $this->assessRepository->getById($id);
        $name = explode('|',$assess->name);
        $data['family_name'] = $name[0];
        $data['first_name'] = $name[1];
        $kana_name = explode('|',$assess->phonetic);
        $data['kana_family_name'] = $kana_name[0];
        $data['kana_first_name'] = $kana_name[1]; 
        $data['contract_date'] = date("Y-m-d",strtotime($assess->contract_date));
        $data['expire_date'] = date("Y-m-d",strtotime($assess->expire_date));
        $corresponding_erea = array();
        $corresponding_erea = explode(',',$assess->corresponding_erea);
        $data['corresponding_erea'] = $corresponding_erea;
        $data['assess'] = $assess;
        if($p_request->isMethod('post'))
        {
            ValidateRequestAssess::validateAssess($p_request);
            $data = $p_request->input('data');
            $list_corresponding_erea = '';
            if(isset($data['photographer']['corresponding_erea']))
            {
                $count_correspoding_erea = count($data['photographer']['corresponding_erea']);
                $count = 0;
                foreach($data['photographer']['corresponding_erea'] as $corresponding_erea)
                {
                    $count++;
                    if($count == $count_correspoding_erea)
                    {
                        $list_corresponding_erea .= $corresponding_erea;
                    }
                    else
                    {
                        $list_corresponding_erea .= $corresponding_erea.",";
                    }
                }
            }
            $info_assess['name'] = $data['photographer']['family_name']."|".$data['photographer']['first_name'];
            $info_assess['pw'] = $data['photographer']['pw'];
            $info_assess['contract_date'] = $data['photographer']['contract_date'];
            $info_assess['phonetic'] = $data['photographer']['family_kana_name']."|".$data['photographer']['first_kana_name'];
            $info_assess['zip_code'] = $data['photographer']['zip_code'];
            $info_assess['erea_id'] = $data['photographer']['pref_id'];
            $info_assess['corresponding_erea'] = session()->get('save_erea');
            $info_assess['municipality'] = $data['photographer']['municipality'];
            $info_assess['address1'] = $data['photographer']['address1'];
            $info_assess['building_name1'] = $data['photographer']['building_name1'];
            $info_assess['address2'] = $data['photographer']['address2'];
            $info_assess['building_name2'] = $data['photographer']['building_name2'];
            $info_assess['phone1'] = $data['photographer']['phone_number1'];
            $info_assess['phone2'] = $data['photographer']['phone_number2'];
            $info_assess['fax'] = $data['photographer']['fax_number'];
            $info_assess['email1'] = $data['photographer']['email1'];
            $info_assess['email2'] = $data['photographer']['email2'];
            $info_assess['report_delivery_method'] = $data['photographer']['report_method'];
            $info_assess['gender'] = $data['photographer']['gender'];
            $info_assess['level'] = $data['photographer']['rank'];
            $info_assess['price'] = $data['photographer']['price'];
            $info_assess['assessment_frequency'] = $data['photographer']['assessment_frequency'];
            $info_assess['number_complain'] = $data['photographer']['number_complain'];
            $info_assess['remark'] = $data['photographer']['remark'];
            $info_assess['bank_name'] = $data['photographer']['bank'];
            $info_assess['bank_code'] = $data['photographer']['bank_code'];
            $info_assess['branch_name'] = $data['photographer']['branch_name'];
            $info_assess['branch_number'] = $data['photographer']['branch_number'];
            $info_assess['account_type'] = $data['photographer']['account_classification'];
            $info_assess['account_number'] = $data['photographer']['account_number'];
            $info_assess['account_holder'] = $data['photographer']['nominee_name'];
            $info_assess['expire_date'] = $data['photographer']['expiration_date'];
            $info_assess['other_remark'] = $data['photographer']['other_remark'];
            $update = $this->assessRepository->update($id,$info_assess);
            if($update)
            {
                session()->forget('save_erea');
                session()->forget('zone');
                session()->forget('assess_first_name');
                session()->forget('assess_family_name');
                return redirect('assess/edit/'.$id)->with(['results' => 'success', 'flash_messages' => 'Update Success']);
            }
            else
            {
                return redirect('assess/edit/'.$id)->with(['results' => 'success', 'flash_messages' => 'Update Fail']);
            }
        }
        return view('assess.detail',$data);
    }

    /**
     * Create session first name , family name on assess area
     * @access public
     */
    public function getinfo(Request $p_request)
    {
        $p_request->session()->put('assess_first_name',$p_request->input('first_name'));
        $p_request->session()->put('assess_family_name',$p_request->input('family_name'));
        if($p_request->input('corresponding_erea')  !== null)
        {
            $p_request->session()->put('corresponding_erea',$p_request->input('corresponding_erea'));
        }
    }

    /**
     * Controller edit return view assess erea
     * @return view zone assess erea
     * @access public
     */
    public function area(Request $p_request)
    {
        $list_zone = $this->zoneRepository->GetZoneAll();
        $data['list_zone'] = $list_zone;
        return view('assess.area',$data);
    }

    /**
     * Controller edit return view assess erea
     * @return view erea assess erea
     * @access public
     */
    public function ajaxerea(Request $p_request)
    {
        $select_erea = $p_request->input('select_erea');
        $get_erea = $this->ereaRepository->GetZoneErea($select_erea);
        $count_erea = count($get_erea);
        $data = $get_erea;
        $data['count_erea'] = $count_erea;
        return json_encode($data);
    }


    /**
     * Controller save erea selected by session
     * @access public
     */
    public function saveerea(Request $p_request)
    {
        $p_request->session()->put('save_erea',$p_request->input('save_erea'));
    }

    /**
     * Controller load zone assess
     * @access public
     */
    public function loadzone(Request $p_request)
    {
        $erea = $p_request->input('erea');
        $get_erea = $this->zoneRepository->GetZoneByName($erea);
        if($get_erea->name != null)
        {
            $p_request->session()->put('zone',$get_erea->name);
        }
    }

    /**
     * Controller detele assess
     * @access public
     */
    public function delete($id)
    {
        $delete = $this->assessRepository->destroy($id);
        if($delete)
        {
            return redirect('assess');
        }
    }

    /**
     * Check exist zip code
     * @access public
     */
    public function check_Zipcode(Request $p_request,$zip_code)
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
}
