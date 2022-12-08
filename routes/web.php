<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/about', function () {
    return view('about', [
        'title' => 'About'
    ]);
})->middleware('auth');;
Route::get('/contact', function () {
    return view('contact', [
        'title' => 'Contact'
    ]);
})->middleware('auth');
Route::get('/product', function () {
    return view('product', [
        'title' => 'Products'
    ]);
})->middleware('auth');
Route::get('/', function () {
    return view('index', [
        'title' => 'Home'
    ]);
})->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// register
Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
