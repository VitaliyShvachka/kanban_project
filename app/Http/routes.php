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


//switch language
Route::get('locale/{locale}', 'LocaleController@changeLocale')->name('locale');



Route::group(['middleware' => 'set_locale'],function(){

    Route::get('login', 'Auth\AuthController@showLoginForm');
    $this->post('login', 'Auth\AuthController@login');
    $this->get('logout', 'Auth\AuthController@logout');

// Registration Routes...
    $this->get('register', 'Auth\AuthController@showRegistrationForm');
    $this->post('register', 'Auth\AuthController@register');

// Password Reset Routes...
    $this->get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
    $this->post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
    $this->post('password/reset', 'Auth\PasswordController@reset');


    ////
    Route::get('/', 'HomeController@index')->name('main');

//  TeamController
    Route::get('/team/create', 'TeamController@create')->name('team.create');
    Route::get('/team/{team}/adduser', 'TeamController@adduser')->name('team.adduser');
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
    Route::put('/task/update/{task}', 'TaskController@update')->name('task.update');
    Route::delete('/task/destroy/{task}', 'TaskController@destroy')->name('task.destroy');

});
//Головна сторінка. На ній відображаємо дошку

