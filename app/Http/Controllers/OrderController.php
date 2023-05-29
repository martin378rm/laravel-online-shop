<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //


    public function create()
    {
        $products = Product::all();

        return view('order.create', compact('products'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'qty' => 'required|integer|min:1',
        ]);

        $user = Auth::user();

        $order = new Order();
        $order->user_id = $user->id;
        $order->product_id = $request->input('product_id');
        $order->qty = $request->input('qty');
        $order->save();

        return redirect()->back()->with('success', 'Order berhasil dibuat.');
    }
}