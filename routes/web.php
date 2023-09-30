<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [IndexController::class, 'Index'])->name('index');
Route::get('/our_history', [IndexController::class, 'OurHistory'])->name('our_history');
Route::get('/testimonies', [IndexController::class, 'Testimonies'])->name('testimonies');

Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/product/{productId}', [ProductController::class, 'GetProduct'])->name('getProduct');
Route::get('/products', [ProductController::class, 'Index'])->name('index');

