<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
/**  
* Class name: New  
*  
* Model for news table 
*    
* @author  Creator:bugs - bugs.vietvang.net@gmail.com  
* @author  Updater:bugs - bugs.vietvang.net@gmail.com  
*/ 
class News extends Model
{
	use Sortable;
    protected $table = "news";
    public $timestamps = false;
    protected $fillable = ['news_category_id','date_display','title','content','image','expand','show'];
    public $sortable = ['news_category_id','date_display','title','show'];
    public function newsCategory()
    {
        return $this->belongsTo('App\Models\NewsCategory', 'news_category_id');
    }
}
