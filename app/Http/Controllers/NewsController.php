<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\NewsRepository;
use App\Repositories\NewsCategoryRepository;
use App\ValidateRequest\ValidateRequestNews;
/**  
* Class name: NewsController  
*  
* This is a controller management new
*    
* @author  Creator:bugs - bugs.vietvang.net@gmail.com  
* @author  Updater:bugs - bugs.vietvang.net@gmail.com  
*/ 
class NewsController extends Controller
{
    protected $newRepository;
    protected $newCategoryRepository;
    public function __construct()
    {
          $this->newsRepository = new NewsRepository;
          $this->newsCategoryRepository = new NewsCategoryRepository;
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
    	$data['list_news'] = $this->newsRepository->getPaginateSortable(50);
    	return view('news.index',$data);
    }

    
    /**  
    * Function: edit 
    * Edit a new
    *   
    * @param   Request   $request  
    * @param   int       $id
    * @return  view _ return list of news  
    *   
    */
    public function edit(Request $request, $id)
    {
        // Validate param
        if ($id === ''){
            return redirect('news');
        }
        // get category
        $categories = $this->newsCategoryRepository->getAll();
        
        // get new
        $new = $this->newsRepository->getById($id);
        // get data days
        $days = [];
        for ($i=0; $i < 31; $i++) { 
            $days[$i] = $i + 1;
        }
        // get data months
        $months = [];
        for ($i=0; $i < 12; $i++) { 
            $months[$i] = $i + 1;
        }
        // get data years
        $years = [];
        for ($i=0; $i < 82; $i++) { 
            $years[$i] = $i + 2018;
        }
        $arrDisplayDate = explode("-", $new->date_display);
        $data['year'] = $arrDisplayDate[0];
        $data['month'] = $arrDisplayDate[1];
        $data['day'] = $arrDisplayDate[2];
        $data['id'] = $new->id;
        $data['news_category_id'] = $new->newss_category_id;
        $data['date_display'] = $new->date_display;
        $data['title'] = $new->title;
        $data['content'] = $new->content;
        $data['image'] = $new->image;
        $data['expand'] = $new->expand;
        $data['show'] = $new->show;
        $data['days'] = $days;
        $data['months'] = $months;
        $data['years'] = $years;
        $data['categories'] = $categories;
        $data['method'] = '/news/edit/' . $id;
        $data1=[];
        if ($request->isMethod('post')) {
            $data_request = $request->input('data');
            $data = [];
            $data['news_category_id'] = $data_request['category'];
            $data['date_display'] = $data_request['year'] . '-' . $data_request['month'] . '-' . $data_request['day'];
            $data['title'] = $data_request['title'];
            $data['content'] = $data_request['content'];
            $data['expand'] = '0';
            if ($data_request['show'] == 1 ){
                $data['show'] = '1';
            }else{
                $data['show'] = '0';
            }
            if ($request->hasFile('upfile')) {
                $path = $request->upfile->store('images/img_kupac','uploads');
                $data['image'] = $path;
            }else{
                $data['image'] = $new->image;
            }
            $update = $this->newsRepository->update($id,$data);
            if($update)
            {
                return redirect('news/edit/'.$id)->with(['results' => 'success', 'flash_messages' => 'Update Success']);
            }
            else
            {
                return redirect('news/edit/'.$id)->with(['results' => 'success', 'flash_messages' => 'Update Fail']);
            }
            
        }

        
        return view('news.detail',$data);
    }

    /**  
    * Function: updateShow 
    * update status shoe for a new
    *   
    * @param   Request   $request  
    * @return  String _ return result for update process  
    *   
    */
    public function updateShow(Request $request)
    {
        if ($request->isMethod('post')){
            if ($request->input('id') == '') {
                return 'false';
            }
            if ($request->input('show') == '') {
                return 'false';
            }
            $show = '0';
            if ( $request->input('show') == '0') {
                $show = '1';
            }
            $results = $this->newsRepository->updateShow($request->input('id'),$show);
            return $results;
        }else{
            return 'false';
        }
    }

    /**  
    * Function: deleteShow 
    * delete a new
    *   
    * @param   Request   $request  
    * @param   int       $id
    * @return  view _ return list of news  
    *   
    */
    public function deleteNews(Request $request)
    {
        if ($request->isMethod('post')){
            if ($request->input('id') == '') {
                return 'false';
            }
            $results = $this->newsRepository->destroy($request->input('id'));
            if ($results == 1) {
                return 'true';
            }else{
                return 'false';
            }
            
        }else{
            return 'false';
        }
    }

    /**  
    * Function: add 
    * Add a new
    *   
    * @param   Request   $request  
    * @param   int       $id
    * @return  view _ return list of news  
    *   
    */
    public function add(Request $request)
    {

        // get category
        $categories = $this->newsCategoryRepository->getAll();
        
        // get data days
        $days = [];
        for ($i=0; $i < 31; $i++) { 
            $days[$i] = $i + 1;
        }
        // get data months
        $months = [];
        for ($i=0; $i < 12; $i++) { 
            $months[$i] = $i + 1;
        }
        // get data years
        $years = [];
        for ($i=0; $i < 82; $i++) { 
            $years[$i] = $i + 2018;
        }
        
        $data['year'] = '';
        $data['month'] = '';
        $data['day'] = '';
        $data['id'] = '';
        $data['news_category_id'] = '';
        $data['date_display'] = '';
        $data['title'] = '';
        $data['content'] = '';
        $data['image'] = '';
        $data['expand'] = '';
        $data['show'] = '';
        $data['days'] = $days;
        $data['months'] = $months;
        $data['years'] = $years;
        $data['categories'] = $categories;
        $data['method'] = '/news/add';
        $data1=[];
        if ($request->isMethod('post')) {
            // Validate request
            ValidateRequestNews::validateNews($request);
            $data_request = $request->input('data');
            $data = [];
            $data['news_category_id'] = $data_request['category'];
            $data['date_display'] = $data_request['year'] . '-' . $data_request['month'] . '-' . $data_request['day'];
            $data['title'] = $data_request['title'];
            $data['content'] = $data_request['content'];
            $data['expand'] = '0';
            if ($data_request['show'] == 1 ){
                $data['show'] = '1';
            }else{
                $data['show'] = '0';
            }
            if ($request->hasFile('upfile')) {
                $path = $request->upfile->store('images/img_kupac','uploads');
                $data['image'] = $path;
            }
            $results = $this->newsRepository->insert($data);
            
            if($results)
            {
                return redirect('news/add/')->with(['results' => 'success', 'flash_messages' => 'Add Success']);
            }
            else
            {
                return redirect('news/add/')->with(['results' => 'success', 'flash_messages' => 'Add Fail']);
            }
            
        }

        return view('news.detail',$data);
    }

}
