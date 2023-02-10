<?php

namespace App\Http\Controllers;

use App\Models\Veggie;
use Illuminate\Http\Request;

class VeggieController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        return response()->json([
            "message" => "success",
            "data" => Veggie::all(),
        ]);
    }

    public function store(Request $request)
    {
        $veggie = Veggie::create($request->all());

        return response()->json([
            "message" => "success",
            "data" => $veggie,
        ]);
    }
}
