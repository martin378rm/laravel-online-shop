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
        $user = Auth::user();

        // return view('order.create', ["active" => "order"], compact('products', 'user'));
        return view('latihan.order_create', ["active" => "order"], compact('products', 'user'));
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
                return redirect('orders/create')->with('message', 'stok tidak mencukupi');
            } else {
                $order->save();
                $product->save();
            }

            DB::commit();
            return redirect('/order/dashboard');

        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }

        // return redirect()->back()->with('success', 'Order berhasil dibuat.');
    }

    public function edit(Order $order)
    {
        $user = Auth::user();
        // return view('products.edit', compact('product'));
        return view('latihan.edit_order', ["active" => "manajemen_order"], compact('order', 'user'));
    }

    public function update(Request $request, Order $order)
    {
        $user = Auth::user(); // Mendapatkan user yang sedang login
        // Validasi data yang diterima dari form
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        // Cari order berdasarkan user_id dan id
        $order = Order::where('user_id', $user->id)
            ->findOrFail($order->id);

        // Update jumlah (quantity) order
        $order->quantity = $request->quantity;
        $order->save();

        // Redirect atau melakukan tindakan lain setelah berhasil memperbarui order
        return redirect()->route('order.index')
            ->with('success', 'Order berhasil diperbarui');
    }

    public function destroy(Order $order)
    {
        //
        $order->delete();
    }
}