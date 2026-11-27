<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Contacts;
use App\Models\Credit;
use App\Models\Models;
use App\Models\StockCars;

class PageController extends Controller
{
    public function home()
    {
        return view('home', [
            'sliders' => Banner::where('is_active', true)->orderBy('order')->get(),
            'models' => Models::orderBy('order')->get(),
        ]);
    }

    public function contact()
    {
        return view('contact', ['contacts' => Contacts::current()]);
    }

    public function credit()
    {
        return view('credit', ['credit' => Credit::first()]);
    }

    public function tradeIn()
    {
        return view('trade-in', ['contacts' => Contacts::current()]);
    }

    public function service()
    {
        return view('service');
    }

    public function thankYou()
    {
        return view('thank-you');
    }

    public function stockCars()
    {
        return view('stock-cars', [
            'cars' => StockCars::orderBy('updated_at', 'desc')->get(),
        ]);
    }

    public function testDriveBattle()
    {
        return view('test-drive-battle');
    }

    public function stockCarDetails(StockCars $car)
    {
        return view('stock-car-details', [
            'car' => $car,
            'contacts' => Contacts::current(),
            'otherCars' => StockCars::whereKeyNot($car->getKey())->where('status', '!=', 'sold')->get(),
        ]);
    }

    /**
     * A model landing page (/kodiaq, /karoq, ...): one template, per-model copy in config/model-pages.php.
     */
    public function modelPage(string $slug)
    {
        $page = config("model-pages.{$slug}");
        $model = Models::where('url', $slug)->with('images')->first();

        abort_if(! $page || ! $model, 404, 'Модель не знайдена');

        return view('model-page', [
            'page' => $page,
            'model' => $model,
            'models' => Models::where('url', '!=', $slug)->with('images')->get(),
        ]);
    }
}
