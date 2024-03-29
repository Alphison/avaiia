<?php

namespace App\Http\Controllers;

use App\Models\ProductSize;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;

class SizeController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'size' => 'required',
            'product_id' => 'required',
            'count' => 'required',
        ]);

        if ($validator->fails()){
            return back()->withErrors($validator->errors())->withInput($request->all());
        }

        ProductSize::query()->create([
            'product_id' => $request->product_id,
        ] + $validator->validated());

        return redirect()->back();
    }
}
