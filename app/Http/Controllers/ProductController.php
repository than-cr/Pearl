<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;


class ProductController extends Controller
{
    public function GetProduct($productId): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('products/product')->with('product', Product::findOrFail($productId));
    }

    public function Index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $products = Product::where('user_id', Auth::user()->id)->get();

        return view('products/index')->with('products', $products);
    }

    public function AddProduct(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $colors = Color::all();
        $sizes = Size::all();
        return view('products/add-product')->with(['colors' => $colors, 'sizes' => $sizes]);
    }

    public function Create(Request $request)
    {
        return $request;
    }
}
