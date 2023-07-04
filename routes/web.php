<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\AdminProjectController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\SocialController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ResumeController;
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

// page routes
Route::get('/', [HomeController::class, 'page'])->name('home');
Route::get('/contact', [ContactController::class, 'page'])->name('contact');
Route::get('/projects', [ProjectController::class, 'page'])->name('projects');
Route::get('/resume', [ResumeController::class, 'page'])->name('resume');

// ajax call routes
// * home page routes
Route::get('/heroData', [HomeController::class, 'heroData']);
Route::get('/aboutData', [HomeController::class, 'aboutData']);
Route::get('/socialData', [HomeController::class, 'socialData']);
// * project page route
Route::get('/projectsData', [ProjectController::class, 'projectsData']);
// * resume page routes
Route::get('/resumeLink', [ResumeController::class, 'resumeLink']);
Route::get('/experiencesData', [ResumeController::class, 'experiencesData']);
Route::get('/educationData', [ResumeController::class, 'educationData']);
Route::get('/skillsData', [ResumeController::class, 'skillsData']);
Route::get('/languageData', [ResumeController::class, 'languageData']);
// * contact page route
Route::post('/contactRequest', [ContactController::class, 'contactRequest']);

// auth route
Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login-request', [LoginController::class, 'loginRequest'])->name('login.request')->middleware('guest');
Route::get('/register', [RegisterController::class, 'register'])->name('register')->middleware('guest');
Route::post('/registerRequest', [RegisterController::class, 'registerRequest'])->name('register.request')->middleware('guest');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/forget-password', [ResetPasswordController::class, 'forgetPassword']);
Route::post('/forget-password-send', [ResetPasswordController::class, 'forgetPasswordSend']);
Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword']);

// admin route
// ** admin dashboard
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/hero', [HeroController::class, 'index'])->name('admin.hero');
Route::post('/admin/hero-store', [HeroController::class, 'store'])->name('admin.hero.store');
Route::put('/admin/hero-update', [HeroController::class, 'update'])->name('admin.hero.update');
// ** admin about
Route::get('/admin/about', [AboutController::class, 'index'])->name('admin.about');
Route::post('/admin/about-store', [AboutController::class, 'store'])->name('admin.about.store');
Route::put('/admin/about-update', [AboutController::class, 'update'])->name('admin.about.update');
// ** admin social
Route::get('/admin/social', [SocialController::class, 'index'])->name('admin.social');
Route::post('/admin/social-store', [SocialController::class, 'store'])->name('admin.social.store');
Route::put('/admin/social-update', [SocialController::class, 'update'])->name('admin.social.update');
// ** admin experience
Route::get('/admin/experience', [ExperienceController::class, 'index'])->name('admin.experience');
Route::post('/admin/experience-store', [ExperienceController::class, 'store'])->name('admin.experience.store');
Route::get('/admin/experience-edit/{id}', [ExperienceController::class, 'edit'])->name('admin.experience.edit');
Route::put('/admin/experience-update/{id}', [ExperienceController::class, 'update'])->name('admin.experience.update');
Route::get('/admin/experience-destroy/{id}', [ExperienceController::class, 'destroy'])->name('admin.experience.destroy');
// ** admin education
Route::get('/admin/education', [EducationController::class, 'index'])->name('admin.education');
Route::post('/admin/education-store', [EducationController::class, 'store'])->name('admin.education.store');
Route::get('/admin/education-edit/{id}', [EducationController::class, 'edit'])->name('admin.education.edit');
Route::put('/admin/education-update/{id}', [EducationController::class, 'update'])->name('admin.education.update');
Route::get('/admin/education-destroy/{id}', [EducationController::class, 'destroy'])->name('admin.education.destroy');
// ** admin skill
Route::get('/admin/skill', [SkillController::class, 'index'])->name('admin.skill');
Route::post('/admin/skill-store', [SkillController::class, 'store'])->name('admin.skill.store');
Route::get('/admin/skill-edit/{id}', [SkillController::class, 'edit'])->name('admin.skill.edit');
Route::put('/admin/skill-update/{id}', [SkillController::class, 'update'])->name('admin.skill.update');
Route::get('/admin/skill-destroy/{id}', [SkillController::class, 'destroy'])->name('admin.skill.destroy');
// ** admin language
Route::get('/admin/language', [LanguageController::class, 'index'])->name('admin.language');
Route::post('/admin/language-store', [LanguageController::class, 'store'])->name('admin.language.store');
Route::get('/admin/language-edit/{id}', [LanguageController::class, 'edit'])->name('admin.language.edit');
Route::put('/admin/language-update/{id}', [LanguageController::class, 'update'])->name('admin.language.update');
Route::get('/admin/language-destroy/{id}', [LanguageController::class, 'destroy'])->name('admin.language.destroy');
// ** admin project
Route::get('/admin/project', [AdminProjectController::class, 'index'])->name('admin.project');
Route::post('/admin/project-store', [AdminProjectController::class, 'store'])->name('admin.project.store');
Route::get('/admin/project-edit/{id}', [AdminProjectController::class, 'edit'])->name('admin.project.edit');
Route::put('/admin/project-update/{id}', [AdminProjectController::class, 'update'])->name('admin.project.update');
Route::get('/admin/project-destroy/{id}', [AdminProjectController::class, 'destroy'])->name('admin.project.destroy');
// ** admin contact
Route::get('/admin/contact', [AdminContactController::class, 'index'])->name('admin.contact');
Route::get('/admin/contact-view/{id}', [AdminContactController::class, 'view'])->name('admin.contact.view');
Route::post('/admin/contact-replay-store', [AdminContactController::class, 'store'])->name('admin.contact.replay.store');
Route::get('/admin/contact-destroy/{id}', [AdminContactController::class, 'destroy'])->name('admin.contact.destroy');