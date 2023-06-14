<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
//  Route::get('index', 'API\UserController@index');
//  Route::post('store', 'API\UserController@store');
//  Route::get('show/{id}', 'API\UserController@show');
//  Route::put('update/{id}', 'API\UserController@update');
//  Route::delete('delete/{id}', 'API\UserController@destroy');


//  Route::get('index', 'API\UserRepoController@index');
//  Route::post('store', 'API\UserRepoController@store');
//  Route::get('show/{id}', 'API\UserRepoController@show');
//  Route::put('update/{id}', 'API\UserRepoController@update');
//  Route::delete('delete/{id}', 'API\UserRepoController@destroy');

//routes to save datas.
Route::post('/store', 'API\AungKyawPaingController@store');
Route::post('/update/{id}', 'API\AungKyawPaingController@update');
Route::post('/show', 'API\AungKyawPaingController@show');
Route::post('/delete', 'API\AungKyawPaingController@delete');
Route::post('/detail', 'API\AungKyawPaingController@student_detail');
