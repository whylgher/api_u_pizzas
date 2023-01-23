<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function show($id)
    {
        $address = Address::find($id);
        return response()->json([
            "message" => "success",
            "data" => $address,
        ]);
    }

    public function showIdUser($id)
    {
        $address = Address::all()->where('user_id', '=', $id);
        return response()->json([
            "message" => "success",
            "data" => $address,
        ]);
    }

    public function create(Request $request)
    {
        $address = Address::create($request->all());
        // "latlng" => DB::raw("(ST_GeomFromText('POINT($request->latlng)'))"),

        return response()->json([
            "message" => "success",
            "data" => $address,
        ]);
    }
}
