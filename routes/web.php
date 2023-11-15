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
Route::get('person/{person}/edit', 'App\Http\Controllers\Web\PersonController@edit')->name('person.edit');
Route::put('person/{person}/update', 'App\Http\Controllers\Web\PersonController@update')->name('person.update');
Route::resource('/', PersonController::class)->except(
    [
        'edit',
        'update',
        'destroy',
    ]
);
