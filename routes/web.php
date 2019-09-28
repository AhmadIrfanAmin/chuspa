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

Route::get('admin/manage-vehicles', function () {
    return view('admin.vehicles.manage-vehicles');
});

Route::get('admin/vehicle-type/add', function () {
    return view('admin.vehicles.add-vehicle-type');
});

Route::get('admin/manage-customers', function () {
    return view('admin.customers.manage-customers');
});
Route::get('admin/customer-detail', function () {
    return view('admin.customers.customer-detail');
});

Route::get('admin/manage-promos', function () {
    return view('admin.promos.manage-promos');
});

Route::get('admin/promo/add', function () {
    return view('admin.promos.add-promo');
});
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