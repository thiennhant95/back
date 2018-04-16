<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\SellerRepository;
/*****************************************************************************
* Controller management order
****************************************************************************
* This is a controller management order
*
**************************************************************************
* @author: Nguyen
****************************************************************************/

class OrderController extends Controller
{
	protected  $sellerRepository;
	public function __construct()
    {
        $this->sellerRepository = new SellerRepository();
    }
    public function orderDetail(){
    	$seller = $this->sellerRepository->getById(1);
    	$data['seller'] = $seller;
    	return view("order.detail",$data);
    }
}
