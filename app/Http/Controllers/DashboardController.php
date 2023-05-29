<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //

    public function index()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->get();
        $order = Order::find($user->id);
        // var_dump($order->product_id);
        // $products = Product::find($order->product_id);
        // var_dump($products)
        // $products = DB::table('orders')
        //     ->join('products', 'orders.product_id', '=', 'products.id')
        //     ->select('orders.*', 'products.name')
        //     ->get();

        // $product = Product::find($order);
        // var_dump($product);
        // var_dump($order);
        return view('order.dashboard', compact(['orders']));
    }

    public function show($product_id)
    {
        $product = Product::find($product_id);
        // var_dump($product);
        // $order = Order::where('product_id', $product_id)->get();
        // var_dump($product->name);

        $order = DB::table('orders')
            ->where('product_id', $product_id)
            ->get();

        // var_dump($order);
        return view('order.detail', compact(['order', 'product']));
    }
}