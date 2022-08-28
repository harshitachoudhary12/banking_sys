<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users');
Route::get('/add-user', [App\Http\Controllers\UserController::class, 'add_users'])->name('add_users');
Route::post('/save-user', [App\Http\Controllers\UserController::class, 'save_users'])->name('save_users');
Route::any('/edit_users/{id}', 'App\Http\Controllers\UserController@edit_users')->name('edit_users');
Route::any('/delete_users', 'App\Http\Controllers\UserController@delete_users')->name('delete_users');

Route::get('/user_role', [App\Http\Controllers\UserRoleController::class, 'index'])->name('user_role');
Route::get('/add-user-role', [App\Http\Controllers\UserRoleController::class, 'add_user_role'])->name('add_user_role');
Route::post('/save-user-role', [App\Http\Controllers\UserRoleController::class, 'save_user_role'])->name('save_user_role');

Route::any('/edit_user_role/{id}', 'App\Http\Controllers\UserRoleController@edit_user_role')->name('edit_user_role');
Route::any('/delete_user_role', 'App\Http\Controllers\UserRoleController@delete_user_role')->name('delete_user_role');

Route::get('/user_deposit', [App\Http\Controllers\BankController::class, 'index'])->name('user_deposit');
Route::get('/add_user_deposit', [App\Http\Controllers\BankController::class, 'add_user_deposit'])->name('add_user_deposit');

Route::get('stripe', 'App\Http\Controllers\StripePaymentController@stripe');
Route::post('stripe', 'App\Http\Controllers\StripePaymentController@stripePost')->name('stripe.post');
//////
Route::post('api_stripe', 'App\Http\Controllers\StripePaymentController@api_stripe_post')->name('api.stripe.post');
/////
Route::post('/save_user_deposit', [App\Http\Controllers\BankController::class, 'save_user_deposit'])->name('save_user_deposit');

Route::get('/users_withdraw', [App\Http\Controllers\BankController::class, 'users_withdraw'])->name('users_withdraw');
Route::post('/save_users_withdraw', [App\Http\Controllers\BankController::class, 'save_users_withdraw'])->name('save_users_withdraw');
Route::get('/add_users_withdraw', [App\Http\Controllers\BankController::class, 'add_users_withdraw'])->name('add_users_withdraw');

Route::any('/admin_approved/{id}', 'App\Http\Controllers\BankController@admin_approved')->name('admin_approved');
Route::any('/user_stmt/{id}', 'App\Http\Controllers\BankController@user_stmt')->name('user_stmt');
