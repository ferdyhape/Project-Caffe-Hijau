<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            "title" => "Dashboard"
        ]);
    }
    public function table()
    {
        return view('dashboard.tables', [
            "title" => "Tables"
        ]);
    }
    public function utilities_color()
    {
        return view('dashboard.utilities-color', [
            "title" => "Color"
        ]);
    }
    public function utilities_border()
    {
        return view('dashboard.utilities-border', [
            "title" => "Border"
        ]);
    }
    public function utilities_animation()
    {
        return view('dashboard.utilities-animation', [
            "title" => "Animation"
        ]);
    }
    public function utilities_other()
    {
        return view('dashboard.utilities-other', [
            "title" => "Other"
        ]);
    }
    public function buttons()
    {
        return view('dashboard.buttons', [
            "title" => "Buttons"
        ]);
    }
    public function cards()
    {
        return view('dashboard.cards', [
            "title" => "Cards"
        ]);
    }
    public function charts()
    {
        return view('dashboard.charts', [
            "title" => "Charts"
        ]);
    }
    public function error_404()
    {
        return view('dashboard.404', [
            "title" => "404"
        ]);
    }
    public function blank()
    {
        return view('dashboard.blank', [
            "title" => "Blank"
        ]);
    }
    public function login()
    {
        return view('dashboard.login', [
            "title" => "Login"
        ]);
    }
    public function register()
    {
        return view('dashboard.register', [
            "title" => "Register"
        ]);
    }
    public function forgot_password()
    {
        return view('dashboard.forgot-password', [
            "title" => "Forgot Password"
        ]);
    }
}
