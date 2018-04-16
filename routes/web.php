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
Route::get('login.html', [ 'as' => 'login.html', 'uses' => 'Auth\LoginController@GetLogin']);
Route::post('checkLogin','Auth\LoginController@PostLogin');
Route::get('inquiries',function()
{
	return view('inquiries.index');
});
Route::get('order',function()
{
	return view('order.index');
});
Route::get('order/detail.html',"OrderController@orderDetail");
Route::post('seller/edit',"SellerController@edit");
Route::get('trader',function()
{
	return view('trader.index');
});
Route::get('trader/detail.html',function()
{
	return view('trader.detail');
});
Route::get('assess','AssessController@index');
Route::get('assess/detail.html',function(){
	return view('assess.detail');
});
Route::get('user',function()
{
	return view('user.index');
});
Route::get('user/detail.html',function()
{
	return view('user.detail');
});