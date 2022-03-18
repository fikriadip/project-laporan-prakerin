<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\DeskAboutController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\DetailsController;
use App\Http\Controllers\Admin\PricingController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\LandingPageController;


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

Route::get('/', [LandingPageController::class, 'LandingPage'])->name('index');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('postlogin');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::group(['prefix'=>'admin', 'middleware'=>['auth:web','revalidate']], function () {
    
    Route::get('/home',[HomeController::class, 'index'])->name('data.home');
    Route::post('/add-home',[HomeController::class,'store'])->name('add.home');
    Route::get('/home-ajax',[HomeController::class, 'ajax'])->name('data.home.ajax');
    Route::post('/get-home',[HomeController::class, 'editHome'])->name('get.home.edit');
    Route::post('/update-home',[HomeController::class, 'updateHome'])->name('update.home');
    Route::post('/delete-home',[HomeController::class,'deleteHome'])->name('delete.home');

    Route::get('/about',[AboutController::class, 'index'])->name('data.about');
    Route::post('/add-about',[AboutController::class,'store'])->name('add.about');
    Route::get('/about-ajax',[AboutController::class, 'ajax'])->name('data.about.ajax');
    Route::post('/get-about',[AboutController::class, 'editAbout'])->name('get.about.edit');
    Route::post('/update-about',[AboutController::class, 'updateAbout'])->name('update.about');
    Route::post('/delete-about',[AboutController::class,'deleteAbout'])->name('delete.about');

    Route::get('/deskripsi-about',[DeskAboutController::class, 'index'])->name('data.deskripsi.about');
    Route::post('/add-desk-about',[DeskAboutController::class,'store'])->name('add.desk.about');
    Route::get('/desk-about-ajax',[DeskAboutController::class, 'ajax'])->name('data.desk.about.ajax');
    Route::post('/get-desk-about',[DeskAboutController::class, 'editDeskAbout'])->name('get.desk.about.edit');
    Route::post('/update-desk-about',[DeskAboutController::class, 'updateDeskAbout'])->name('update.desk.about');
    Route::post('/delete-desk-about',[DeskAboutController::class,'deleteDeskAbout'])->name('delete.desk.about');

    Route::get('/details',[DetailsController::class, 'index'])->name('data.details');
    Route::post('/add-details',[DetailsController::class,'store'])->name('add.details');
    Route::get('/details-ajax',[DetailsController::class, 'ajax'])->name('data.details.ajax');
    Route::post('/get-details',[DetailsController::class, 'editDetails'])->name('get.details.edit');
    Route::get('/show-details/{id}',[DetailsController::class, 'showDetail'])->name('get.details.show');
    Route::post('/update-details',[DetailsController::class, 'updateDetails'])->name('update.details');
    Route::post('/delete-details',[DetailsController::class,'deleteDetails'])->name('delete.details');

    Route::get('/teams',[TeamController::class, 'index'])->name('data.team');
    Route::post('/add-teams',[TeamController::class,'store'])->name('add.team');
    Route::get('/teams-ajax',[TeamController::class, 'ajax'])->name('data.team.ajax');
    Route::post('/get-teams',[TeamController::class, 'editTeam'])->name('get.team.edit');
    Route::post('/update-teams',[TeamController::class, 'updateTeam'])->name('update.team');
    Route::post('/delete-teams',[TeamController::class,'deleteTeam'])->name('delete.team');

    Route::get('/pricing',[PricingController::class, 'index'])->name('data.pricing');
    Route::post('/add-pricing',[PricingController::class,'store'])->name('add.pricing');
    Route::get('/pricing-ajax',[PricingController::class, 'ajax'])->name('data.pricing.ajax');
    Route::post('/get-pricing',[PricingController::class, 'editPricing'])->name('get.pricing.edit');
    Route::post('/update-pricing',[PricingController::class, 'updatePricing'])->name('update.pricing');
    Route::post('/delete-pricing',[PricingController::class,'deletePricing'])->name('delete.pricing');

    Route::get('/faq',[FaqController::class, 'index'])->name('data.faq');
    Route::post('/add-faq',[FaqController::class,'store'])->name('add.faq');
    Route::get('/faq-ajax',[FaqController::class, 'ajax'])->name('data.faq.ajax');
    Route::post('/get-faq',[FaqController::class, 'editFaq'])->name('get.faq.edit');
    Route::post('/update-faq',[FaqController::class, 'updateFaq'])->name('update.faq');
    Route::post('/delete-faq',[FaqController::class,'deleteFaq'])->name('delete.faq');

    Route::get('/contact',[ContactController::class, 'index'])->name('data.contact');
    Route::post('/add-contact',[ContactController::class,'store'])->name('add.contact');
    Route::get('/contact-ajax',[ContactController::class, 'ajax'])->name('data.contact.ajax');
    Route::post('/get-contact',[ContactController::class, 'editContact'])->name('get.contact.edit');
    Route::post('/update-contact',[ContactController::class, 'updateContact'])->name('update.contact');
    Route::post('/delete-contact',[ContactController::class,'deleteContact'])->name('delete.contact');

    Route::get('/useradmin',[UserController::class, 'index'])->name('data.user');
    Route::post('/add-useradmin',[UserController::class,'store'])->name('add.user');
    Route::get('/useradmin-ajax',[UserController::class, 'ajax'])->name('data.user.ajax');
    Route::post('/get-useradmin',[UserController::class, 'editUser'])->name('get.user.edit');
    Route::post('/update-useradmin',[UserController::class, 'updateUser'])->name('update.user');
    Route::post('/delete-useradmin',[UserController::class,'deleteUser'])->name('delete.user');
});
