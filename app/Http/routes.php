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

Route::auth();
//Головна сторінка. На ній відображаємо дошку
Route::get('/', 'HomeController@index');

Route::auth();

//Route::get('/home', 'HomeController@index');
 // TeamController
Route::get('/team/create', 'TeamController@create');
Route::post('/team', 'TeamController@store')->name('team.store');

// BoardController
Route::get('/board/show/{board}', 'BoardController@show');
Route::get('/board/create', 'BoardController@create');
Route::post('/board', 'BoardController@store');

//TaskController
Route::get('/task/create', 'TaskController@create');
Route::post('/task', 'TaskController@store');
Route::post('/task/update/{task}', 'TaskController@update');
