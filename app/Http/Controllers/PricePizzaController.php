<?php

namespace App\Http\Controllers;

use App\Models\PricePizza;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class PricePizzaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function __invoke(Request $request)
    {
        try {
            $pizza = PricePizza::create($request->all());
            return response()->json([
                'data' => $pizza,
                'message' => 'success'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'error' => 'Erro ao registrar no banco',
                'message' => $e
            ]);
        }
    }
}
