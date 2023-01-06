<?php

namespace App\Http\Controllers;

use App\Models\Additional;
use Illuminate\Http\Request;

class AdditionalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        return Additional::all();
    }

    public function create(Request $request)
    {
        $additional = Additional::create($request->all());
        if ($additional) {
            return response()->json([
                'message' => 'success',
                'data' => $request->all(),
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $additional = Additional::find($id);

        if ($additional) {
            $additional->update($request->all());
            return response()->json(
                [
                    'message' => 'success',
                    'data' => $additional
                ]
            );
        }
        return response()->json(
            [
                'message' => 'error',
            ],
            404
        );
    }
}
