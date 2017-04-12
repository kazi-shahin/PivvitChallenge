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

// For RESTFUL api
//Route::get('api/todo', ['uses' => 'UserController@testGet','middleware'=>'restapi']);
Route::get('/', ['uses' => 'PurchaseController@index','middleware'=>'restapi']);
Route::post('POST/purchase', ['uses' => 'PurchaseController@store','middleware'=>'restapi']);
Route::get('GET/purchase', ['uses' => 'PurchaseController@purchaseList','middleware'=>'restapi']);
