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
class Situation extends Model
{
	use Sortable;
    protected $table = "situation";
    public $timestamps = false;
    protected $fillable = ['name'];
    public $sortable = ['name'];
    public function sellerCarStatus()
    {
        return $this->hasMany('App\Models\SellerCarStatus');
    }
}