<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SizesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('size/index')->with(['sizes' => Size::all()]);
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
            $size = Size::Create(['name' => $request['size']]);
            return response()->json('Size created successfully.');
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
    public function show(size $sizes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(size $sizes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, size $sizes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(size $sizes)
    {
        //
    }
}
