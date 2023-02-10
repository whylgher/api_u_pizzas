<?php

namespace App\Http\Controllers;

use App\Models\Cheese;
use Illuminate\Http\Request;

class CheeseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        return response()->json([
            "message" => "success",
            "data" => Cheese::all(),
        ]);
    }

    public function store(Request $request)
    {
        $cheese = Cheese::create($request->all());

        return response()->json([
            "message" => "success",
            "data" => $cheese,
        ]);
    }
}
