<?php

use App\Http\Controllers\PageController;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home']);
Route::get('/about', [PageController::class, 'about']);
Route::get('/contact', [PageController::class, 'contact']);
Route::get('/components', [PageController::class, 'components']);
