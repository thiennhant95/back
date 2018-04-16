<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\AssessRepository;
use App\Repositories\EreaRepository;
use App\Repositories\ZoneRepository;

/**
***************************************************************************
* Controller management Assess
***************************************************************************
*
* This is a controller management assess
*
***************************************************************************
* @author: Duy
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
    }

    /**
    ***************************************************************************
    * Created: 2018/04/16
    * Show and Search Information Assess
    ***************************************************************************
    * @author: Duy
    * 
    ***************************************************************************
    */
    public function index(Request $request)
    {
        $list_zone = $this->zoneRepository->GetZoneAll();
        $data['list_zone'] = $list_zone;
        foreach($list_zone as $zone)
        {
            $list_erea[$zone->id] = array();
            $list_erea[$zone->id] = $this->ereaRepository->GetZoneErea($zone->id);
        }
        $data['list_erea'] = $list_erea;
    	$data['list_assess'] = $this->assessRepository->getPaginate(5);
        $search = $request->input('data');
        $pagination_url = 'assess?';
        if($request->isMethod('post'))
        {
            $data['list_assess'] = $this->assessRepository->GetSearchAssess($search['Photographer']['photographer_cd'],$search['Photographer']['name'],$search['Photographer']['phone_number'],$search['Photographer']['email'],$search['Photographer']['pref_id'],$search['Photographer']['area_code'],5);
            $pagination_url .= ($search['Photographer']['photographer_cd'] !== '') ? 'n=' . $search['Photographer']['photographer_cd'] : null;
            $pagination_url .= ($search['Photographer']['name'] !== '') ? '&t=' . $search['Photographer']['name'] : null;
            $pagination_url .= ($search['Photographer']['phone_number'] !== '') ? '&p=' . $search['Photographer']['phone_number'] : null;
            $pagination_url .= ($search['Photographer']['email'] !== '') ? '&e=' . $search['Photographer']['email'] : null;
            $pagination_url .= ($search['Photographer']['pref_id'] !== '') ? '&r=' . $search['Photographer']['pref_id'] : null;
            $pagination_url .= ($search['Photographer']['area_code'] !== '') ? '&z=' . $search['Photographer']['area_code'] : null;
            $data['list_assess']->setPath($pagination_url);
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
                $data['list_assess'] = $this->assessRepository->GetSearchAssess($n,$t,$p,$e,$r,$z,5);
                $pagination_url .= ($n !== '') ? 'n=' . $n : 'n=';
                $pagination_url .= ($t !== '') ? '&t=' . $t : '&t=';
                $pagination_url .= ($p !== '') ? '&p=' . $p : '&p=';
                $pagination_url .= ($e !== '') ? '&e=' . $e : '&e=';
                $pagination_url .= ($r !== '') ? '&r=' . $r : '&r=';
                $pagination_url .= ($z !== '') ? '&z=' . $z : '&z=';
                $data['list_assess']->setPath($pagination_url);
            }
            if(isset($_GET['col']) && isset($_GET['sort']))
            {
                $col = $_GET['col'];
                $sort = $_GET['sort'];
                $data['list_assess'] = $this->assessRepository->GetSort($col,$sort,5);
                $pagination_url .= ($col !== '') ? 'col=' . $col : 'col=';
                $pagination_url .= ($sort !== '') ? '&sort=' . $sort : '&sort=';
                $data['list_assess']->setPath($pagination_url);
            }
        }
    	return view('assess.index',$data);
    }

    /**
    ***************************************************************************
    * Created: 2018/04/16
    * Sort Information Assess
    ***************************************************************************
    * @author: Duy
    * 
    ***************************************************************************
    */
    public function sort(Request $request)
    {
        if($request->isMethod('post'))
        {
            $sort = $request->input('sort');
            $column = $request->input('column');
            $list_assess = $this->assessRepository->GetSort($column,$sort,5);
            $content = '';
            $pagination_url = 'assess?';
            foreach ($list_assess as $assess)
            {
                $content .= '<tr>
                <td><a href="/crm/Photographers/edit/1">'.$assess->id.'</a></td>
                <td>'.$assess->name.'</td>
                <td><div class="col col-md-10 text-left" style="padding-left: 0px; border-bottom: 1px dashed rgb(192, 192, 192);">'.$assess->phonetic.'</div>
                  <div class="col col-md-2 text-center" style="border-bottom: 1px dashed rgb(192, 192, 192);"> <a href="/crm/Photographers" class="call_phone" incoming_number="'.$assess->phonetic.'" dial_number="0676706005" speaker_cd="'.$assess->id.'"><span class="glyphicon glyphicon-phone-alt"></span></a> <br>
                  </div></td>
                <td><div class="col col-md-12 text-left" style="padding-left: 0px; border-bottom: 1px dashed rgb(192, 192, 192);">'.$assess->email1.'<br>
                  </div>
                  <div class="col col-md-12 text-left" style="padding-left: 0px;"></div></td>
                <td>'.$assess->assessment_frequency.'</td>
                <td>'.$assess->report_delivery_method.'</td>
                <td class="text-right" style="vertical-align: middle;">'.$assess->number_complain.'回</td>
                <td class="text-center" style="vertical-align: middle;"><form action="/crm/Photographers/delete/1" name="post_5a793d5ccfac9381289341" id="post_5a793d5ccfac9381289341" style="display:none;" method="post">
                    <input type="hidden" name="_method" value="POST"/>
                  </form>
                  <a href="#" class="btn btn-danger btn-xs" onclick="if (confirm(&#039;削除してよろしいですか？ # I0000?&#039;)) { document.post_5a793d5ccfac9381289341.submit(); } event.returnValue = false; return false;">削除</a></td>
                </tr>';
            }
            $pagination_url .= ($column !== '' && $sort !== '') ? 'col=' . $column . '&sort=' . $sort : null;
            $list_assess->setPath($pagination_url);
            $data['content'] = $content;
            $data['pagination'] = $list_assess->links()->toHtml();
            return json_encode( $data );
        }
    }
}
