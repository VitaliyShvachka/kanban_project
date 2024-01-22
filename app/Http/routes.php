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
Route::get('/', 'HomeController@index')->name('main');

//  TeamController
Route::get('/team/create', 'TeamController@create');
Route::get('/team/{id}/adduser', 'TeamController@adduser');
Route::get('/team/users', 'TeamController@autocomplete');
Route::post('/team', 'TeamController@store')->name('team.store');
Route::post('/team/teamUserStore', 'TeamController@teamUserStore')->name('team.teamUserStore');

// BoardController
Route::get('/board/show/{board}', 'BoardController@show');
Route::get('/board/create', 'BoardController@create');
Route::post('/board', 'BoardController@store');

//TaskController
Route::get('/task/create', 'TaskController@create');
Route::post('/task', 'TaskController@store');
Route::post('/task/update/{task}', 'TaskController@update');
