<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

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

Route::get('/ads', [HomeController::class, 'ads']);

Route::get('/sellers', [UserController::class, 'sellers']);

Route::get('/ad/{id}', [HomeController::class, 'ad']);

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

/*
Route::post('/upload', [HomeController::class, 'upload']);



Route::get('/delete/{id}', [HomeController::class, 'delete']);

Route::get('/search', [HomeController::class, 'search']);

Route::get('/update_view/{id}', [HomeController::class, 'update_view']);

Route::post('/update/{id}', [HomeController::class, 'update']);


*/