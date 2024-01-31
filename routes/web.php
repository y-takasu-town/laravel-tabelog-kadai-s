<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HomeController;


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
});

Route::controller(UserController::class)->group(function () {
    Route::get('users/mypage', 'mypage')->name('mypage');
    Route::get('users/mypage/edit', 'edit')->name('mypage.edit');
    Route::put('users/mypage', 'update')->name('mypage.update');
    Route::get('users/mypage/password/edit', 'edit_password')->name('mypage.edit_password');
    Route::put('users/mypage/password', 'update_password')->name('mypage.update_password'); 
    Route::get('users/mypage/favorite', 'favorite')->name('mypage.favorite');
    Route::get('users/mypage/reservations', 'reservations')->name('mypage.reservations');
    Route::delete('users/mypage/delete', 'destroy')->name('mypage.destroy');

});

Route::controller(StoreController::class)->group(function(){
    Route::get('stores/{store}/review', 'review')->name('stores.review');
    Route::get('stores/{store}/favorite', 'favorite')->name('stores.favorite');
    Route::get('stores/{store}/reservation', 'reservation')->name('stores.reservation');
});

Route::post('reviews', [ReviewController::class, 'store'])->name('reviews.store');

Route::resource('stores', StoreController::class)->middleware(['auth', 'verified']);
Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('reservations', ReservationController::class);

Route::get('company', [CompanyController::class, 'index'])->name('company');