<?php 
namespace App\Repositories;
use App\Models\Situation;
/**  
* Class name: NewCategoryRepository  
*  
* This is a repository to query news_category data
*    
* @author  Creator:bugs - bugs.vietvang.net@gmail.com  
* @author  Updater:bugs - bugs.vietvang.net@gmail.com  
*/ 
class SituationRepository extends BaseRepository
{
	public function __construct(){
    	$this->model = new Situation();
    }
}
?>
