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
    return view('home');
});

Auth::routes();

Route::group(['middleware'=>['auth']], function(){
Route::resource('dashboard','DashboardController');
Route::resource('customers','CustomerController');
Route::resource('rooms','RoomController');
Route::resource('room-types','RoomTypeController');
Route::resource('bookings','BookingController');
Route::resource('reports','ReportController');
Route::get('/payments/pay/{id}','PaymentController@create');
Route::post('/payments/store/{id}','PaymentController@store');
Route::resource('payments','PaymentController');
Route::get('chart/customers','ChartController@customers');
});

Route::get('/pdf/view/{id}','PrintController@receipt');

