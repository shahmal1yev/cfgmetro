<?php

<<<<<<< HEAD
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SocialMediaController;
use Illuminate\Http\Request;
=======
use App\Http\Controllers\BannerController;
>>>>>>> a5735c176a9525923b0fa650f3575a54c29b258b
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\SlideController;

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

Route::middleware(['set.language'])->prefix('/v1')->group(function () {

    Route::apiResource('/contacts', ContactController::class)->only('store');
    Route::apiResource('/social', SocialMediaController::class)->only('index');
    Route::apiResource('/gallery', GalleryController::class)->only([
        'index',
        'show'
    ]);
    Route::apiResource('/slides', SlideController::class)->only([
        'index',
        'show'
    ]);
    Route::apiResource('/banner', BannerController::class)->only([
        'index',
        'show'
    ]);
});
