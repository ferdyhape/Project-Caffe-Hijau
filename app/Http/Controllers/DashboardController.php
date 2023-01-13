<?php

namespace App\Http\Controllers;

use App\Models\item;
use App\Models\item_category;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin-side.dashboard.index', [
            "title" => "Dashboard",
            "itemCount" => item::all()->count(),
            "categoryCount" => item_category::all()->count(),
        ]);
    }
    public function table()
    {
        return view('admin-side.dashboard.tables', [
            "title" => "Tables"
        ]);
    }
    public function utilities_color()
    {
        return view('admin-side.dashboard.utilities-color', [
            "title" => "Color"
        ]);
    }
    public function utilities_border()
    {
        return view('admin-side.dashboard.utilities-border', [
            "title" => "Border"
        ]);
    }
    public function utilities_animation()
    {
        return view('admin-side.dashboard.utilities-animation', [
            "title" => "Animation"
        ]);
    }
    public function utilities_other()
    {
        return view('admin-side.dashboard.utilities-other', [
            "title" => "Other"
        ]);
    }
    public function buttons()
    {
        return view('admin-side.dashboard.buttons', [
            "title" => "Buttons"
        ]);
    }
    public function cards()
    {
        return view('admin-side.dashboard.cards', [
            "title" => "Cards"
        ]);
    }
    public function charts()
    {
        return view('admin-side.dashboard.charts', [
            "title" => "Charts"
        ]);
    }
    public function error_404()
    {
        return view('admin-side.dashboard.404', [
            "title" => "404"
        ]);
    }
    public function blank()
    {
        return view('admin-side.dashboard.blank', [
            "title" => "Blank"
        ]);
    }
    public function login()
    {
        return view('admin-side.dashboard.login', [
            "title" => "Login"
        ]);
    }
    public function register()
    {
        return view('admin-side.dashboard.register', [
            "title" => "Register"
        ]);
    }
    public function forgot_password()
    {
        return view('admin-side.dashboard.forgot-password', [
            "title" => "Forgot Password"
        ]);
    }
}
