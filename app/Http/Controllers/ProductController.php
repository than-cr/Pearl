<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    public function GetProduct($productId): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('products/product')->with('product', Product::findOrFail($productId));
    }

//    public function Index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    public function Index()
    {
        $products = Product::where('user_id', Auth::user()->id)->get();

        return view('products/index')->with('products', $products);
    }

    public function CreateProduct()
    {
        $product = new Product;
        $product->name = 'Worm for kids';
        $product->description = '';
        $product->price = 25.00;
        $product->qualification = 5;
        $product->reviewers_counter = 7;
        $product->image_url = '../assets/img/products/mock-products/worm.png';
        $product->stock_quantity = 0;

        $product->save();
    }
}
