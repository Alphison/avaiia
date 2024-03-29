<?php

namespace App\Http\Controllers;

use App\Models\PreOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PreOrderController extends Controller
{
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'size' => 'required|string',
            'product_id' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput($request->all());
        }

        $preOrder = PreOrder::query()->create(['user_id' => Auth::user()->id] + $validator->validated());

        return redirect()->back();
    }
}
