<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


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
        $title = $request->get('title');
        $description = $request->get('description');
        $price = $request->get('price');
        $image = $request->get('image');
        $variants = $request->get('variants');

        $product = new Product();
        $product->title = $title;
        $product->description = $description;
        $product->price = $price;
        $product->qualification = 0;
        $product->reviewers_counter = 0;
        $product->status_id = Type::where(['name' => 'Active', 'group' => 'user_status'])->value('id');
        $product->users_id = Auth::user()->id;

        // Save image with custom name
        $img = $image[0]['dataURL'];
        $imageExtensionStart = iconv_strpos($img, "/") + 1;
        $imageExtensionEnd = iconv_strpos($img, ";");
        $imageExtension = substr($img, $imageExtensionStart, ($imageExtensionEnd - $imageExtensionStart));

        // Change name
        $fileName = time() . '.' . $imageExtension;
        $filePath = 'products/' . $fileName;

        // Save image
        Storage::disk('public')->put($filePath, $img);

        $product->image_url = $filePath;

        return $product;
    }
}
