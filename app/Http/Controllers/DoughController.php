<?php

namespace App\Http\Controllers;

use App\Models\Dough;
use Illuminate\Http\Request;

class DoughController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        return response()->json([
            "message" => "success",
            "data" => Dough::all(),
        ]);
    }

    public function store(Request $request)
    {
        $dough = Dough::create($request->all());

        return response()->json([
            "message" => "success",
            "data" => $dough,
        ]);
    }
}
