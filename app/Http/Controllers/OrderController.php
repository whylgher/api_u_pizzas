<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $order = Order::all();
        return response()->json([
            "message" => "success",
            "order" => $order
        ]);
    }

    public function show($id)
    {
        return Order::find($id);
    }

    public function showIdUser($id)
    {
        $order = Order::all()->where('user_id', '=', $id);
        return response()->json([
            "message" => "success",
            "order" => $order
        ]);
    }

    public function store(Request $request)
    {
        $order = Order::create($request->all());
        if ($order) {
            return response()->json([
                "message" => "success",
                "order_id" => $order->id,
                "order" => $order,
                "status" => 200
            ]);
        }
    }
}
