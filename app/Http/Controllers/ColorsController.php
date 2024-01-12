<?php

namespace App\Http\Controllers;

use App\Models\color;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Contracts\View\Factory;

class ColorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('color/index')->with(['colors' => Color::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : JsonResponse
    {
        try {
            $color = Color::Create([
                'name' => $request['color'],
                'code' => $request['code']
            ]);
            return response()->json('Color created successfully.');
        }
        catch (\Throwable $exception)
        {
            report($exception);
            $message = 'An error has occurred, please contact the administrator.';

            return response()->json($message, 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(color $colors)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(color $colors)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, color $colors)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(color $colors)
    {
        //
    }
}
