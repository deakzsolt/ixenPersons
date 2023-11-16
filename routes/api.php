<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/list','App\Http\Controllers\Api\PersonController@list');
Route::post('/store','App\Http\Controllers\Api\PersonController@store');
Route::get('/edit/{person}','App\Http\Controllers\Api\PersonController@edit');
Route::post('/update/{person}','App\Http\Controllers\Api\PersonController@update');
Route::get('/destroy/{person}','App\Http\Controllers\Api\PersonController@destroy');

