<?php 
namespace App\Repositories;
use App\Models\News;
/**  
* Class name: NewCategory  
*  
* This is a repository to query new data
*    
* @author  Creator:bugs - bugs.vietvang.net@gmail.com  
* @author  Updater:bugs - bugs.vietvang.net@gmail.com  
*/ 
class NewsRepository extends BaseRepository
{
	public function __construct(){
    	$this->model = new News();
    }

    /**  
    * Function: getPaginateSortable 
    * get list news with limit
    *   
    * @param   Request   $request   
    * @return  view _ return list of news  
    *   
    */
    public function getPaginateSortable($n)
    {
        return $this->model->sortable()->paginate($n);
    }

    /**  
    * Function: getPaginateSortable 
    * get list news with limit
    *   
    * @param   Request   $request   
    * @return  bolean _ return save success or fail 
    *   
    */
    public function updateShow($id, $show)
    {
        $new = $this->model->find($id);
        $new->show = $show;
        $saved = $new->save();
        if(!$saved){
            return 'false';
        }

        return 'true';
    }

    
}
?>