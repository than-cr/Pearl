<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Product;
use App\Models\ProductVariants;
use App\Models\Size;
use App\Models\Type;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Response;
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
        try {
            $title = $request->get('title');
            $description = $request->get('description');
            $price = $request->get('price');
            $image = $request->get('image');
            $variants = $request->get('variants');

            $product = new Product();
            $product->name = $title;
            $product->description = $description;
            $product->price = $price;
            $product->qualification = 0;
            $product->reviewers_counter = 0;
            $product->status_id = Type::where(['name' => 'Active', 'group' => 'user_status'])->value('id');
            $product->user_id = Auth::user()->id;

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
            $product->save();

            foreach ($variants as $variant)
            {
                $productVariants = new ProductVariants();
                $productVariants->product_id = $product->id;
                $productVariants->color_id = Color::where('name', $variant['color'])->value('id');
                $productVariants->size_id = Size::where('name', $variant['size'])->value('id');
                $productVariants->stock_quantity = $variant['stock'];

                $productVariants->save();

                return response()->json($product, 200);
            }
        }
        catch (\Throwable $exception)
        {
            report($exception);
            $message = 'An error has occurred, please contact the administrator';

            return response()->json($message, 500);
        }
    }
}
