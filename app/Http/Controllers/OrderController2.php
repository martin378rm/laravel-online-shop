<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderController2 extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::all();
        $user = Auth::user();


        return view('latihan.order_create', ["active" => "order"], compact('products', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $products = Product::all();
        $user = Auth::user();


        return view('latihan.order_create', ["active" => "order"], compact('products', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
        $user = Auth::user();
        var_dump($order);
        // return view('products.edit', compact('product'));
        return view('latihan.edit_order', ["active" => "manajemen_order"], compact('user', 'order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Order $order, Request $request)
    {
        // $order->update($request->all());
        // Mendapatkan user yang sedang login
        $user = Auth::user();
        // Validasi data yang diterima dari form
        $request->validate([
            'qty' => 'required|integer|min:1',
        ]);

        DB::beginTransaction();

        try {
            $product = Product::find($order->product_id);
            $product->qty += $order->qty;
            // dd($product->qty);
            $order->qty = 0;


            $order->qty = $request->input('qty');
            $product->qty -= $order->qty;
            // dd($product->qty);

            $order->save();
            $product->save();
            DB::commit();
        } catch (Exception $e) {
            echo $e;
        }


        return redirect()->route('order.dashboard')
            ->with('success', 'Order berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $order = Order::findOrFail($id);
        // $order->delete();

        DB::beginTransaction();

        try {
            $product = Product::find($order->product_id);
            $product->qty += $order->qty;
            $product->save();
            $order->delete();
            DB::commit();


        } catch (Exception $e) {
            echo $e;
        }


        return redirect('/order/dashboard');
    }
}