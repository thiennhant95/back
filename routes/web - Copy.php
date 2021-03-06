<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('login.html', ['as' => 'login.html', 'uses' => 'UserController@GetLogin']);
Route::post('checkLogin', 'UserController@PostLogin');
Route::get('logout', 'UserController@GetLogOut');
//route middleware adminLogin
Route::group(['middleware' => 'adminLogin'], function () {
    Route::get('inquiries', function () {
        return view('inquiries.index');
    });
    #router order
    Route::get('order', function () {
        return view('order.index');
    });
    Route::get('order/detail.html',"OrderController@orderDetail");
    Route::post('seller/edit',"SellerController@edit");
    Route::post('seller/edit-account',"SellerController@editAccount");
    Route::post('seller-car/edit-status',"SellerCarController@editStatus");
    Route::post('seller-car/edit-document',"SellerCarController@editDocument");
    Route::post('seller-car/edit-information',"SellerCarController@editInformation");
    Route::post('seller-car/add-history',"SellerCarController@addHistory");
    Route::post('seller-car/edit-retrieval',"SellerCarController@editRetrieval");
    Route::post('seller-car/add-question',"SellerCarController@addQuestion");
    Route::post('seller-car/edit-reception',"SellerCarController@editReception");
    #route trader
    Route::get('trader', "TraderController@index");
    Route::post('trader', "TraderController@index");
    Route::post('trader-sort', "TraderController@sort");
    Route::get('trader/add.html', "TraderController@add");
    Route::post('trader/add.html', "TraderController@add");
    Route::get('trader/detail.html', function () {
        return view('trader.detail');
    });
    Route::get('assess', 'AssessController@index');
    Route::post('assess', 'AssessController@index');
    Route::post('assess-sort', 'AssessController@sort');
    Route::get('assess/edit/{id}', 'AssessController@edit');
    Route::post('assess/edit/{id}', 'AssessController@edit');
    Route::get('assess/add', 'AssessController@add');
    Route::post('assess/add', 'AssessController@add');
    Route::get('user', function () {
        return view('user.index');
    });
    Route::get('user/detail.html', function () {
        return view('user.detail');
    });

});