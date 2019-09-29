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


Route::get('admin/login', function () {
    return view('admin.login');
});

Route::get('admin/dashboard', function () {
    return view('admin.dashboard');
});


Route::get('admin/manage-vehicle-types', 'Admin\VehicleTypeController@index')->name('vehicle-types');
Route::get('admin/vehicle-type/add', 'Admin\VehicleTypeController@create');
Route::post('admin/vehicle-type/store', 'Admin\VehicleTypeController@store')->name('vehicle-type.store');
Route::get('admin/vehicle-type/{type}/edit', 'Admin\VehicleTypeController@edit')->name('vehicle-type.edit');
Route::post('admin/vehicle-type/{type}', 'Admin\VehicleTypeController@update')->name('vehicle-type.update');
Route::delete('admin/type/{id}', 'Admin\VehicleTypeController@destroy')->name('vehicle-type.destroy');


Route::get('admin/manage-customers', function () {
    return view('admin.customers.manage-customers');
});
Route::get('admin/customer-detail', function () {
    return view('admin.customers.customer-detail');
});

Route::get('admin/manage-promos', 'Admin\PromoDiscountController@index')->name('promos');
Route::get('admin/promo/add', 'Admin\PromoDiscountController@create');
Route::post('admin/promo/store', 'Admin\PromoDiscountController@store')->name('promo.store');
Route::get('admin/promo/{promo}/edit', 'Admin\PromoDiscountController@edit')->name('promo.edit');
Route::post('admin/promo/{promo}', 'Admin\PromoDiscountController@update')->name('promo.update');
Route::delete('admin/promo/{id}', 'Admin\PromoDiscountController@destroy')->name('promo.destroy');


Route::get('admin/manage-orders', function () {
    return view('admin.orders.manage-orders');
});



Route::get('admin/manage-customer-types', function () {
    return view('admin.customer-types.manage-customer-types');
});

Route::get('admin/customer-type/add', function () {
    return view('admin.customer-types.add-customer-type');
});

Route::get('admin/manage-drivers', function () {
    return view('admin.drivers.manage-drivers');
});

Route::get('admin/driver-detail', function () {
    return view('admin.drivers.driver-detail');
});

Route::get('admin/order-driver-route', function () {
    return view('admin.orders.driver-order-route');
});