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


Route::get('/', function ()
{
    return 'The quieter you are the more you hear.';
});




Route::group(['prefix' => 'bar'], function()
{


    Route::get('/', [
        'uses' => 'BarControllerFrontend@index',
        'as' => 'home'
    ]);




});
