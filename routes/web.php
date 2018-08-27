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

Route::get('/tests', 'TestsController@testsDataBase');
Route::get('/', 'ClientMainController@getActivesTests')->name('client.getActivesTests');
Route::get('/test/{test_id}', 'ClientMainController@showTest')->name('client.showTest');