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

use Illuminate\Http\Request;

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

    Route::get('test', function(){


        $query = http_build_query([
            'client_id' => 3,
            'redirect_uri' => 'http://kampai.local/bar/auth-user',
            'response_type' => 'code',
            'scope' => '',
        ]);

        return redirect('http://kampai.local/oauth/authorize?' . $query);

    });

    Route::get('auth-user', function(Request $request) {

        $http = new GuzzleHttp\Client;

        $response = $http->post('http://kampai.local/oauth/token', [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => '3',
                'client_secret' => 'XOZ5cTqVNrJYZkjZ7wYd4RcVFa8QumLnHsVbB2mh',
                'redirect_url' => 'http://kampai.local/bar/auth-user',
                'code'  => $request->code,

            ],
        ]);

        return json_decode((string) $response->getBody(),true);

    });




});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
