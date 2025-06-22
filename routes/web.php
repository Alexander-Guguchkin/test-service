<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestCaseController;
use App\Http\Controllers\FeatureController;

Route::redirect('/', '/test-cases')->name('home');
Route::resource('test-cases', TestCaseController::class);
Route::resource('features', FeatureController::class);
