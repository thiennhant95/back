<?php

namespace App\Http\Controllers;
use App\Models\Seller;
use App\ValidateRequest\ValidateRequestOrder as ValidateRequestOrder;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function edit(Request $request){
    	ValidateRequestOrder::validateSeller($request);
    }
}
