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

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::resource('team','TeamController');

Route::get('team', 'TeamController@index')->name('team.index');
Route::get('team/create', 'TeamController@create')->name('team.create');
Route::post('team/store', 'TeamController@store')->name('team.store');
Route::delete('team/delete/{id}', 'TeamController@destroy')->name('team.destroy');
Route::post('team/{id}', 'TeamController@update')->name('team.update');
Route::get('team/{id}', 'TeamController@show')->name('team.show');
Route::get('team/{id}/edit', 'TeamController@edit')->name('team.edit');

// Route::resource('player','PlayerController');


Route::get('player', 'PlayerController@index')->name('player.index');
Route::get('player/create', 'PlayerController@create')->name('player.create');
Route::post('player/store', 'PlayerController@store')->name('player.store');
Route::delete('player/delete/{id}', 'PlayerController@destroy')->name('player.destroy');
Route::post('player/{id}', 'PlayerController@update')->name('player.update');
Route::get('player/{id}', 'PlayerController@show')->name('player.show');
Route::get('player/{id}/edit', 'PlayerController@edit')->name('player.edit');