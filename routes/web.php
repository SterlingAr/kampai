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


Route::get('/', function () {
    return view('welcome');
});



Route::group(['prefix' => 'bars'], function(){


    Route::get('/',[
        'uses' => 'BarController@getHome',
        'as' => 'home'
    ]);


    Route::get('find/{keyword?}',[
        'uses' => 'BarController@getBarByKeyword',
        'as' => 'getBar'
    ]);

});
