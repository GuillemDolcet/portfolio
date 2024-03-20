<?php

use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\SessionsController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\OverviewController;
use App\Http\Controllers\PersonalInfoController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\TestimonialController;
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
            Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
            Route::post('/users', [UserController::class, 'store'])->name('admin.users.store');
            Route::get('/users/create', [UserController::class, 'create'])->name('admin.users.create');
            Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
            Route::match(['put', 'patch'], '/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
            Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
        });
        Route::get('/', [OverviewController::class, 'index'])->name('admin.index');
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
        //Education
        Route::get('/education', [EducationController::class, 'index'])->name('admin.education.index');
        Route::post('/education', [EducationController::class, 'store'])->name('admin.education.store');
        Route::get('/education/create', [EducationController::class, 'create'])->name('admin.education.create');
        Route::get('/education/{education}/edit', [EducationController::class, 'edit'])->name('admin.education.edit');
        Route::match(['put', 'patch'], '/education/{education}', [EducationController::class, 'update'])->name('admin.education.update');
        Route::delete('/education/{education}', [EducationController::class, 'destroy'])->name('admin.education.destroy');
        //Projects
        Route::get('/projects', [ProjectController::class, 'index'])->name('admin.projects.index');
        Route::post('/projects', [ProjectController::class, 'store'])->name('admin.projects.store');
        Route::get('/projects/create', [ProjectController::class, 'create'])->name('admin.projects.create');
        Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('admin.projects.edit');
        Route::match(['put', 'patch'], '/projects/{project}', [ProjectController::class, 'update'])->name('admin.projects.update');
        Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('admin.projects.destroy');
        //Sections
        Route::get('/sections', [SectionController::class, 'index'])->name('admin.sections.index');
        Route::post('/sections', [SectionController::class, 'store'])->name('admin.sections.store');
        //Route::get('/sections/create', [SectionController::class, 'create'])->name('admin.sections.create');
        Route::get('/sections/{section}/edit', [SectionController::class, 'edit'])->name('admin.sections.edit');
        Route::match(['put', 'patch'], '/sections/{section}', [SectionController::class, 'update'])->name('admin.sections.update');
        //Route::delete('/sections/{section}', [SectionController::class, 'destroy'])->name('admin.sections.destroy');
        //Personal Info
        Route::get('/personalInfo', [PersonalInfoController::class, 'index'])->name('admin.personalInfo.index');
        //Route::post('/personalInfo', [ProjectController::class, 'store'])->name('admin.personalInfo.store');
        //Route::get('/personalInfo/create', [ProjectController::class, 'create'])->name('admin.personalInfo.create');
        Route::get('/personalInfo/{personalInfo}/edit', [PersonalInfoController::class, 'edit'])->name('admin.personalInfo.edit');
        Route::match(['put', 'patch'], '/personalInfo/{personalInfo}', [PersonalInfoController::class, 'update'])->name('admin.personalInfo.update');
        //Route::delete('/personalInfo/{personalInfo}', [ProjectController::class, 'destroy'])->name('admin.personalInfo.destroy');
        //Service
        Route::get('/services', [ServiceController::class, 'index'])->name('admin.services.index');
        Route::post('/services', [ServiceController::class, 'store'])->name('admin.services.store');
        Route::get('/services/create', [ServiceController::class, 'create'])->name('admin.services.create');
        Route::get('/services/{service}/edit', [ServiceController::class, 'edit'])->name('admin.services.edit');
        Route::match(['put', 'patch'], '/services/{service}', [ServiceController::class, 'update'])->name('admin.services.update');
        Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('admin.services.destroy');
        //Testimonial
        Route::get('/testimonials', [TestimonialController::class, 'index'])->name('admin.testimonials.index');
        Route::post('/testimonials', [TestimonialController::class, 'store'])->name('admin.testimonials.store');
        Route::get('/testimonials/create', [TestimonialController::class, 'create'])->name('admin.testimonials.create');
        Route::get('/testimonials/{testimonial}/edit', [TestimonialController::class, 'edit'])->name('admin.testimonials.edit');
        Route::match(['put', 'patch'], '/testimonials/{testimonial}', [TestimonialController::class, 'update'])->name('admin.testimonials.update');
        Route::delete('/testimonials/{testimonial}', [TestimonialController::class, 'destroy'])->name('admin.testimonials.destroy');
        //Faqs
        Route::get('/faqs', [FaqController::class, 'index'])->name('admin.faqs.index');
        Route::post('/faqs', [FaqController::class, 'store'])->name('admin.faqs.store');
        Route::get('/faqs/create', [FaqController::class, 'create'])->name('admin.faqs.create');
        Route::get('/faqs/{faq}/edit', [FaqController::class, 'edit'])->name('admin.faqs.edit');
        Route::match(['put', 'patch'], '/faqs/{faq}', [FaqController::class, 'update'])->name('admin.faqs.update');
        Route::delete('/faqs/{faq}', [FaqController::class, 'destroy'])->name('admin.faqs.destroy');
    });
});

Route::get('/personalInfo/{personalInfo}/downloadCv', [PersonalInfoController::class, 'downloadCv'])->name('personalInfo.downloadCv');
