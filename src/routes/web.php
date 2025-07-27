<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestCaseController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;

Route::middleware(['auth'])->group(function () {
    Route::redirect('/', '/test-cases')->name('home');
    Route::resource('test-cases', TestCaseController::class);
    Route::resource('features', FeatureController::class);
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

    Route::group([
        'prefix'=> 'user',
        'as' => 'user.',
    ], function () {
        Route::get('/', [UserController::class, 'show'])->name('show');
        Route::put('/', [UserController::class, 'update'])->name('update');
    });
});
