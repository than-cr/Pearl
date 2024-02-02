<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Product;
use App\Models\ProductVariants;
use App\Models\Size;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Contracts\View\Factory;

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
            return response()->json('Quantity selected is greater than available in stock', 500);
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

    public function GetContent(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return View('cart/index')->with(['products' => \Cart::getContent()]);
    }

    public function Delete(Request $request): JsonResponse
    {
        $isRemoved = \Cart::remove($request['productId']);
        if ($isRemoved)
        {
            return response()->json('Product removed successfully.');
        }
        else
        {
            return response()->json('Error removing product.', 500);
        }
    }

    public function Update(Request $request): JsonResponse
    {
        $productId = $request['productId'];
        $quantity = $request['quantity'];
        $relative = $request['relative'];
        \Cart::update($productId, array(
            'quantity' => array(
                'relative' => $relative,
                'value' => $quantity
            ),
        ));

        return response()->json(\Cart::get($productId), 200);
    }

    public function GetCartData(): JsonResponse
    {
        $subtotal = \Cart::getSubTotal();
        $total = \Cart::getTotal();

        return response()->json(array(
            'subtotal'=> number_format($subtotal, 2),
            'total' => number_format($total, 2)
        ), 200);
    }
}
