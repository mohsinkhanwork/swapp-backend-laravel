<?php

use App\Http\Controllers\Admin\AdController;
use App\Http\Controllers\Admin\AdPackageController;
use App\Http\Controllers\Admin\AdvertiserController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ContactQueryController;
use App\Http\Controllers\Admin\EmailCampaignController;
use App\Http\Controllers\Admin\ForumController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\LogController;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SkillCategoryController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\SubAdminController;
use App\Http\Controllers\Admin\SupportController;
use App\Http\Controllers\Admin\SwapController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\SubscriptionController;
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
// landing pages
Route::get('language/{locale}', [PageController::class, 'lang']);
Route::get('/',[PageController::class,'home'])->name('home');
Route::get('/pricing',[PageController::class,'pricing'])->name('pricing');
Route::get('/faq',[PageController::class,'faq'])->name('faq');
Route::get('/blogs',[PageController::class,'blogs'])->name('blogs');
Route::get('/blogs/categories/{slug}',[PageController::class,'blogCategories'])->name('blogs.categories');
Route::get('/blogs/{slug}',[PageController::class,'blogDetail'])->name('blogs.show');
Route::get('/services',[PageController::class,'services'])->name('services');
Route::get('/services/{slug}',[PageController::class,'serviceDetail'])->name('services.show');
Route::get('/contact-us',[PageController::class,'contactUs'])->name('contact-us');
Route::post('/contact-us',[PageController::class,'submitContactUs'])->name('contact-us.submit');
Route::post('/newsletter',[PageController::class,'subscribeNewsletter'])->name('newsletter.subscribe');
Route::get('/about-us',[PageController::class,'aboutUs'])->name('about-us');
Route::get('/request-demo',[PageController::class,'requestDemo'])->name('request-demo');
Route::get('/testimonial',[PageController::class,'testimonial'])->name('testimonial');
Route::get('/integration',[PageController::class,'integration'])->name('integration');
Route::get('/terms-and-conditions',[PageController::class,'termsAndConditions'])->name('terms-and-conditions');
Route::get('/privacy-policy',[PageController::class,'privacyPolicy'])->name('privacy-policy');

// password reset
Route::get('/reset-password/{token}',[PasswordResetController::class,'showResetForm'])->name('password.reset');
Route::post('/reset-password',[PasswordResetController::class,'resetPassword'])->name('password.update');
Route::get('/reset-password-status',[PasswordResetController::class,'resetPasswordStatus'])->name('reset-password.status');

// email verification route
Route::get('/user/email/verify/{token}', [AuthController::class,'verifyUser'])->name('verification.verify');

