<?php

use App\Http\Controllers\GeneralPageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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
Route::get('/contact', [GeneralPageController::class, 'contact'])->name('contact')->middleware('auth', 'admin');
Route::get('/product', [GeneralPageController::class, 'product'])->name('product')->middleware('auth');

Route::get('/auth', [AuthController::class, 'index'])->name('auth')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/register', [AuthController::class, 'store']);
Route::post('/logout', [AuthController::class, 'logout']);
