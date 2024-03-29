<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductSize;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function show(Request $request)
    {
        $cart = Cart::query()->when(Auth::check(), function (Builder $query) use ($request) {
            $query->where('user_id', '=', Auth::user()->id)
                ->orWhere('session_token', '=', $request->cookie('browser_session'));
        }, function (Builder $query) use ($request) {
            $query->where('session_token', '=', $request->cookie('browser_session'));
        })
            ->get();

        return view('pages.cart', compact('cart'));
    }

    public function increase(Request $request, string $productId, string $sizeId)
    {
        Cart::query()->where('size_id', '=', $sizeId)
            ->where('product_id', '=', $productId)
            ->when(Auth::check(), function (Builder $query) use ($request) {
                $query->where('user_id', '=', Auth::user()->id)
                    ->orWhere('session_token', '=', $request->cookie('browser_session'));
            }, function (Builder $query) use ($request) {
                $query->where('session_token', '=', $request->cookie('browser_session'));
            })
            ->increment('count');

        return redirect()->back();
    }

    public function decrease(Request $request, string $productId, string $sizeId)
    {
        Cart::query()->where('size_id', '=', $sizeId)
            ->where('product_id', '=', $productId)
            ->when(Auth::check(), function (Builder $query) use ($request) {
                $query->where('user_id', '=', Auth::user()->id)
                    ->orWhere('session_token', '=', $request->cookie('browser_session'));
            }, function (Builder $query) use ($request) {
                $query->where('session_token', '=', $request->cookie('browser_session'));
            })
            ->decrement('count');

        return redirect()->back();
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'size_id' => 'required',
            'product_id' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }

        $cartItem = Cart::query()->where('size_id', '=', $request->size_id)
            ->where('product_id', '=', $request->product_id)
            ->when(Auth::check(), function (Builder $query) use ($request) {
                $query->where('user_id', '=', Auth::user()->id)
                    ->orWhere('session_token', '=', $request->cookie('browser_session'));
            }, function (Builder $query) use ($request) {
                $query->where('session_token', '=', $request->cookie('browser_session'));
            })
            ->first();

        if ($cartItem) {
            $cartItem->increment('count');

            session()->flash("success", __('cart.message'));

            return redirect()->back();
        }

        if (Auth::check()) {
            Cart::query()->create([
                    'user_id' => Auth::user()->id,
                    'session_token' => $request->cookie('browser_session'),
                    'count' => 1
                ] + $validator->validated());
        } else {
            Cart::query()->create([
                    'session_token' => $request->cookie('browser_session'),
                    'count' => 1
                ] + $validator->validated());
        }

        session()->flash("success", __('cart.message'));

        return redirect()->back();
    }

    public function delete($id)
    {
        Cart::query()->where('id', '=', $id)->delete();

        return redirect()->back();
    }
}
