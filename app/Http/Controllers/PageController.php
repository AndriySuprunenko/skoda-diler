<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('home');
    }
    public function about()
    {
        return view('about');
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
}
