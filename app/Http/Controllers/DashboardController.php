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
        // $orders = Order::where('user_id', $user->id)->get();
        // $order = Order::find($user->id);
        // $order = $orders->product_id;
        // $product = DB::table('products')
        //     ->where('id', $order)
        //     ->get();
        // var_dump($order->product_id);
        // $products = Product::find($order->product_id);
        // var_dump($products)
        // $products = DB::table('orders')
        //     ->join('products', 'orders.product_id', '=', 'products.id')
        //     ->select('orders.*', 'products.name')
        //     ->get();

        // $product = Product::find($order);
        // var_dump($product);
        // var_dump($orders);

        // $product_id = $orders->product_id; // ID produk yang ingin dicari

        // $products = DB::table('products')
        //     ->where('id', $product_id)
        //     ->get();


        $orders = DB::table('orders')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->select('orders.*', 'products.name', 'products.price')
            ->where('user_id', $user->id)
            ->get();
        // var_dump($orders);
        return view('order.dashboard', compact(['orders']));
    }

    public function show($id)
    {
        // var_dump($product);
        // $order = Order::where('product_id', $product_id)->get();
        // var_dump($product->name);

        // $order = DB::table('orders')
        //     ->where('product_id', $product_id)
        //     ->get();

        $order = Order::find($id);
        // var_dump($order);
        // $data = $orders->id;
        // var_dump($order);
        $product = Product::find($order->product_id);
        return view('order.detail', compact(['order', 'product']));
    }
}