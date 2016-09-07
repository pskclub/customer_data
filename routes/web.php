<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'MainController@index');
Route::get('/login', 'Auth\CustomAuthController@getLogin');
Route::get('/logout', 'Auth\CustomAuthController@logout');
Route::post('/login', 'Auth\CustomAuthController@postLogin');

Route::group(['prefix' => 'dashboard', 'middleware' => 'admin'], function () {

    Route::get('/', 'DashBoardController@index');

    Route::group(['prefix' => 'customer'], function () {
        Route::get('add', 'CustomerController@add');
        Route::post('add', 'CustomerController@store');
        Route::get('{customer_id}', 'CustomerController@get');
        Route::get('{customer_id}/add/quotation_vat', 'CustomerBillController@quotationVat');
        Route::post('{customer_id}/add_bill', 'CustomerBillController@store');
    });
});