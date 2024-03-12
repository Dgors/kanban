<?php

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

Route::get('/', ['App\Http\Controllers\ProfileController', 'show']);
Route::middleware('guest')->group(function () {
   Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'create'])
       ->name('login');

   Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'store']);

   Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'create'])
       ->name('register');
    Route::post('profile', [App\Http\Controllers\ProfileController::class, 'restore' ])->name('profile.restore');
   Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'store']);
});

Route::middleware('auth')->group(function () {
   Route::get('dashboard', [App\Http\Controllers\ProfileController::class, 'create']);

   Route::delete('profile', [App\Http\Controllers\ProfileController::class, 'destroy' ])->name('profile.destroy');

   Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('profile.logout');
});

Route::get('mail', [App\Http\Controllers\MailReader::class, 'mail']);
