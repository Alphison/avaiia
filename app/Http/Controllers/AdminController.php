<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Order;
use App\Models\OrderedProduct;
use App\Models\OrderStatus;
use App\Models\PreOrder;
use App\Models\Product;
use App\Models\ProductStatus;
use App\Models\Promocode;
use App\Models\User;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function index (Request $request) {
        $collections = Collection::all();
        $products = Product::all();
        $productStatuses = ProductStatus::all();
        $orders = Order::all();
        $preOrders = PreOrder::all();
        $promocodes = Promocode::all();
        if ($request->get('email')){
            $users = User::query()->where('email', 'LIKE','%' . $request->email . '%')->get();
        } else{
            $users = User::all();
        }

        return view('admin.admin', [
            'collections' => $collections,
            'products' => $products,
            'orders' => $orders,
            'users' => $users,
            'productStatuses' => $productStatuses,
            'preOrders' => $preOrders,
            'promocodes' => $promocodes
        ]);
    }

    public function order(string $id){
        $order = Order::query()->where('id', $id)->first();
        $user = User::query()->where('id', $order->user_id)->first();
        $products = OrderedProduct::query()->where('order_id', $order->id)->get();
        $statuses = OrderStatus::all();

        return view('admin.order', [
            'order' => $order,
            'user' => $user,
            'products' => $products,
            'statuses' => $statuses
        ]);
    }
}
