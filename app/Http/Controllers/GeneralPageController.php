<?php

namespace App\Http\Controllers;

use App\Models\item;
use Illuminate\Http\Request;
use App\Models\item_category;
use App\Http\Controllers\Controller;

class GeneralPageController extends Controller
{
    public function index()
    {
        return view('general-page.index', [
            'title' => 'Home',
            'item' => item::orderBy('created_at', 'desc')->get(),
        ]);
    }

    public function about()
    {
        return view('general-page.about', [
            'title' => 'About Us'
        ]);
    }

    public function contact()
    {
        return view('general-page.contact', [
            'title' => 'Contact'
        ]);
    }

    public function product()
    {
        return view('general-page.product', [
            'title' => 'Products',
            'category' => item_category::all(),
            // 'item' => item::all(),
            'item' => item::orderBy('price', 'asc')->get(),
        ]);
    }
}
