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
        $user = Auth::user();

        // return view('catalog.index', compact('products', 'user'));
        return view('latihan.catalog', ["active" => "catalogs"], compact('products', 'user'));
        // return view('latihan.home', compact('products'));

        // ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function edit(Product $product, $id)
    {

        $product = Product::find($id);
        $user = Auth::user();
        // return view('catalog.detail')->with('product', $product);
        // return view('latihan.detail_product_catalog', ["active" => "catalog", compact('product', 'user')]);

        return view('latihan.detail_product_catalog', ['active' => 'catalogs'], compact('product', 'user'));
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