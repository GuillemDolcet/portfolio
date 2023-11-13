<?php

use App\Http\Controllers\Auth\SessionsController;
use App\Http\Controllers\SkillController;
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

    Route::prefix('admin')->group(function () {
        Route::group(['middleware' => ['role:superadmin|admin']], function () {
            //Users
            Route::get('/', [UserController::class, 'index'])->name('admin.home');
            Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
            Route::post('/users', [UserController::class, 'store'])->name('admin.users.store');
            Route::get('/users/create', [UserController::class, 'create'])->name('admin.users.create');
            Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
            Route::match(['put', 'patch'], '/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
            Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
        });
        //Skills
        Route::get('/skills', [SkillController::class, 'index'])->name('admin.skills.index');
        Route::post('/skills', [SkillController::class, 'store'])->name('admin.skills.store');
        Route::get('/skills/create', [SkillController::class, 'create'])->name('admin.skills.create');
        Route::get('/skills/{skill}/edit', [SkillController::class, 'edit'])->name('admin.skills.edit');
        Route::match(['put', 'patch'], '/skills/{skill}', [SkillController::class, 'update'])->name('admin.skills.update');
        Route::delete('/skills/{skill}', [SkillController::class, 'destroy'])->name('admin.skills.destroy');
    });
});
