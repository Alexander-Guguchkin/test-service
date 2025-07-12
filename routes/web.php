<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestCaseController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\CommentController;

Route::redirect('/', '/test-cases')->name('home');
Route::resource('test-cases', TestCaseController::class);
Route::resource('features', FeatureController::class);
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
