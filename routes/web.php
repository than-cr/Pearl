<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductVariantController;
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

Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/', [IndexController::class, 'Index'])->name('index');
Route::get('/our_history', [IndexController::class, 'OurHistory'])->name('our_history');
Route::get('/testimonies', [IndexController::class, 'Testimonies'])->name('testimonies');

Route::get('/product-variant/{productId}/{size}/{color}', [ProductVariantController::class, 'GetProductVariant'])->name('getProductVariant');

Route::get('/product/{productId}', [ProductController::class, 'GetProduct'])->name('getProduct');

Route::middleware('auth')->group(function ()
{
    Route::get('/home', [HomeController::class, 'index'])->name('home')->can('View home');

    Route::get('/products', [ProductController::class, 'Index'])->name('product-index')->can('View products');
    Route::post('/products/save', [ProductController::class, 'Create'])->name('product-save')->can('Add product');
    Route::get('/products/{productId}', [ProductController::class, 'Edit'])->name('product-edit')->can('Edit product');
    Route::post('/products/delete', [ProductController::class, 'Delete'])->name('product-delete')->can('Delete product');


});
