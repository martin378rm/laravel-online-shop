<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

        DB::beginTransaction();

        try {
            $order = new Order();
            $order->user_id = $user->id;
            $order->product_id = $request->input('product_id');
            $order->qty = $request->input('qty');

            $product = Product::find($order->product_id);
            $product->qty -= $order->qty;


            if ($product->qty < $order->qty) {
                // return back()->with('message', 'Stok barang tidak mencukupi');
                // return redirect('/order/create')->with('message', 'Stok barang tidak mencukupi');

                echo "<script>alert('jumlah stok tidak mencukupi')</script>";
                return redirect('/order/create');
            } else {
                $order->save();
                $product->save();
            }


            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }

        // return redirect()->back()->with('success', 'Order berhasil dibuat.');
    }
}