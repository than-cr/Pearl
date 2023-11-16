<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Type;
use Illuminate\Foundation\Application;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    //
    public function Index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $type = Type::where(['name' => 'Removed', 'group' => 'product_status'])->value('id');
        $products = Product::where('status_id', '!=', $type)->get();

        return view('index')->with('products', $products);
    }

    public function Testimonies(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('testimonies');
    }

    public function OurHistory(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('ourHistory');
    }
}
