<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::auth();
//Головна сторінка. На ній відображаємо дошку
Route::get('/', 'TaskController@index');



Route::auth();

Route::get('/home', 'HomeController@index');
