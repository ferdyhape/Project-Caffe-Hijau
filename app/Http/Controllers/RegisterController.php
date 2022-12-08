<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register', [
            "title" => "Register"
        ]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255',
            'level' => 'required'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        // dd($validatedData);

        $request->session()->flash('success', 'Registrasi berhasil, silahkan login');

        return redirect('/login');
    }
}
