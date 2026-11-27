<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModalFormController;

Route::post('/send-form', [ModalFormController::class, 'send'])
    ->middleware('throttle:10,1')
    ->name('send.modal.form');

Route::get('/', [PageController::class, 'home']);
Route::get('/contact', [PageController::class, 'contact']);
Route::get('/credit', [PageController::class, 'credit']);
Route::get('/trade-in', [PageController::class, 'tradeIn']);
Route::get('/service', [PageController::class, 'service']);
Route::get('/thank-you', [PageController::class, 'thankYou']);
Route::get('/stock-cars', [PageController::class, 'stockCars']);
Route::get('/test-drive-battle', [PageController::class, 'testDriveBattle']);

// Model landing pages: /kodiaq, /octavia-a8, ... (see config/model-pages.php)
Route::get('/{slug}', [PageController::class, 'modelPage'])
  ->whereIn('slug', array_keys(config('model-pages')))
  ->name('model.page');

Route::get('/stock-cars/{car}', [PageController::class, 'stockCarDetails'])
  ->name('stock.car.details')
  ->where('car', '[0-9]+');
