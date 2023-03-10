<?php

namespace App\Http\Controllers;

use App\Models\Topping;
use Illuminate\Http\Request;

class ToppingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        return response()->json([
            "message" => "success",
            "data" => Topping::all(),
        ]);
    }

    public function store(Request $request)
    {
        $topping = Topping::create($request->all());

        return response()->json([
            "message" => "success",
            "data" => $topping,
        ]);
    }
}
