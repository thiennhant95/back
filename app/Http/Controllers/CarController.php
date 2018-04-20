<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Repositories\CarRepository;

class CarController extends Controller
{
    public function getByMaker(Request $p_request){
    	$maker_id = $p_request->input("maker_id");
    	if($maker_id == null){
    		return Response::json(null);
    	}
    	$carRepo = new CarRepository();
    	$car = $carRepo->getByMaker($maker_id);
    	return Response::json($car);
    }
}
