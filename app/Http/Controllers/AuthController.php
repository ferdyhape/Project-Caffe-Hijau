<?php

namespace App\Http\Controllers;

use Exception;
use Socialite;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login', [
            'title' => 'Login Page',
        ]);
    }
    public function redirectToGoole()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $finduser = User::where('google_id', $user->id)->first();

            if ($finduser) {
                Auth::login($finduser);
                return redirect('/')->with('success', 'Welcome back, ' . $finduser->name);
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'level' => 'user',
                    'password'  => Hash::make(Str::random(10)),
                    'google_id' => $user->id
                ]);
                Auth::login($newUser);
                return redirect('/')->with('success', 'Welcome, ' . $newUser->name);
            }
        } catch (Exception $e) {
            return redirect('/login');
        }
    }
    public function register()
    {
        return view('auth.register', [
            'title' => 'Register Page',
        ]);
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->with('toast_error', 'Login Failed');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email:dns,rfc|unique:users',
            'picture' => 'nullable|mimes:png,jpg,jpeg|max:2048',
            'password' => [
                'required',
                'confirmed',
                Password::min(6)
                    // ->letters()
                    ->mixedCase()
                // ->numbers()
                // ->symbols()
                // ->uncompromised()
            ],
        ]);

        $validatedData['level'] = 'user';
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        // dd($validatedData);

        // $request->session()->with('success', 'Registration is successful, please login');

        return redirect('/login')->with('toast_success', 'Registration is successful, Please login!');
    }
}
