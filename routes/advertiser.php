<?php

use App\Http\Controllers\Advertiser\AdController;
use App\Http\Controllers\Advertiser\DashboardController;
use App\Http\Controllers\Advertiser\AuthController;
use App\Http\Controllers\Advertiser\ForgotPasswordController;
use App\Http\Controllers\Advertiser\SupportController;
use Illuminate\Support\Facades\Route;

Route::get('/advertiser/email/verify/{token}', [AuthController::class,'verifyAdvertiser'])->name('advertiser-verification.verify');

Route::group(['prefix'=>'advertiser','as'=>'advertiser.'],function(){
    Route::get('/login',[AuthController::class,'showLogin'])->name('showLogin');
    Route::post('/login',[AuthController::class,'login'])->name('login');
    Route::get('/register',[AuthController::class,'showRegister'])->name('showRegister');
    Route::post('/register',[AuthController::class,'register'])->name('register');
    Route::post('/logout',[AuthController::class,'logout'])->name('logout');
    Route::get('/otp-verification',[AuthController::class,'showVerifyCode']);
    Route::post('/otp-verification',[AuthController::class,'verifyLoginCode'])->name('otp-verification');

    Route::post('password/email', [ForgotPasswordController::class,'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset', [ForgotPasswordController::class,'showLinkRequestForm'])->name('password.request');
    Route::get('password/reset/{token}', [ForgotPasswordController::class,'showResetForm'])->name('password.reset');
    Route::post('password/reset', [ForgotPasswordController::class,'reset'])->name('password.update');

    Route::group(['middleware'=>['auth:advertiser']],function(){
        Route::get('/',[DashboardController::class,'index'])->name('dashboard');

        Route::get('notifications',[DashboardController::class,'allNotifications'])->name('notifications.index');
        Route::get('notifications/{notification}',[DashboardController::class,'showNotification'])->name('notifications.show');

        Route::get('/ads',[AdController::class,'index'])->name('ads.index');
        Route::get('/ads/{ad}',[AdController::class,'show'])->name('ads.show');
        Route::get('/ads/{ad}/edit',[AdController::class,'edit'])->name('ads.edit');
        Route::put('/ads/{ad}',[AdController::class,'update'])->name('ads.update');
        Route::get('/packages',[AdController::class,'packages'])->name('ads.packages');
        Route::get('/ads/{ad}/stats',[AdController::class,'stats'])->name('ad.stats');
        Route::get('/packages/{package}/create-ad',[AdController::class,'create'])->name('ads.create');
        Route::post('/packages/{package}/create-ad',[AdController::class,'store'])->name('ads.store');
        Route::get('/ads/{ad}/{quantity}/payment',[AdController::class,'payment'])->name('ad.payment');

        // support tickets
        Route::group(['prefix'=>'support','as'=>'support.'],function(){
            Route::get('',[SupportController::class,'index'])->name('index');
            Route::get('tickets/{ticket}',[SupportController::class,'show'])->name('tickets.show');
            Route::get('/create-ticket',[SupportController::class,'createTicket'])->name('create-ticket');
            Route::post('/create-ticket',[SupportController::class,'storeTicket'])->name('store-ticket');
            Route::post('tickets/{ticket}/reply',[SupportController::class,'reply'])->name('reply');
        });

        Route::get('/profile',[DashboardController::class,'profile'])->name('profile');
        Route::post('/profile',[DashboardController::class,'updateProfile'])->name('update-profile');
        Route::post('/update-password',[DashboardController::class,'updatePassword'])->name('update-password');
    });
});
