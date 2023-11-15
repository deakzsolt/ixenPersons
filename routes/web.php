<?php

use App\Http\Controllers\Web\PersonController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::delete('person/destroy/{person}', 'App\Http\Controllers\Web\PersonController@destroy')->name('person.destroy');
Route::resources(['/' => PersonController::class]);