// admin routes
Route::group(['prefix'=>'admin','as'=>'admin.'],function(){
    Route::get('/login',[AdminAuthController::class,'showLogin'])->name('showLogin');
    Route::get('/otp-verification',[AdminAuthController::class,'showVerifyCode']);
    Route::post('/otp-verification',[AdminAuthController::class,'verifyLoginCode'])->name('otp-verification');
    Route::post('/login',[AdminAuthController::class,'login'])->name('login');
    Route::post('/logout',[AdminAuthController::class,'logout'])->name('logout');
    Route::group(['middleware'=>['auth:admin']],function(){
        Route::get('/',[DashboardController::class,'index'])->name('dashboard');

        Route::get('notifications',[DashboardController::class,'allNotifications'])->name('notifications.index');
        Route::get('notifications/{notification}',[DashboardController::class,'showNotification'])->name('notifications.show');

        Route::resource('blog-categories',BlogCategoryController::class);
        Route::resource('blogs',BlogController::class);
        Route::resource('roles',RoleController::class);
        Route::resource('sub-admins',SubAdminController::class);
        Route::resource('skill-categories',SkillCategoryController::class);
        Route::resource('skills',SkillController::class);
        Route::resource('plans',PlanController::class);

        Route::resource('ad-packages',AdPackageController::class);
        Route::post('ad-packages/{package}/status',[AdPackageController::class,'updateStatus'])->name('ad-package.update-status');

        Route::get('invoices',[InvoiceController::class,'index'])->name('invoices.index');

        Route::get('users',[UserController::class,'index'])->name('users.index');
        Route::post('users/{user}/permanent-ban',[UserController::class,'banAccount'])->name('users.ban-account');
        Route::post('users/{user}/hold-account',[UserController::class,'holdAccount'])->name('users.hold-account');

        Route::get('advertisers',[AdvertiserController::class,'index'])->name('advertisers.index');
        Route::get('advertisers/{advertiser}/login',[AdvertiserController::class,'login'])->name('advertisers.login');
        Route::post('advertisers/{advertiser}/status',[AdvertiserController::class,'updateStatus'])->name('advertiser.update-status');
        Route::get('ads',[AdController::class,'index'])->name('ads.index');
        Route::get('ads/{ad}',[AdController::class,'show'])->name('ads.show');
        Route::post('ads/{ad}/approve',[AdController::class,'approve'])->name('ad.approve');
        Route::post('ads/{ad}/reject',[AdController::class,'reject'])->name('ad.reject');

        Route::group(['prefix'=>'swaps','as'=>'swaps.'],function(){
            Route::get('',[SwapController::class,'index'])->name('index');
            Route::get('/{swap}',[SwapController::class,'show'])->name('show');
        });

        // talent test quiz
        Route::group(['prefix'=>'skills/{skill}/quiz'],function(){
            Route::get('',[QuizController::class,'index'])->name('skill-quiz');
            Route::get('/add-questions',[QuizController::class,'addQuestions'])->name('quiz.add-questions');
            Route::post('/question',[QuizController::class,'storeQuestion'])->name('quiz.store-question');
            Route::get('/questions/{question}/edit',[QuizController::class,'editQuestion'])->name('quiz.edit-question');
            Route::put('/questions/{question}',[QuizController::class,'updateQuestion'])->name('quiz.update-question');
            Route::delete('/question',[QuizController::class,'destroyQuestion'])->name('quiz.destroy-question');
            Route::post('/import-questions',[QuizController::class,'importQuestions'])->name('quiz.import-questions');
        });

           // forum
        Route::group(['prefix'=>'forum'],function(){
            Route::get('',[ForumController::class,'index'])->name('forum');
            Route::get('/questions/{question}',[ForumController::class,'show'])->name('forum.questions.show');
            Route::delete('/questions/{question}',[ForumController::class,'destroy'])->name('forum.questions.destroy');
        });

        // support
        Route::group(['prefix'=>'support'],function(){
            Route::get('',[SupportController::class,'index'])->name('support');
            Route::get('tickets/{ticket}',[SupportController::class,'showTicket'])->name('support.tickets.show');
            Route::post('tickets/{ticket}/reply',[SupportController::class,'reply'])->name('support.reply');
        });

        // contact queries
        Route::group(['prefix'=>'contact-queries'],function(){
            Route::get('',[ContactQueryController::class,'index'])->name('contact-queries');
            Route::post('/{query}/mark-read',[ContactQueryController::class,'markRead'])->name('contact-queries.mark-read');
        });

        // email compaign
        Route::group(['prefix'=>'email-campaigns'],function(){
            Route::get('',[EmailCampaignController::class,'index'])->name('email-campaigns.index');
            Route::get('create',[EmailCampaignController::class,'create'])->name('email-campaigns.create');
            Route::get('{compaign}',[EmailCampaignController::class,'show'])->name('email-campaigns.show');
            Route::post('',[EmailCampaignController::class,'store'])->name('email-campaigns.store');
        });

        Route::group(['prefix'=>'newsletter'],function(){
            Route::get('',[NewsletterController::class,'index'])->name('newsletter');
        });

        // logs
        Route::group(['prefix'=>'logs'],function(){
            Route::get('',[LogController::class,'index'])->name('logs.index');
            Route::get('/{log}',[LogController::class,'show'])->name('logs.show');
        });

        Route::get('settings',[SettingController::class,'index'])->name('settings');
        Route::put('settings',[SettingController::class,'update'])->name('settings.update');

        Route::get('/profile',[DashboardController::class,'profile'])->name('profile');
        Route::post('/profile',[DashboardController::class,'updateProfile'])->name('update-profile');
        Route::post('/update-password',[DashboardController::class,'updatePassword'])->name('update-password');

        Route::post('upload-editor-media',[DashboardController::class,'uploadEditorMedia'])->name('upload-editor-media');
    });
});

// advertiser routes
require "advertiser.php";


// subscription routes
Route::group(['middleware'=>'auth','prefix'=>'subscription'],function(){
    Route::get('/plans/{plan}/{type}/subscribe', [SubscriptionController::class, 'subscribe'])->name('subscribe');
    Route::get('/download-invoice/{transaction}', [SubscriptionController::class,'downloadInvoice'])->name('download-invoice');
    Route::get('/payment-methods', [SubscriptionController::class,'updatePaymentMethod'])->name('update-payment-method');
    Route::get('/account/checkout',[SubscriptionController::class,'accountCheckout']);
});

Route::get('subscription/{plan}/callback',[SubscriptionController::class,'handleCallback'])->name('subscription.callback');
Route::get('subscription/success',[SubscriptionController::class,'success'])->name('subscription.success');

// login app user to laravel project using token
Route::get('redirect/{token}/{path}',[AuthController::class,'redirectUser']);
