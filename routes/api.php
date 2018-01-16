<?php

use Illuminate\Http\Request;
use App\Http\Controllers;
use App\User;
use Illuminate\Http\Response as HttpResponse;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Reminder: create a different resource controller queries
Route::get('bars/{keywords?}/{bbox}','Api\Bar\BarController@listBars');


Route::resource('bars', 'Api\Bar\BarController', ['only' => [

    'index','show', 'create'

]]);

Route::resource('users', 'Api\Users\UserController');

Route::resource('subscriptions', 'Api\Subscription\SubscriptionListController');

Route::resource('users.bars', 'Api\Users\UserBarController', ['only' => [
    'index'
]]);



/**
 * JWT
 */
Route::group(['prefix' => 'auth'], function()
{

    Route::post('/login', 'JWTAuthController@login');


    Route::post('/register', 'JWTAuthController@register');

    Route::
});


