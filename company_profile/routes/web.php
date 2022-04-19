<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\Home\HeroController;
use App\Http\Controllers\Admin\Home\DetailController;
use App\Http\Controllers\Admin\Home\DeskDetailController;
use App\Http\Controllers\Admin\Home\VideoController;
use App\Http\Controllers\Admin\Home\TestimonialController;
use App\Http\Controllers\Admin\Home\FaqController;
use App\Http\Controllers\Admin\About\IntroductionController;
use App\Http\Controllers\Admin\About\TeamController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Guest\GuestController;


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

Route::get('/admin/profile', function () {
    return view('admin.user.profile');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/login','showLoginForm')->name('login')->middleware('guest');
    Route::post('/login','login')->middleware('guest')->name('postlogin');
    Route::get('/logout','logout')->name('logout')->middleware('auth');
});

Route::middleware(['guest'])->group(function() {
    Route::controller(GuestController::class)->group(function () {
        Route::get('/','home')->name('guest.home');
        Route::get('/about','about')->name('guest.about');
        Route::get('/articles','articles')->name('guest.articles');
        Route::get('/contact','contact')->name('guest.contact');
        Route::get('/instagramcontent','instagramContent')->name('guest.instagram');
    });
});

Route::group(['prefix'=>'admin', 'middleware'=>['auth:web','revalidate']], function () {
    
    Route::controller(UserController::class)->group(function () {
        Route::get('/user','index')->name('data.user');
        Route::post('/add-user','store')->name('add.user');
        Route::get('/user-ajax','ajax')->name('data.user.ajax');
        Route::post('/get-user','editUser')->name('get.user.edit');
        Route::post('/update-user','updateUser')->name('update.user');
        Route::post('/delete-user','deleteUser')->name('delete.user');
    });
    
    Route::prefix('home')->group(function () {
        Route::controller(HeroController::class)->group(function () {
            Route::get('/hero','index')->name('data.hero');
            Route::post('/add-hero','store')->name('add.hero');
            Route::get('/hero-ajax','ajax')->name('data.hero.ajax');
            Route::post('/get-hero','editHero')->name('get.hero.edit');
            Route::post('/update-hero','updateHero')->name('update.hero');
            Route::post('/delete-hero','deleteHero')->name('delete.hero');
        });
        
        Route::controller(DetailController::class)->group(function () {
            Route::get('/detail','index')->name('data.detail');
            Route::post('/add-detail','store')->name('add.detail');
            Route::get('/detail-ajax','ajax')->name('data.detail.ajax');
            Route::post('/get-detail','editDetail')->name('get.detail.edit');
            Route::post('/update-detail','updateDetail')->name('update.detail');
            Route::post('/delete-detail','deleteDetail')->name('delete.detail');
        });
        
        Route::controller(DeskDetailController::class)->group(function () {
            Route::get('/deskdetail','index')->name('data.deskdetail');
            Route::post('/add-deskdetail','store')->name('add.deskdetail');
            Route::get('/deskdetail-ajax','ajax')->name('data.deskdetail.ajax');
            Route::post('/get-deskdetail','editDeskDetail')->name('get.deskdetail.edit');
            Route::post('/update-deskdetail','updateDeskDetail')->name('update.deskdetail');
            Route::post('/delete-deskdetail','deleteDeskDetail')->name('delete.deskdetail');
        });
        
        Route::controller(VideoController::class)->group(function () {
            Route::get('/video','index')->name('data.video');
            Route::post('/add-video','store')->name('add.video');
            Route::get('/video-ajax','ajax')->name('data.video.ajax');
            Route::post('/get-video','editVideo')->name('get.video.edit');
            Route::post('/update-video','updateVideo')->name('update.video');
            Route::post('/delete-video','deleteVideo')->name('delete.video');
        });
        
        Route::controller(TestimonialController::class)->group(function () {
            Route::get('/testimonial','index')->name('data.testimonial');
            Route::post('/add-testimonial','store')->name('add.testimonial');
            Route::get('/testimonial-ajax','ajax')->name('data.testimonial.ajax');
            Route::post('/get-testimonial','editTestimonial')->name('get.testimonial.edit');
            Route::post('/update-testimonial','updateTestimonial')->name('update.testimonial');
            Route::post('/delete-testimonial','deleteTestimonial')->name('delete.testimonial');
        });
        
        Route::controller(FaqController::class)->group(function () {
            Route::get('/faq','index')->name('data.faq');
            Route::post('/add-faq','store')->name('add.faq');
            Route::get('/faq-ajax','ajax')->name('data.faq.ajax');
            Route::post('/get-faq','editFaq')->name('get.faq.edit');
            Route::post('/update-faq','updateFaq')->name('update.faq');
            Route::post('/delete-faq','deleteFaq')->name('delete.faq');
        });

    });

    Route::prefix('about')->group(function () {
        Route::controller(IntroductionController::class)->group(function () {
            Route::get('/introduction','index')->name('data.introduction');
            Route::post('/add-introduction','store')->name('add.introduction');
            Route::get('/introduction-ajax','ajax')->name('data.introduction.ajax');
            Route::post('/get-introduction','editIntroduction')->name('get.introduction.edit');
            Route::post('/update-introduction','updateIntroduction')->name('update.introduction');
            Route::post('/delete-introduction','deleteIntroduction')->name('delete.introduction');
        });
        
        Route::controller(TeamController::class)->group(function () {
            Route::get('/team','index')->name('data.team');
            Route::post('/add-team','store')->name('add.team');
            Route::get('/team-ajax','ajax')->name('data.team.ajax');
            Route::post('/get-team','editTeam')->name('get.team.edit');
            Route::post('/update-team','updateTeam')->name('update.team');
            Route::post('/delete-team','deleteTeam')->name('delete.team');
        });
    });

    Route::prefix('contact')->group(function () {
        Route::controller(ContactController::class)->group(function () {
            Route::get('/contact-us','index')->name('data.contact');
            Route::post('/add-contact-us','store')->name('add.contact');
            Route::get('/contact-us-ajax','ajax')->name('data.contact.ajax');
            Route::post('/get-contact-us','editContact')->name('get.contact.edit');
            Route::post('/update-contact-us','updateContact')->name('update.contact');
            Route::post('/delete-contact-us','deleteContact')->name('delete.contact');
        });
    });
});
