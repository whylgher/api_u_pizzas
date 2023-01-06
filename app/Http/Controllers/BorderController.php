<?php

namespace App\Http\Controllers;

use App\Models\Border;
use Illuminate\Http\Request;

class BorderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        return Border::all();
    }

    public function create(Request $request)
    {
        $border = Border::create($request->all());
        if ($border) {
            return response()->json([
                'message' => 'success',
                'data' => $border,
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $border = Border::find($id);

        if ($border) {
            $border->update($request->all());
            return response()->json(
                [
                    'message' => 'success',
                    'data' => $border
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
