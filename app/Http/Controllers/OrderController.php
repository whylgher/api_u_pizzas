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
        $order = Order::find($id);

        if ($order) {
            return response()->json([
                "message" => "success",
                "name" => $order->name,
                "description" => $order->description,
                "status" => $order->status,
                "amount" => $order->amount,
                "tax" => $order->tax,
                "total" => $order->total,
                "order" => $order->order,
                "drink" => $order->drink,
            ]);
        }
    }

    public function showIdUser($id)
    {
        $order = Order::all()->where('user_id', '=', $id)->sortByDesc("id");
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
                "status" => 200
            ]);
        }
    }
}
