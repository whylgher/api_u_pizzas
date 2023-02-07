<?php

namespace App\Http\Controllers;

use App\Models\Drink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class DrinkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        return Drink::all();
    }

    public function store(Request $request)
    {
        $image = $request->image;
        $name = 'drink_' . time() . '.' . $image->getClientOriginalExtension();
        $request->image->storeAs('public', $name);
        $url = 'storage/' . $name;

        $drink = Drink::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $url,
            'price' => $request->price,
            'ml' => $request->ml,
        ]);

        if ($drink) {
            return response()->json([
                'status' => 'success',
                'message' => 'Upload successfully',
                'todo' => $drink,
            ]);
        } else {
            return response()->json([
                'status' => 'error',
            ], 401);
        }
    }
}
