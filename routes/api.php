<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
 //   return $request->user();
//});

//get customer types
//customers apis
//get orders customers
//get driver location
//get customer location and return driver based on his radius 
//update profile
//send push notifications
//use promo code discount for order
//transaction api  
//consume promocode  decrement consume value
//online/offline
//order mark complete 
//order assign

//order cancel
//order start

//Vehicle Boy Apis

//Add Vehicle


Route::post('/register','ApiController@register');

Route::post('/login_customer','ApiController@login_customer');

Route::middleware('CheckCustomerHeader')->get('/logout/{id}','ApiController@logout');

Route::middleware('CheckCustomerHeader')->get('/customer_types','ApiController@getCustomerTypes');

Route::middleware('CheckCustomerHeader')->get('/customer/{id}/orders','ApiController@getCustomerOrders');

///Route::post('/order/status/change','ApiController@changeOrderStatus');
Route::post('/order/status/change','ApiController@update_status');

Route::get('/user/{id}/status','ApiController@checkOnlineStatus');

Route::middleware('CheckCustomerHeader')->post('/upload_image','ApiController@imageUploadPost');

Route::middleware('CheckCustomerHeader')->post('/create_order','ApiController@create_order');

Route::middleware('CheckCustomerHeader')->post('/checkPromoStatus','ApiController@checkPromoStatus');

Route::middleware('CheckCustomerHeader')->post('/get_drivers','ApiController@get_drivers');

Route::middleware('CheckVehicleBoyHeader')->post('/add_vehicle','ApiController@addVehicle');
