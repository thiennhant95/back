<?php

namespace App\Repositories;
use App\Models\Seller;
use Illuminate\Database\Eloquent\Model;

class SellerRepository extends BaseRepository
{
    public function __construct(){
    	$this->model = new Seller();
    }
}
