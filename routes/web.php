<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubscriptController;



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

Route::get('/',function(){
    return view ('welcome');
});

Route::controller(UserController::class)->middleware('auth','verified')->group(function () {
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
    Route::get('stores/{store}/review', 'review')->middleware('subscribed')->name('stores.review');
    Route::get('stores/{store}/favorite', 'favorite')->middleware('subscribed')->name('stores.favorite');
    Route::get('stores/{store}/reservation', 'reservation')->middleware('subscribed')->name('stores.reservation');
});

Route::post('reviews', [ReviewController::class, 'store'])->name('reviews.store');

Route::resource('stores', StoreController::class);
Auth::routes(['verify' => true]);

Route::get('/', [HomeController::class, 'index']);

Route::resource('reservations', ReservationController::class);

Route::get('company', [CompanyController::class, 'index'])->name('company');

Route::controller(SubscriptController::class)->middleware('auth','verified')->group(function () {
    Route::get('subscript/', 'index')->name('subscript.index');
    Route::post('subscript/', 'register')->name('subscript.register');
    Route::get('subscript/edit', 'edit')->middleware('subscribed')->name('subscript.edit');    
    Route::post('subscript/edit', 'update')->middleware('subscribed')->name('subscript.update');
    Route::get('subscript/cancel', 'cancel_confirm')->middleware('subscribed')->name('subscript.cancel_confirm');    
    Route::post('subscript/cancel', 'cancel')->middleware('subscribed')->name('subscript.cancel');
});