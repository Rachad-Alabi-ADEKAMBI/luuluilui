<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ImageController;

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

Route::get('/home', [HomeController::class, 'view']);

Route::get('/about', [HomeController::class, 'about']);

Route::get('/contact', [HomeController::class, 'contact']);

Route::get('/', [HomeController::class, 'view']);

Route::get('/marketplace', [HomeController::class, 'marketplace']);

Route::get('/sellers', [UserController::class, 'sellers']);

Route::get('/ad/{id}', [HomeController::class, 'ad']);

Route::get('/adView/{id}', [HomeController::class, 'adView']);

Route::get('/newAd', [HomeController::class, 'newAd']);

Route::get('/myAds', [HomeController::class, 'myAds']);

Route::get('/footerAds', [HomeController::class, 'footerAds']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name(
        'dashboard'
    );
});

Route::get('/adsApi', [HomeController::class, 'adsApi']);

Route::get('/carsToSellApi', [HomeController::class, 'carsToSellApi']);

Route::get('/carsToRentApi', [HomeController::class, 'carsToRentApi']);

Route::get('/cgu', [HomeController::class, 'cgu']);

Route::get('/policy', [HomeController::class, 'policy']);

Route::post('/upload', [HomeController::class, 'upload']);

Route::get('/mail', [MailController::class, 'sendMail']);

Route::get('/contactMail', [MailController::class, 'contactMail']);

Route::get('/watermark', [ImageController::class, 'imageWaterMark']);

Route::get('/deleteView/{id}', [HomeController::class, 'deleteView']);

Route::get('/delete/{id}', [HomeController::class, 'delete']);

Route::get('/editView/{id}', [HomeController::class, 'editView']);

Route::post('/edit/{id}', [HomeController::class, 'edit']);

Route::get('/search', [HomeController::class, 'search']);

Route::get('/update_view/{id}', [HomeController::class, 'update_view']);

Route::get('/editUserView', [HomeController::class, 'editUserView']);

Route::post('/editUser', [HomeController::class, 'editUser']);

Route::post('/update/{id}', [HomeController::class, 'update']);
