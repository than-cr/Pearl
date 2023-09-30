<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Foundation\Application;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;

class IndexController extends Controller
{
    //
    public function Index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('index')->with('products', Product::all());
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
