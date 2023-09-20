<?php

use App\Http\Controllers\Auth\SessionsController;
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

Route::prefix('auth')->group(function () {
    Route::get('login', [SessionsController::class, 'create'])->name('auth.login');
    Route::post('login', [SessionsController::class, 'authenticate'])->name('auth.authenticate');
    Route::delete('logout', [SessionsController::class, 'destroy'])->name('auth.logout');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('home');
    Route::get('users/create', [UserController::class, 'create'])->name('users.create');
    Route::get('users/{user}/view', [UserController::class, 'view'])->name('users.view');
    Route::post('feeds', [UserController::class, 'store'])->name('users.store');
    Route::match(['put', 'patch'], 'users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});
