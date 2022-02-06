<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\HomeController;
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
    return view('welcome');
})->name('index');

// Route::get('/admin/login', function () {
//     return view('auth.login');
// })->name('admin.login');

Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('postlogin');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::group(['prefix'=>'admin', 'middleware'=>['auth:web','revalidate']], function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    
Route::get('/home',[HomeController::class, 'index'])->name('data.home');
Route::post('/add-home',[HomeController::class,'store'])->name('add.home');
Route::get('/home-ajax',[HomeController::class, 'ajax'])->name('data.home.ajax');
Route::post('/get-home',[HomeController::class, 'editHome'])->name('get.home.edit');
Route::post('/update-home',[HomeController::class, 'updateHome'])->name('update.home');
Route::post('/delete-home',[HomeController::class,'deleteHome'])->name('delete.home');
// Route::post('/getCountryDetails',[CountriesController::class, 'getCountryDetails'])->name('get.country.details'); 
});
