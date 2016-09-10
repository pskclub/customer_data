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
        Route::get('{customer_id}/bill/{bill_id}/print', 'CustomerBillController@printPDF');
        Route::get('add', 'CustomerController@add');
        Route::post('add', 'CustomerController@store');

        Route::get('{customer_id}', 'CustomerController@get');
        Route::get('{customer_id}/edit', 'CustomerController@edit');
        Route::post('{customer_id}/update', 'CustomerController@update');
        Route::get('{customer_id}/delete', 'CustomerController@del');

        Route::get('{customer_id}/image/{image_id}/delete', 'CustomerController@imageDel');

        Route::get('{customer_id}/quotation_vat', 'CustomerBillController@getQuotationVat');
        Route::get('{customer_id}/quotation_vat/add', 'CustomerBillController@addQuotationVat');
        Route::get('{customer_id}/quotation_vat/{bill_id}/edit', 'CustomerBillController@editQuotationVat');

        Route::get('{customer_id}/quotation_cash', 'CustomerBillController@getQuotationCash');
        Route::get('{customer_id}/quotation_cash/add', 'CustomerBillController@addQuotationCash');
        Route::get('{customer_id}/quotation_cash/{bill_id}/edit', 'CustomerBillController@editQuotationCash');

        Route::get('{customer_id}/quotation_list', 'CustomerBillController@getQuotationList');
        Route::get('{customer_id}/quotation_list/add', 'CustomerBillController@addQuotationList');
        Route::get('{customer_id}/quotation_list/{bill_id}/edit', 'CustomerBillController@editQuotationList');

        Route::get('{customer_id}/quotation_bill', 'CustomerBillController@getQuotationBill');
        Route::get('{customer_id}/quotation_bill/add', 'CustomerBillController@addQuotationBill');
        Route::get('{customer_id}/quotation_bill/{bill_id}/edit', 'CustomerBillController@editQuotationBill');


        Route::post('{customer_id}/bill/add', 'CustomerBillController@store');
        Route::post('{customer_id}/bill/{bill_id}/update', 'CustomerBillController@update');
        Route::get('{customer_id}/bills/{bill_id}', 'CustomerBillController@getId');
        Route::get('{customer_id}/bills/{bill_id}/delete', 'CustomerBillController@del');
    });
});