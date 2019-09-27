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