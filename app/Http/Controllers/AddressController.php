<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class AddressController extends Controller
{
    public function index(string $id)
    {
        $order = Order::query()->where('id', $id)->first();
        return view('pages.delivery', compact('order'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'country' => 'required|max:255',
            'city' => 'required|max:255',
            'street' => 'required|max:255',
            'house' => 'required|max:255',
            'apartment' => '',
            'post_index' => 'integer',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput($request->all());
        }

        if(Auth::check()){
            Address::query()->create(['user_id' => Auth::user()->id] + $validator->validated());
        }else{
            Address::create(['session_token' => $request->cookie('browser_session')] + $validator->validated());
        }


        return redirect()->back();
    }

    public function delete(Address $address) {
        $address->delete();
        return redirect()->back();
    }

    public function payment(string $id) {
        return view('pages.payment', [
            'order' => Order::query()->where('id', $id)->first(),
        ]);
    }
}
