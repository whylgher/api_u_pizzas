<?php

namespace App\Http\Controllers;

use App\Models\Sauce;
use Illuminate\Http\Request;

class SauceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        return response()->json([
            "message" => "success",
            "data" => Sauce::all(),
        ]);
    }

    public function store(Request $request)
    {
        $sauce = Sauce::create($request->all());

        return response()->json([
            "message" => "success",
            "data" => $sauce,
        ]);
    }
}
