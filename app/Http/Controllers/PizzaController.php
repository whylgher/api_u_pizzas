<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PizzaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index']]);
    }

    public function index()
    {
        $pizzas = DB::table('pizzas')
            ->join('image_pizzas', 'image_pizzas.pizza_id', '=', 'pizzas.id')
            ->join('prices_pizzas', 'prices_pizzas.pizza_id', '=', 'pizzas.id')
            ->get();

        return $pizzas;
    }

    public function show($id)
    {
        $pizza = Pizza::find($id);
        if ($pizza) {
            $pizza->prices;
            $pizza->image;
            return $pizza;
        }
    }

    public function create(Request $request)
    {
        try {
            $pizza = Pizza::create([
                'name' => $request->name,
                'description' => $request->description,
                'category' => $request->category,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Pizza created successfully',
                'Pizza' => $pizza,
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => 'Name or Description already exists.',
                'error' => $e,
            ]);
        }
    }
}
