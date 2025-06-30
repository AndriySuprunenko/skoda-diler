<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home']);
Route::get('/about', [PageController::class, 'about']);
Route::get('/contact', [PageController::class, 'contact']);
Route::get('/kodiaq', [PageController::class, 'kodiaq']);
// Route::get('/octavia', [PageController::class, 'octavia']);
// Route::get('/superb', [PageController::class, 'superb']);
// Route::get('/fabia', [PageController::class, 'fabia']);
// Route::get('/scala', [PageController::class, 'scala']);
// Route::get('/kamiq', [PageController::class, 'kamiq']);
// Route::get('/karoq', [PageController::class, 'karoq']);