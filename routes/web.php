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
    
    #router order
    Route::get('order',"OrderController@index");
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
    Route::post('seller-car/edit-sale',"SellerCarController@editSale");
    Route::post('seller-car/edit-sale-confirm',"SellerCarController@editSaleConfirm");
    Route::post('seller-car/edit-assessment',"SellerCarController@editAssessment");
    Route::post('seller-car/edit-transfer',"SellerCarController@editTransfer");
    Route::post('seller-car/edit-order',"SellerCarController@editOrder");
    Route::post('seller-car/add-bid',"SellerCarController@addBid");
    Route::post('seller-car/remove-bid',"SellerCarController@removeBid");
    Route::post('seller-car/add-various-cost',"SellerCarController@addVariousCost");
    Route::post('seller-car/edit-recycling',"SellerCarController@editRecycling");
    Route::post('seller-car/edit-refund',"SellerCarController@editRefund");
    Route::post('seller-car/add-image',"SellerCarController@addImage");
    Route::post('seller-car/edit-image',"SellerCarController@editImage");
    Route::post('seller-car/remove-image',"SellerCarController@removeImage");
    #route car
    Route::get('car/get-by-maker',"CarController@getByMaker");
    #route trader
    Route::get('trader', "TraderController@index");
    Route::post('trader', "TraderController@index");
    Route::post('trader-sort', "TraderController@sort");
    Route::get('trader/add.html', "TraderController@add");
    Route::post('trader/add.html', "TraderController@add");
    Route::get('trader/area','TraderController@area');
    Route::post('trader/getinfo','TraderController@getinfo');
    Route::post('trader/ajaxerea','TraderController@ajaxerea');
    Route::post('trader/saveerea','TraderController@saveerea');
    Route::post('trader/getErea','TraderController@getErea');
    Route::get('trader/edit/{id}', 'TraderController@edit');
    Route::post('trader/edit/{id}', 'TraderController@edit');
    Route::post('trader/loadzone','TraderController@loadzone');

    #route assess
    Route::get('assess', 'AssessController@index')->name('assess');
    Route::post('assess', 'AssessController@index');
    Route::post('assess-sort', 'AssessController@sort');
    Route::get('assess/edit/{id}', 'AssessController@edit')->name('assess-edit');
    Route::post('assess/edit/{id}', 'AssessController@edit');
    Route::get('assess/add', 'AssessController@add');
    Route::post('assess/add', 'AssessController@add');
    Route::get('assess/area','AssessController@area');
    Route::post('assess/getinfo','AssessController@getinfo');
    Route::post('assess/ajaxerea','AssessController@ajaxerea');
    Route::post('assess/saveerea','AssessController@saveerea');
    Route::post('assess/loadzone','AssessController@loadzone');
    Route::get('assess/delete/{id}','AssessController@delete')->name('assess-delete');
    Route::get('user', function () {
        return view('user.index');
    });
    Route::get('user/detail.html', function () {
        return view('user.detail');
    });

    Route::get('news', 'NewController@index');
    Route::post('news', 'NewController@index');
    Route::get('news/edit/{id}', 'NewController@edit');
    Route::post('news/edit/{id}', 'NewController@edit');
    Route::get('news/add', 'NewController@add');
    Route::post('news/add', 'NewController@add');
    Route::post('news/updateShow', 'NewController@updateShow');
    Route::post('news/deleteNew', 'NewController@deleteNew');
    Route::get('inquiries', 'InquiryController@index');

});