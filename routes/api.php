<?php

use Azuriom\Plugin\SkinApi\Controllers\Api\ApiController;
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

Route::get('skins/{user}', [ApiController::class, 'show'])->name('show');

// $type = 'combo' or 'face'
Route::get('avatars/{type}/{user}', [ApiController::class, 'avatar'])->name('showAvatar');

Route::post('skins/update', [ApiController::class, 'update'])->name('update');
