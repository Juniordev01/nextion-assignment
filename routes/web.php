<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',  [HomeController::class, 'registerUser']);

Auth::routes([
    'verify' => true
]);

Route::group(['middleware' => ['auth', 'verified']], function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('users', [UserController::class, 'index'])->name('getUsers');
    Route::get('user_profile/{id}', [UserController::class, 'profile'])->name('view_profile');
    Route::put('user_update/{id}', [UserController::class, 'updateProfile'])->name('update_profile');
    Route::get('varify_user', [UserController::class, 'index'])->name('verification.resend');
});
