<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
  
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});




// Route::get('/team/', 'API\TeamApiController@index');
Route::get('/team/{id?}', 'API\TeamApiController@index');

Route::post('/team/store', 'API\TeamApiController@store');
Route::post('/team/update', 'API\TeamApiController@update');
Route::delete('/team/{id}', 'API\TeamApiController@destroy');


Route::get('/player/{id?}', 'API\PlayerApiController@index');

Route::post('/player/store', 'API\PlayerApiController@store');
Route::post('/player/update', 'API\PlayerApiController@update');
Route::delete('/player/{id}', 'API\PlayerApiController@destroy');