<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralPageController extends Controller
{
    public function index()
    {
        return view('index', [
            'title' => 'Home'
        ]);
    }

    public function about()
    {
        return view('about', [
            'title' => 'about'
        ]);
    }

    public function contact()
    {
        return view('contact', [
            'title' => 'Contact'
        ]);
    }

    public function product()
    {
        return view('product', [
            'title' => 'Product'
        ]);
    }
}
