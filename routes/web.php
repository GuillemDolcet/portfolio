<?php

use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\SessionsController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ProjectController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('auth')->group(function () {
    Route::get('login', [SessionsController::class, 'create'])->name('auth.login');
    Route::post('login', [SessionsController::class, 'authenticate'])->name('auth.authenticate');
    Route::delete('logout', [SessionsController::class, 'destroy'])->name('auth.logout');
    Route::get('google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
    Route::get('google/callback', [GoogleController::class, 'handleGoogleCallback']);
});

Route::post('/change-language/{language}', [LanguageController::class, 'changeLanguage'])->name('change-language');

Route::middleware('auth')->group(function () {

    Route::prefix('admin')->group(function () {
        Route::group(['middleware' => ['role:admin']], function () {
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
        //Experiences
        Route::get('/experiences', [ExperienceController::class, 'index'])->name('admin.experiences.index');
        Route::post('/experiences', [ExperienceController::class, 'store'])->name('admin.experiences.store');
        Route::get('/experiences/create', [ExperienceController::class, 'create'])->name('admin.experiences.create');
        Route::get('/experiences/{experience}/edit', [ExperienceController::class, 'edit'])->name('admin.experiences.edit');
        Route::match(['put', 'patch'], '/experiences/{experience}', [ExperienceController::class, 'update'])->name('admin.experiences.update');
        Route::delete('/experiences/{experience}', [ExperienceController::class, 'destroy'])->name('admin.experiences.destroy');
        //Projects
        Route::get('/projects', [ProjectController::class, 'index'])->name('admin.projects.index');
        Route::post('/projects', [ProjectController::class, 'store'])->name('admin.projects.store');
        Route::get('/projects/create', [ProjectController::class, 'create'])->name('admin.projects.create');
        Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('admin.projects.edit');
        Route::match(['put', 'patch'], '/projects/{project}', [ProjectController::class, 'update'])->name('admin.projects.update');
        Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('admin.projects.destroy');
    });
});
