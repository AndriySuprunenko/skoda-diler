<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('home');
    }
    public function contact()
    {
        return view('contact');
    }
    public function kodiaq()
    {
        return view('ModelsPages.kodiaq');
    }
    public function octavia()
    {
        return view('ModelsPages.octavia');
    }
    public function superb()
    {
        return view('ModelsPages.superb');
    }
    public function fabia()
    {
        return view('ModelsPages.fabia');
    }
    public function scala()
    {
        return view('ModelsPages.scala');
    }
    public function kamiq()
    {
        return view('ModelsPages.kamiq');
    }
    public function karoq()
    {
        return view('ModelsPages.karoq');
    }
    public function credit()
    {
        return view('credit');
    }
    public function tradeIn()
    {
        return view('trade-in');
    }
    public function reviews()
    {
        return view('reviews');
    }
    public function thankYou()
    {
        return view('thank-you');
    }
    public function stockCars()
    {
        return view('stock-cars');
    }
    public function stockCarDetails($car)
    {
        // Logic to retrieve and display details for the specific stock car
        return view('stock-car-details', ['carId' => $car]);
    }
}
