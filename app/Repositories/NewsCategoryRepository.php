<?php 
namespace App\Repositories;
use App\Models\NewsCategory;
/**  
* Class name: NewCategoryRepository  
*  
* This is a repository to query news_category data
*    
* @author  Creator:bugs - bugs.vietvang.net@gmail.com  
* @author  Updater:bugs - bugs.vietvang.net@gmail.com  
*/ 
class NewsCategoryRepository extends BaseRepository
{
	public function __construct(){
    	$this->model = new NewsCategory();
    }
}
?>