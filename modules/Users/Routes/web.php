<?php

use Modules\Users\Controllers\PdfController;
use Modules\Users\Controllers\SocialController;
use Modules\Users\Controllers\ImagesController;
use Modules\Users\Controllers\DashboardController;
/*
|--------------------------------------------------------------------------
| Application Routes for Admins Module
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Routes for users
Route::group(['middleware' => 'web'], function () {
    Route::get('login/{provider}', [SocialController::class, 'redirect']);
    Route::get('login/{provider}/callback',[SocialController::class, 'callback']);
	Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');
	Route::get('/userimages',[ImagesController::class, 'index'])->name('images');
	Route::post('/userimages',[ImagesController::class, 'store'])->name('images.store');
	Route::get('/delete-image/{id}',[ImagesController::class, 'destroy'])->name('images.destroy');
	Route::get('/get-pdf',[PdfController::class, 'index'])->name('pdf.index');
});
