<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //


    public function create()
    {
        //
        return view('order.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'user_id' => 'required',
            'product_id' => 'required|integer|min:0',
            'qty' => 'required|numeric|min:0'
        ]);


        // Mendapatkan user yang sedang login
        $user = Auth::user();

        // Membuat order baru
        $order = new Order();
        $order->user_id = $user->id;
        $order->product_id = $request->input('product');
        $order->quantity = $request->input('quantity');
        $order->save();
        return redirect()->back()->with('success', 'Order berhasil dibuat.');

    }
}