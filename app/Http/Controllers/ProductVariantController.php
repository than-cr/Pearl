<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\ProductVariants;
use App\Models\Size;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductVariantController extends Controller
{
    public function GetProductVariant($productId, $size, $color): JsonResponse
    {
        $size_id = Size::where('name',$size)->value('id');
        $color_id = Color::where('name',$color)->value('id');
        $stock_quantity = ProductVariants::where(['size_id' => $size_id, 'color_id' => $color_id, 'product_id' => $productId])->value('stock_quantity');

        return response()->json(['stock_quantity' => $stock_quantity]);
    }
}
