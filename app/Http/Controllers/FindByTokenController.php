<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FindByTokenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $data = $request->user();

        return response()->json([
            'email' => $data->email,
            'img_url' => $data->img_url,
            'data' => $data,
        ]);
    }
}
