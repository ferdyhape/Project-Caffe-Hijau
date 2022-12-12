<?php

use App\Http\Controllers\GeneralPageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Models\item;

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


Route::get('/tes', function () {
    return view('tes', [
        'title' => 'Home',
        'item' => item::all(),
    ]);
})->middleware('auth');
Route::get('/', [GeneralPageController::class, 'index'])->name('index')->middleware('auth');
Route::get('/about', [GeneralPageController::class, 'about'])->name('about')->middleware('auth');
Route::get('/contact', [GeneralPageController::class, 'contact'])->name('contact')->middleware('auth');
Route::get('/product', [GeneralPageController::class, 'product'])->name('product')->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// register
Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
