<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Product;
use App\Models\ProductVariants;
use App\Models\Size;
use App\Models\Type;
use Illuminate\Http\JsonResponse;
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
        $type = Type::where(['name' => 'Removed', 'group' => 'product_status'])->value('id');
        $products = Product::where('user_id', Auth::user()->id)->where('status_id', '!=', $type)->get();

        $colors = Color::all();
        $sizes = Size::all();

        return view('products/index')->with(['products' => $products, 'colors' => $colors, 'sizes' => $sizes]);
    }

    private function ProcessImage($image): string
    {
        // Get file extension
        $img = $image[0]['dataURL'];
        $imageExtensionStart = iconv_strpos($img, "/") + 1;
        $imageExtensionEnd = iconv_strpos($img, ";");
        $imageExtension = substr($img, $imageExtensionStart, ($imageExtensionEnd - $imageExtensionStart));

        // Change name and path to save
        $fileName = time() . '.' . $imageExtension;
        $filePath = 'products/' . $fileName;

        // Save image
        Storage::disk('public')->put($filePath, $img);

        return $filePath;
    }

    public function Create(Request $request): JsonResponse
    {
        try {
            $filePath = $this->ProcessImage($request['image']);
            if (0 == $request['id']) {
                $request['id'] = uuid_create();
            }

            $product = Product::updateOrCreate(
                ['id' => $request['id']],
                [
                    'name' => $request['title'],
                    'description' => $request['description'],
                    'price' => $request['price'],
                    'qualification' => 0,
                    'reviewers_counter' => 0,
                    'status_id' => Type::where(['name' => 'Active', 'group' => 'product_status'])->value('id'),
                    'user_id' => Auth::user()->id,
                    'image_url' => $filePath
                ]
            );

            foreach ($request['variants'] as $variant)
            {
                $color = Color::where('name', $variant['color'])->value('id');
                $size = Size::where('name', $variant['size'])->value('id');

                ProductVariants::updateOrCreate(
                    ['product_id' => $product->id, 'color_id' => $color, 'size_id' => $size],
                    [
                    'product_id' => $product->id,
                    'color_id' => $color,
                    'size_id' => $size,
                    'stock_quantity' => $variant['stock']
                ]);
            }

            return response()->json('Product created successfully.');
        }
        catch (\Throwable $exception)
        {
            report($exception);
            $message = 'An error has occurred, please contact the administrator.';

            return response()->json($message, 500);
        }
    }

    public function Edit($productId): JsonResponse
    {
        $product = Product::findOrFail($productId);
        $product->image_name = substr($product->image_url, (iconv_strpos($product->image_url, "/") + 1));
        $product->image_url = Storage::disk('public')->get($product->image_url);

        return response()->json($product);
    }

    public function Delete(Request $request): JsonResponse
    {
         $product = Product::findOrFail($request->get('id'));
         $product->status_id = Type::where(['name' => 'Removed', 'group' => 'product_status'])->value('id');

         if ($product->save()) {
             return response()->json('Product deleted.');
         }

         return response()->json('An error has occurred, please contact the administrator.', 500);
    }
}
