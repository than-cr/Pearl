<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductVariantController;
use App\Http\Controllers\SizesController;
use App\Http\Controllers\ColorsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
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

Route::get('/cart', [CartController::class, 'GetContent'])->name('getContent');
Route::post('/cart/add', [CartController::class, 'Add'])->name('addToCart');
Route::post('/cart/update', [CartController::class, 'Update'])->name('updateCart');
Route::post('/cart/delete', [CartController::class, 'Delete'])->name('deleteFromCart');
Route::get('/cart/data', [CartController::class, 'GetCartData'])->name('cartData');


Route::middleware('auth')->group(function ()
{
    Route::get('/home', [HomeController::class, 'index'])->name('home')->can('View home');

    Route::get('/products', [ProductController::class, 'Index'])->name('product-index')->can('View products');
    Route::post('/products/save', [ProductController::class, 'Create'])->name('product-save')->can('Add product');
    Route::get('/products/{productId}', [ProductController::class, 'Edit'])->name('product-edit')->can('Edit product');
    Route::post('/products/delete', [ProductController::class, 'Delete'])->name('product-delete')->can('Delete product');

    Route::get('/sizes', [SizesController::class, 'index'])->name('size-index')->can('View sizes');
    Route::get('/sizes/{sizeId}', [SizesController::class, 'Show'])->name('size-show')->can('View sizes');
    Route::post('/sizes/save', [SizesController::class, 'store'])->name('size-save')->can('Add size');

    Route::get('/colors', [ColorsController::class, 'index'])->name('color-index')->can('View colors');
    Route::get('/colors/{colorId}', [ColorsController::class, 'Show'])->name('color-show')->can('View colors');
    Route::post('/colors/save', [ColorsController::class, 'store'])->name('color-save')->can('Add color');

    Route::get('/categories', [CategoryController::class, 'Index'])->name('category-index')->can('View categories');
    Route::post('/categories', [CategoryController::class, 'Save'])->name('category-save')->can('Add category');
});
