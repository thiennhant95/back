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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('login.html', ['as' => 'login.html', 'uses' => 'UserController@GetLogin']);
Route::post('checkLogin', 'UserController@PostLogin');

//route middleware adminLogin
Route::group(['middleware' => ['adminLogin','ipcheck']], function () {

    Route::get('/', 'InquiryController@index');
    // Route::get('inquiries', function () {
    //     return view('inquiries.index');
    // });
    #router order
    Route::get('order',"OrderController@index");
    Route::post('order', 'OrderController@index');
    Route::post('order-sort', 'OrderController@sort');
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
    Route::post('seller-car/edit-photo',"SellerCarController@editPhoto");
    Route::post('seller-car/remove-image',"SellerCarController@removeImage");
    Route::get('order/add',"OrderController@addOrder");
    Route::post('seller/add',"SellerController@add");
    Route::post('seller/add-account',"SellerController@addAccount");
    Route::post('seller-car/add-status',"SellerCarController@addStatus");
    Route::post('seller-car/add-document',"SellerCarController@addDocument");
    Route::post('seller-car/add-information',"SellerCarController@addInformation");
    Route::post('seller-car/add-retrieval',"SellerCarController@addRetrieval");
    Route::post('seller-car/add-reception',"SellerCarController@addReception");
    Route::post('seller-car/add-sale',"SellerCarController@addSale");
    Route::post('seller-car/add-sale-confirm',"SellerCarController@addSaleConfirm");
    Route::post('seller-car/add-assessment',"SellerCarController@addAssessment");
    Route::post('seller-car/add-transfer',"SellerCarController@addTransfer");
    Route::post('seller-car/add-order',"SellerCarController@addOrder");
    Route::post('seller-car/add-recycling',"SellerCarController@addRecycling");
    Route::post('seller-car/add-refund',"SellerCarController@addRefund");
    Route::post('seller-car/add-photo',"SellerCarController@addPhoto");

    #route car
    Route::get('car/get-by-maker',"CarController@getByMaker");
    #route trader
    Route::get('trader', "TraderController@index")->name('trader');
    Route::post('trader', "TraderController@index");
    Route::post('trader-sort', "TraderController@sort");
    Route::get('trader/add.html', "TraderController@add")->name('trader-add');
    Route::post('trader/add.html', "TraderController@add");
    Route::get('trader/area','TraderController@area');
    Route::post('trader/getinfo','TraderController@getinfo');
    Route::post('trader/ajaxerea','TraderController@ajaxerea');
    Route::post('trader/saveerea','TraderController@saveerea');
    Route::post('trader/getErea','TraderController@getErea');
    Route::get('trader/edit/{id}', 'TraderController@edit')->name('trader-edit');
    Route::post('trader/edit/{id}', 'TraderController@edit');
    Route::post('trader/loadzone','TraderController@loadzone');
    Route::post('trader/check_Zipcode/{id}','TraderController@check_Zipcode');

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

    Route::get('news', 'NewsController@index');
    Route::post('news', 'NewsController@index');
    Route::get('news/edit/{id}', 'NewsController@edit');
    Route::post('news/edit/{id}', 'NewsController@edit');
    Route::get('news/add', 'NewsController@add');
    Route::post('news/add', 'NewsController@add');
    Route::post('news/updateShow', 'NewsController@updateShow');
    Route::post('news/deleteNew', 'NewsController@deleteNew');
    Route::get('inquiries', 'InquiryController@index');
    Route::post('inquiries', 'InquiryController@index');
    Route::post('inquiries/deleteInquiry', 'InquiryController@deleteInquiry');

    Route::get('logout', 'UserController@GetLogOut');

});