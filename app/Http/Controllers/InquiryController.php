<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\SellerRepository;
use App\Repositories\SellerCarRepository;
use App\Repositories\SellerCarStatusRepository;
use App\Repositories\SellerCarInformationRepository;
use App\Repositories\SellerCarAssessmentRepository;
use Illuminate\Support\Facades\DB;

/**  
* Class name: InquiryController  
*  
* This is a controller management Inquiries
*    
* @author  Creator:bugs - bugs.vietvang.net@gmail.com  
* @author  Updater:bugs - bugs.vietvang.net@gmail.com  
*/ 
class InquiryController extends Controller
{
    protected $sellerRepository;
    protected $sellerCarRepository;
    protected $sellerCarStatusRepository;
    protected $sellerCarInformationRepository;
    protected $sellerCarAssessmentRepository;
    public function __construct()
    {
          $this->sellerRepository = new SellerRepository;
          $this->sellerCarRepository = new SellerCarRepository;
          $this->sellerCarStatusRepository = new SellerCarStatusRepository;
          $this->sellerCarInformationRepository = new SellerCarInformationRepository;
          $this->sellerCarAssessmentRepository = new SellerCarAssessmentRepository;
    }

    /**  
    * Function: index 
    * Short description for function  
    *   
    * @param   Request   $request   
    * @return  view _ return list of news  
    *   
    */
    public function index(Request $request)
    {
        $data['list_inquiries'] = $this->sellerCarRepository->getPaginateSortable(50);
        $data['displacement'] = ['----------',
                                '1,000cc未満',
                                '1,000～1,999cc',
                                '2,000～2,999cc',
                                '3,000～3,999cc',
                                '4,000～4,999cc',
                                '5,000cc以上'];
        $data['status'] = ['----------',
                            '失注',
                            '新規',
                            '連絡待ち',
                            '要再TEL',
                            'メール済',
                            '査定後TEL',
                            '後追い長期不在',
                            '成約'];
        $data['sellers'] = $this->sellerRepository->getAll();

    	return view('inquiries.index',$data);
    }

    /**  
    * Function: index 
    * Short description for function  
    *   
    * @param   Request   $request   
    * @return  view _ return list of news  
    *   
    */
    public function search(Request $request)
    {
        $param = ['','',
                    '','','ya','','','','','','','','','','','','','','','','',''];
        $data['list_inquiries'] = $this->sellerCarRepository->getSeach(50, $param);
        echo '<pre>';
        print_r($data['list_inquiries']);
        echo '</pre>';
        die();
        $data['list_inquiries'] = $this->sellerCarRepository->getPaginateSortable(50);
        $data['displacement'] = ['----------',
                                '1,000cc未満',
                                '1,000～1,999cc',
                                '2,000～2,999cc',
                                '3,000～3,999cc',
                                '4,000～4,999cc',
                                '5,000cc以上'];
        $data['status'] = ['----------',
                            '失注',
                            '新規',
                            '連絡待ち',
                            '要再TEL',
                            'メール済',
                            '査定後TEL',
                            '後追い長期不在',
                            '成約'];
        $data['sellers'] = $this->sellerRepository->getAll();
        

        return view('inquiries.index',$data);
    }

    /**  
    * Function: deleteInquiry 
    * delete a inquiry
    *   
    * @param   Request   $request  
    * @param   int       $id
    * @return  view _ return list of news  
    *   
    */
    public function deleteInquiry(Request $request)
    {
        if ($request->isMethod('post')){
            if ($request->input('id') == '') {
                return 'false';
            }
            $inquiry = $this->sellerCarRepository->getById($request->input('id'));

            $results = 0;
            if ($inquiry != null) {
                //DB::transaction(function($inquiry) {
            //         echo'<pre>';
            // print_r($inquiry->sellerCarStatus->id);
            // echo '</pre>';
            // die();
                DB::beginTransaction();
                    $results = $this->sellerCarStatusRepository->destroy($inquiry->sellerCarStatus->id);
                    $results = $this->sellerCarInformationRepository->destroy($inquiry->sellerCarInformation->id);
                    $results = $this->sellerCarAssessmentRepository->destroy($inquiry->sellerCarAssessment->id);
                    $results = $this->sellerCarRepository->destroy($request->input('id'));

                //});
            }

            
            if ($results == 1) {
                DB::commit();
                return 'true';
            }else{
                DB::rollBack();
                return 'false';
            }
            
        }else{
            return 'false';
        }
    }

    

}
