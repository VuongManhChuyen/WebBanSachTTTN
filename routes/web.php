<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\StatusController;
use App\Http\Controllers\Client\CheckoutController;
use App\Http\Controllers\Client\ProfileController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\SearchController;
use App\Http\Controllers\Client\ShowCateController;
use App\Http\Controllers\Client\ShowAuthorController;
use App\Http\Controllers\Client\ShopController;
use App\Http\Controllers\Client\OrderClController;
use App\Http\Controllers\Client\CommentController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;

use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'index']);

Route::middleware('auth')->group(function () {
    Route::resource('adminn',AdminController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('book', BookController::class);
    Route::resource('promotion', PromotionController::class);
    Route::resource('author', AuthorController::class);
    Route::resource('role', RoleController::class);
    Route::resource('banner', BannerController::class);
    Route::resource('cart', CartController::class);
    Route::resource('checkout', CheckoutController::class);
    Route::resource('user', UserController::class);
    Route::resource('status', StatusController::class);
});
    Route::get('/login',[HomeController::class,'checkUserType']);
    Route::resource('profile', ProfileController::class);
    Route::resource('order', OrderController::class);
    Route::resource('ordercl', OrderClController::class);
    Route::resource('comment', CommentController::class);
    Route::resource('shopp', ShopController::class);
    Route::resource('showCate', ShowCateController::class);
    Route::resource('showAuthor', ShowAuthorController::class);
    Route::get('/search', [SearchController::class, 'search']);

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});

require __DIR__.'/auth.php';