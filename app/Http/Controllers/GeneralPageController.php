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
        return view('client-side.index', [
            'title' => 'Home',
            'item' => item::orderBy('created_at', 'desc')->paginate(3),
        ]);
    }

    public function about()
    {
        return view('client-side.about', [
            'title' => 'About Us'
        ]);
    }

    public function contact()
    {
        return view('client-side.contact', [
            'title' => 'Contact'
        ]);
    }

    public function product()
    {
        return view('client-side.product', [
            'title' => 'Products',
            'category' => item_category::all(),
            // 'item' => item::all(),
            'item' => item::paginate(6),
        ]);
    }
}
