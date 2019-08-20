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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/bans', 'BanController@index')->name('ban.index');
Route::get('/ban/{id}', 'BanController@show')->name('ban.show');

Route::get('/kicks', 'KickController@index')->name('kick.index');
Route::get('/kick/{id}', 'KickController@show')->name('kick.show');

Route::get('/warnings', 'WarningController@index')->name('warning.index');
Route::get('/warning/{id}', 'WarningController@show')->name('warning.show');

Route::get('/mutes', 'MuteController@index')->name('mute.index');
Route::get('/mute/{id}', 'MuteController@show')->name('mute.show');

Route::get('/history/{uuid}', 'HistoryController@show')->name('history');

Route::post('/search', 'SearchController@search')->name('search');
