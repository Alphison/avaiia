<?php

namespace App\Http\Controllers;

use App\Models\Promocode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PromocodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'promocode' => 'required|unique:promocodes,promocode',
            'value' => 'required|integer'
        ]);

        $promocode = Promocode::query()->create($validator->validated());

//        $response = [
//            'success' => true,
//            'data' => $promocode,
//            'message' => 'Промокод успешно создан',
//        ];
//
//        return response()->json($response, 200);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function find(string $promocode): \Illuminate\Http\JsonResponse
    {
        $coupon = Promocode::query()->where('promocode', '=', $promocode)->first();

        if (!$coupon) {
            $response = [
                'success' => false,
                'message' => 'Промокод не найден',
            ];
            return response()->json($response, 404);
        }


        $response = [
            'success' => true,
            'data' => $coupon,
            'message' => 'Промокод успешно применен',
        ];

        return response()->json($response, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Promocode $promocode): \Illuminate\Http\JsonResponse
    {
        $promocode->delete();

        $response = [
            'success' => true,
            'data' => $promocode->id,
            'message' => 'Промокод успешно удален',
        ];

        return response()->json($response, 200);
    }
}
