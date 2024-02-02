<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function Index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('categories/index')->with('categories', Category::all());
    }

    public function Save(Request $request): JsonResponse
    {
        try {
            $categoryName = $request['name'];
            $isLimitedEdition = $request['limited_edition'];

            $category = Category::Create([
                'name' => $categoryName,
                'limited_edition' => $isLimitedEdition
            ]);

            return response()->json('Category created successfully.', 200);
        }
        catch (\Throwable $exception)
        {
            report($exception);
            return response()->json('An error has occured, please contact your administrator.', 500);
        }
    }
}
