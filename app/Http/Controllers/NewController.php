<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\NewRepository;
use App\Repositories\NewCategoryRepository;

/**  
* Class name: NewController  
*  
* This is a controller management new
*    
* @author  Creator:bugs - bugs.vietvang.net@gmail.com  
* @author  Updater:bugs - bugs.vietvang.net@gmail.com  
*/ 
class NewController extends Controller
{
    protected $newRepository;
    protected $newCategoryRepository;
    public function __construct()
    {
          $this->newRepository = new NewRepository;
          $this->newCategoryRepository = new NewCategoryRepository;
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
    	$data['list_news'] = $this->newRepository->getPaginateSortable(50);
    	return view('new.index',$data);
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
        $categories = $this->newCategoryRepository->getAll();
        
        // get new
        $new = $this->newRepository->getById($id);
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
        $data['news_category_id'] = $new->news_category_id;
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
            $update = $this->newRepository->update($id,$data);
            if($update)
            {
                return redirect('news/edit/'.$id)->with(['results' => 'success', 'flash_messages' => 'Update Success']);
            }
            else
            {
                return redirect('news/edit/'.$id)->with(['results' => 'success', 'flash_messages' => 'Update Fail']);
            }
            
        }

        
        return view('new.detail',$data);
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
            $results = $this->newRepository->updateShow($request->input('id'),$show);
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
    public function deleteNew(Request $request)
    {
        if ($request->isMethod('post')){
            if ($request->input('id') == '') {
                return 'false';
            }
            $results = $this->newRepository->destroy($request->input('id'));
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
        $categories = $this->newCategoryRepository->getAll();
        
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
            $results = $this->newRepository->insert($data);
            if($results)
            {
                return redirect('news/add/')->with(['results' => 'success', 'flash_messages' => 'Add Success']);
            }
            else
            {
                return redirect('news/add/')->with(['results' => 'success', 'flash_messages' => 'Add Fail']);
            }
            
        }

        return view('new.detail',$data);
    }

}
