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

    public function kodiaq()
    {
        return $this->modelPage('kodiaq', 'ModelsPages.kodiaq');
    }

    public function octavia()
    {
        return $this->modelPage('octavia-a8', 'ModelsPages.octavia');
    }

    public function superb()
    {
        return $this->modelPage('superb', 'ModelsPages.superb');
    }

    public function fabia()
    {
        return $this->modelPage('fabia', 'ModelsPages.fabia');
    }

    public function scala()
    {
        return $this->modelPage('scala', 'ModelsPages.scala');
    }

    public function kamiq()
    {
        return $this->modelPage('kamiq-fl', 'ModelsPages.kamiq');
    }

    public function enyaq()
    {
        return $this->modelPage('enyaq', 'ModelsPages.enyaq');
    }

    public function karoq()
    {
        return $this->modelPage('karoq', 'ModelsPages.karoq');
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
     * A model landing page: the model itself plus the other models for the "Інші моделі" block.
     */
    private function modelPage(string $url, string $view)
    {
        $model = Models::where('url', $url)->with('images')->first();

        abort_if(! $model, 404, 'Модель не знайдена');

        return view($view, [
            'model' => $model,
            'models' => Models::where('url', '!=', $url)->with('images')->get(),
        ]);
    }
}
