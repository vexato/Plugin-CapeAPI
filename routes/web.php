<?php
use Azuriom\Plugin\CapeApi\Controllers\CapeApiHomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your plugin. These
| routes are loaded by the RouteServiceProvider of your plugin within
| a group which contains the "web" middleware group and your plugin name
| as prefix. Now create something great!
|
*/

Route::middleware('auth')->group(function () {
    Route::get('/', [CapeApiHomeController::class, 'index'])->name('home');
    Route::post('/updateCape', [CapeApiHomeController::class, 'updateCape'])->name('updateCape');
});
