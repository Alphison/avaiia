<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderedProduct;
use App\Models\Product;
use App\Models\ProductSize;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function success(){
        return view('pages.order.success');
    }

    public function rejected() {
        return view('pages.order.rejected');
    }

    public function store(Request $request)
    {

        if(Auth::check()){

            $order = Order::create([
                'user_id' => Auth::user()->id,
                'status_id' => 2,
                'date' => Carbon::today(),
                'price' => $request->price
            ]);
    
            $cart = Cart::query()->where('user_id', '=', Auth::user()->id)->get();
            Cart::query()->where('user_id', '=', Auth::user()->id)->delete();

        }else{

            $order = Order::create([
                'status_id' => 2,
                'date' => Carbon::today(),
                'price' => $request->price
            ]);
    
            $cart = Cart::query()->where('session_token', '=', $request->cookie('browser_session'))->get();
            Cart::query()->where('session_token', '=', $request->cookie('browser_session'))->delete();

        }


        foreach ($cart as $item){
            Product::query()->where('id', $item->product_id)->decrement('count', $item->count);
            ProductSize::query()->where('id', $item->size_id)->decrement('count', $item->count);

            OrderedProduct::create([
                'order_id' => $order->id,
                'products_id' => $item->product_id,
                'size_id' => $item->size_id,
                'count' => $item->count,
            ]);
        }

        return redirect()->route('delivery-page', $order->id);
    }

    public function update(Request $request, string $id) {
        Order::query()->where('id', $id)->update($request->except('_token'));

        $order = Order::query()->where('id', $id)->first();

        return redirect()->route('payment-view', $order->id);
    }


}
