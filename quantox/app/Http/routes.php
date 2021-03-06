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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::group(['middleware' => ['web']], function(){
    Route::post('search', 'SearchController@post_search');
    Route::get('results/{keyword}', ['uses' => 'SearchController@get_results','middleware' => 'auth' ]);
    
    Route::get('auth/facebook', 'FacebookController@redirectToProvider')->name('facebook.login');
    Route::get('auth/facebook/callback', 'FacebookController@handleProviderCallback');
    
});

Route::get('/home', 'HomeController@index');
