<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Product;
use App\Models\ProductVariants;
use App\Models\Size;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function Add(Request $request): JsonResponse
    {
        $qty = (int)$request['qty'];
        $color = $request['color'];
        $size = $request['size'];
        $productId = $request['productId'];

        $colorId = Color::where('name', $color)->value('id');
        $sizeId = Size::where('name', $size)->value('id');
        $product = Product::where('id', $productId)->first();
        $productVariant = ProductVariants::where([
            'product_id' => $productId,
            'color_id' => $colorId,
            'size_id' => $sizeId
        ])->first();

        if ($qty > $productVariant->stock_quantity)
        {
            return response()->json('error', 500);
        }

        $attributes = array([
            'color' => $color,
            'size' => $size,
            'product_id' => $product->id,
            'image_url' => $product->image_url
        ]);

        \Cart::add($productVariant->id, $product->name, (float)$product->price, $qty, $attributes);

        return response()->json('Product added successfully.');
    }

    public function GetContent()
    {
        //return \Cart::getContent();
        return View('cart/index')->with(['products' => \Cart::getContent()]);
    }
}
