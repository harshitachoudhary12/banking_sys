<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/api_add_user_deposit', [App\Http\Controllers\ApiBankController::class, 'api_add_user_deposit'])->name('api_add_user_deposit');
Route::post('/api_add_user_withdraw', [App\Http\Controllers\ApiBankController::class, 'api_add_user_withdraw'])->name('api_add_user_deposit');

Route::post('/send_money_to_user', [App\Http\Controllers\ApiBankController::class, 'send_money_to_user'])->name('send_money_to_user');

Route::post('/register_user', [App\Http\Controllers\ApiBankController::class, 'register_user'])->name('register_user');

Route::post('/login_user', [App\Http\Controllers\ApiBankController::class, 'login_user'])->name('login_user');
