<?php

use Illuminate\Support\Facades\Route;

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
Route::get("/photos", "instagramController@index");
Route::get("/photos/create", "instagramController@create");
Route::get("/photos/{id}/edit","instagramController@edit");
Route::post('/photos',"instagramController@store");
Route::post('/photos/{id}',"instagramController@storeComment");
Route::patch("/photos/{id}","instagramController@update");
Route::delete('/photos/{id}',"instagramController@destroy" );