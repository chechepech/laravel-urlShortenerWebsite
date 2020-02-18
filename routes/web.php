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

Route::view('/','links.welcome')->name('home');
Route::post('/','LinkController@store');
Route::get('/{hash}','LinkController@show');
Auth::routes(['register'=>FALSE,'login'=>FALSE]);
