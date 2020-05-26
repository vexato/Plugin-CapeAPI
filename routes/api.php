<?php

use Illuminate\Support\Facades\Route;

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

Route::get('skins/{user_id}', 'ApiController@get_skin')->where('user_id', '[0-9]+')->name('get_skin');

Route::post('skins/update_skin', 'ApiController@update_skin')->name('update_skin');