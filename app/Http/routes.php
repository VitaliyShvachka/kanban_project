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
Route::get('/team/create', 'TeamController@create')->name('team.create');
Route::get('/team/{id}/adduser', 'TeamController@adduser');
Route::get('/team/users', 'TeamController@autocomplete');
Route::post('/team', 'TeamController@store')->name('team.store');
Route::post('/team/teamUserStore', 'TeamController@teamUserStore')->name('team.teamUserStore');

// BoardController
Route::get('/board/{board}/show', 'BoardController@show')->name('board.show');
Route::get('/board/{team}/create', 'BoardController@create')->name('board.create');
Route::post('/{team}/board', 'BoardController@store')->name('board.store');

//TaskController
Route::get('/task/{board}/create', 'TaskController@create')->name('task.create');
Route::get('/board/{board}/{task}/show', 'TaskController@show')->name('task.show');
Route::post('/task', 'TaskController@store')->name('task.store');
Route::post('/task/update/{task}', 'TaskController@update')->name('task.update');
