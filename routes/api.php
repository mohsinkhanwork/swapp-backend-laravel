<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AdController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ChatController;
use App\Http\Controllers\Api\FeedController;
use App\Http\Controllers\Api\QuizController;
use App\Http\Controllers\Api\SwapController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\ForumController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\SupportController;
use App\Http\Controllers\Api\FollowerController;
use App\Http\Controllers\Api\BlockUserController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\SubscriptionController;
use App\Http\Controllers\Api\CustomBroadcastingAuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['prefix'=>'v1/user'],function(){
    Route::post('login',[AuthController::class,'login']);
    Route::post('verify-otp',[AuthController::class,'verifyLoginCode']);
    Route::post('social/login',[AuthController::class,'socialLogin']);
    Route::post('register',[AuthController::class,'register']);
    Route::post('/forget-password/link',[AuthController::class,'sendForgetPasswordLink']);
    Route::post('/email-verification/resend',[AuthController::class,'resendEmailVerification']);

    Route::get('/data',[UserController::class,'getData']);
    Route::get('/country', [CountryController::class,'getCountryNames']);
    Route::get('/ip-country', [CountryController::class,'getIpCountryName']);
    Route::group(['middleware'=>'auth:sanctum'],function(){
        Route::get('/list',[UserController::class,'user']);
        Route::post('/profile',[UserController::class,'updateProfile']);
        Route::post('/social-links',[UserController::class,'updateSocialLinks']);
        Route::post('/update-password',[UserController::class,'updatePassword']);
        Route::post('/enable-2fa',[UserController::class,'enable2FA']);
        Route::post('/subscribe-newsletter',[UserController::class,'subscribeNewsletter']);
        Route::post('/deactivate-account',[UserController::class,'deactivateAccount']);

        Route::get('/users',[UserController::class,'users']);
        Route::get('/users/{username}',[UserController::class,'userDetail']);
        Route::get('/posts/{username}',[UserController::class,'getUserFeed']);

        Route::get('/notifications',[NotificationController::class,'getNotifications']);
        Route::get('/notifications/{notification}',[NotificationController::class,'getSingleNotification']);

        Route::get('/ads',[AdController::class,'getAds']);
        Route::get('/skills', [SkillController::class, 'getSkillNames']);

        Route::get('skills/{skill}/quiz',[QuizController::class,'quiz']);
        Route::post('skills/{skill}/quiz',[QuizController::class,'submitQuiz']);
        Route::get('skills/quiz-list',[QuizController::class,'quizList']);

        Route::get('countries',[CountryController::class,'getCountryNames']);
        Route::group(['prefix'=>'skill'],function(){
            Route::get('swaps',[SwapController::class,'swaps']);
            Route::get('my-swaps',[SwapController::class,'mySwaps']);
            Route::get('sent-swap-requests',[SwapController::class,'sentRequests']);
            Route::get('recieved-swap-requests',[SwapController::class,'receivedRequests']);
            Route::get('all-swap-requests',[SwapController::class,'allRequests']);
            Route::get('participants',[SwapController::class,'allParticipants']);
            Route::post('swap-request',[SwapController::class,'swapSkillRequest']);
            Route::post('swap-request/accept',[SwapController::class,'acceptSwapSkillRequest']);
            Route::post('swap-request/reject',[SwapController::class,'rejectSwapSkillRequest']);
            Route::get('common-swap-skills/{userId}',[SwapController::class,'commonSwapSkills']);

            Route::post('swap-user/rating/update', [SwapController::class, 'updateRating']);
            Route::post('swap-user/review/update', [SwapController::class, 'updateReview']);
        });

        Route::group(['prefix'=>'subscription'],function(){
            Route::get('transactions',[SubscriptionController::class,'transactions']);
            Route::post('cancel',[SubscriptionController::class,'cancel']);
            Route::post('resume',[SubscriptionController::class,'resume']);
            Route::post('pause',[SubscriptionController::class,'pause']);
        });

        Route::group(['prefix'=>'chat'],function(){
            Route::get('rooms',[ChatController::class,'rooms']);
            Route::get('rooms/by-swap/{swap}/messages', [ChatController::class, 'messagesBySwap']);
            Route::get('rooms/{room}/messages',[ChatController::class,'messages']);
            Route::post('rooms/{room}/message',[ChatController::class,'sendMessage']);
            Route::post('rooms/by-swap/{swap}/message',[ChatController::class,'sendMessageBySwap']);
        });

        Route::group(['prefix'=>'forum'],function(){
            Route::get('questions',[ForumController::class,'questions']);
            Route::get('my-questions',[ForumController::class,'myQuestions']);
            Route::get('questions/{question}',[ForumController::class,'getSingleQuestion']);
            Route::post('question',[ForumController::class,'postQuestion']);
            Route::put('questions/{question}',[ForumController::class,'updateQuestion']);
            Route::delete('questions/{question}',[ForumController::class,'destroyQuestion']);

            Route::get('questions/{question}/answers',[ForumController::class,'answers']);
            Route::post('questions/{question}/answer',[ForumController::class,'postAnswer']);
            Route::delete('answers/{answer}',[ForumController::class,'destroyAnswer']);

            Route::get('answers/{answer}/comments',[ForumController::class,'getComments']);
            Route::post('answers/{answer}/comment',[ForumController::class,'postComment']);
            Route::delete('comments/{comment}',[ForumController::class,'destroyComment']);

            Route::post('answers/{answer}/like',[ForumController::class,'likeAnswer']);
            Route::post('answers/{answer}/mark-best',[ForumController::class,'markAnswerBest']);
        });

        Route::group(['prefix'=>'support'],function(){
            Route::get('tickets',[SupportController::class,'tickets']);
            Route::post('ticket',[SupportController::class,'createTicket']);
            Route::get('tickets/{ticket}/replies',[SupportController::class,'ticketReplies']);
            Route::post('tickets/{ticket}/reply',[SupportController::class,'replyTicket']);
            Route::post('tickets/{ticket}/solved',[SupportController::class,'solveTicket']);
        });

        // followers
        Route::post('/follow',[FollowerController::class,'follow']);
        Route::post('/unfollow',[FollowerController::class,'unfollow']);
        Route::get('/followers',[FollowerController::class,'followers']);
        Route::get('/following',[FollowerController::class,'following']);

        // block user
        Route::post('/block',[BlockUserController::class,'block']);
        Route::post('/unblock',[BlockUserController::class,'unblock']);
        Route::get('blocked-users',[BlockUserController::class,'blockedUsers']);

        // feed
        Route::group(['prefix'=>'feeds'],function(){
            Route::get('',[FeedController::class,'list']);
            Route::post('',[FeedController::class,'store']);
            Route::get('/{feed}',[FeedController::class,'detail']);
            Route::post('/{feed}/update',[FeedController::class,'update']);
            Route::delete('/{feed}',[FeedController::class,'destroy']);

            Route::get('/{feed}/comments',[FeedController::class,'getComments']);
            Route::post('/{feed}/comment',[FeedController::class,'postComment']);
            Route::delete('comments/{comment}',[FeedController::class,'destroyComment']);

            Route::post('/{feed}/like',[FeedController::class,'likeFeed']);           
        });

        // Events
        Route::group(['prefix' => 'events'], function() {
            Route::post('/create', [EventController::class, 'store']);
            Route::get('/', [EventController::class, 'index']); // Add this line
            Route::get('/{id}', [EventController::class, 'show']); // Add this line for getting event by ID
            Route::put('/{id}', [EventController::class, 'update']); // Add this line for updating events
            Route::delete('/{id}', [EventController::class, 'destroy']); // Add this line for deleting events
        });

        Route::get('/broadcasting-auth', [CustomBroadcastingAuthController::class, 'store']);
        Route::post('/broadcasting-auth', [CustomBroadcastingAuthController::class, 'store']);

    });
});
