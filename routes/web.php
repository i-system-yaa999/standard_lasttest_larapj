<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactManageController;


Route::get('/', function(){return redirect('contact');});

// お問い合わせ画面処理
Route::controller(ContactController::class)->group(function () {
  Route::prefix('contact')->group(function () {
    Route::get('/','index');
    Route::post('/','confirm');
    Route::post('/complete','complete');
    Route::get('/postcode', 'postcode');
    // Route::get('/check', 'check');
  });
});

// 管理画面処理
Route::controller(ContactManageController::class)->group(function () {
  Route::prefix('contactmanage')->group(function () {
    Route::get('/','index');
    Route::get('/search','search');
    Route::get('/delete','destory');
  });
});