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
Route::post('/register','ApiController@register');

Route::post('/login_customer','ApiController@login_customer');

Route::middleware('CheckCustomerHeader')->get('/logout/{id}','ApiController@logout');

Route::middleware('CheckCustomerHeader')->get('/customer_types','ApiController@getCustomerTypes');

///Route::get('/customer_types','ApiController@getCustomerTypes');

//get customer types
//customers apis
//get orders customers
///Route::middleware('CheckCustomerHeader')->get('/customer_orders','ApiController@getCustomerOrders');
Route::get('/customer/{id}/orders','ApiController@getCustomerOrders');

//get agent location
//get customer location and return agents based on his radius 
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

///Route::middleware('CheckCustomerHeader')->post('/upload_image','ApiController@imageUploadPost');

Route::post('/upload_image','ApiController@imageUploadPost');

//Route::middleware('CheckCustomerHeader')->post('/create_order','ApiController@create_order');
Route::post('/create_order','ApiController@create_order');



//Vehicle Boy Apis

//Add Vehicle