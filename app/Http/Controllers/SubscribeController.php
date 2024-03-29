<?php

namespace App\Http\Controllers;

use App\Models\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscribeController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email'
        ]);

        if ($validator->fails()){
            return back()->withErrors($validator->errors())->withInput($request->all());
        }

        Subscribe::query()->create([
            'email' => $request->email
        ]);

        return redirect()->back();
    }
}
