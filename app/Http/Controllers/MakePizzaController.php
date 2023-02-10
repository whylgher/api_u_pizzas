<?php

namespace App\Http\Controllers;

use App\Http\Requests\MakePizzaRequest;
use App\Models\Cheese;
use App\Models\Dough;
use App\Models\MakePizza;
use App\Models\Sauce;
use App\Models\Topping;
use App\Models\Veggie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class MakePizzaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        return response()->json([
            'message' => 'success',
            'pizza' => MakePizza::all(),
            'sauce' => Sauce::all(),
            'cheese' => Cheese::all(),
            'veggie' => Veggie::all(),
            'topping' => Topping::all(),
            'dough' => Dough::all(),
        ]);
    }

    public function store(MakePizzaRequest $request)
    {
        $validate = $request->validate([]);

        $image = $request->image;
        $name = 'pizza_' . time() . '.' . $image->getClientOriginalExtension();
        $request->image->storeAs('public', $name);
        $url = 'storage/' . $name;

        $pizza = new MakePizza();
        $pizza->name = $request->name;
        $pizza->image = $url;
        $pizza->sauce = $request->sauce;
        $pizza->cheese = $request->cheese;
        $pizza->topping = $request->topping;
        $pizza->viggie = $request->viggie;
        $pizza->price = $request->price;
        $pizza->save();

        return response()->json([
            'message' => 'success',
            'pizza' => $pizza
        ]);
    }
}
