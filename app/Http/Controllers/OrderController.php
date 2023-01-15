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

    public function store(Request $request)
    {
        // $order = new Order();

        // $order->name = $request->name;
        // $order->user_id = $request->user_id;
        // $order->description = $request->description;
        // $order->status = $request->status;
        // $order->amount = $request->amount;
        // $order->tax = $request->tax;
        // $order->total = $request->total;
        // $order->order = $request->order;
        // $order->drink = $request->drink;

        // dd($order);

        // $data = $order->save();

        // return response()->json([
        //     "message" => "success",
        //     "data" => $data
        // ], 200);

        return Order::create($request->all());
    }
}
