<?php

use App\Http\Controllers\Api\V1\LinkController;
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

Route::group(['prefix' => 'v1'],function (){
    Route::post('/create', [LinkController::class, 'store'])->name('add-link');
    Route::get('/latest', [LinkController::class, 'latest'])->name('latest-links');
});
