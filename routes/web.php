<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestCaseController;

Route::redirect('/', '/test-cases')->name('home');

Route::resource('test-cases', TestCaseController::class);
