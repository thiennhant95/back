<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
/**  
* Class name: NewCategory  
*  
* Model for news_category table 
*    
* @author  Creator:bugs - bugs.vietvang.net@gmail.com  
* @author  Updater:bugs - bugs.vietvang.net@gmail.com  
*/ 
class NewCategory extends Model
{
	use Sortable;
    protected $table = "news_category";
    public $timestamps = false;
    protected $fillable = ['name'];
    public $sortable = ['name'];
     public function news()
    {
        return $this->hasMany('App\Models\News');
    }
}