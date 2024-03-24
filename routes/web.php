<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\UserController;
use  App\Http\Controllers\HomeController;
use  App\Http\Controllers\StripeController;
use  App\Http\Controllers\Membershipcontroller;
use  App\Http\Controllers\ProfileController;




Route::get('login', [UserController::class, 'loginPage'])->name('login');
Route::post('register-user', [UserController::class, 'customRegistration'])->name('register.user');
Route::post('login-user', [UserController::class, 'customLogin'])->name('login-user');
Route::get('/', [HomeController::class, 'index']);
Route::get('/stripe-payment', [StripeController::class, 'handleGet'])->name("strip.view");
Route::post('/stripe-payment', [StripeController::class, 'handlePost'])->name('stripe.payment');

Route::get('/email-send', [StripeController::class, 'email_send']);

Route::post('/email', [StripeController::class, 'email'])->name('user.email');
Route::post('/membership', [Membershipcontroller::class, 'membership1'])->name('user.membership');
Route::post('/membership-2', [Membershipcontroller::class, 'membership2'])->name('user.membership2');
Route::view('/forgot','MainPage.components.forgotpasword');

Route::group(['middleware'=>['myauth']],function(){


    Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/logout', [ProfileController::class, 'logout'])->name('user.logout');
    Route::get('/profile',[ProfileController::class ,'userprofile'])->name('user.profil');
    Route::post('/update-profile',[ProfileController::class ,'updateprofile'])->name('user.update');
    Route::get('/update-package',[ProfileController::class ,'updatepackage'])->name('update.package');
    Route::post('/update-membership', [ProfileController::class, 'updatemembership1'])->name('update.package1');
    Route::post('/updatemembership-2', [ProfileController::class, 'updatemembership2'])->name('update.package2');
    Route::get('/refund', [StripeController::class, 'refund']);

});
