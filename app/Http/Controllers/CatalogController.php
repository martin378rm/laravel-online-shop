<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CatalogController extends Controller
{
    //
    public function index()
    {
        $products = Product::all();

        return view('catalog.index', compact('products'));
        // ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function edit(Product $product, $id)
    {

        $product = Product::find($id);
        return view('catalog.detail')->with('product', $product);
    }

    public function show(Product $product, $id)
    {

    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'qty' => 'required|integer|min:1'
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