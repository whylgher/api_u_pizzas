<?php

namespace App\Http\Controllers;

use App\Models\ImagePizza as ModelsImagePizza;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class ImagePizzaController extends Controller
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
        try {
            $image = $request->image;
            $name = time() . '.' . $image->getClientOriginalExtension();
            $request->image->storeAs('public', $name);
            $url = URL::asset('storage/' . $name);

            $imagePizza = ModelsImagePizza::create([
                'image' => $url,
                'pizza_id' => $request->pizza_id,
            ]);

            if ($imagePizza) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Upload successfully',
                    'url_image' => $url,
                    'todo' => $imagePizza,
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                ]);
            }
        } catch (QueryException $e) {
            return response()->json([
                'error' => 'Erro ao registrar no banco',
                'message' => $e
            ]);
        }
    }
}
