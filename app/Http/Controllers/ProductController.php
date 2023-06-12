<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $user = Auth::user();

        // return view('products.index', compact('products'));
        return view('latihan.manajemen_product', ["active" => "manajemen_product"], compact('products', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $user = Auth::user();
        // return view('products.create', compact('user'));
        // return view('products.create', ['active' => 'manajemen_product'], compact('users'));

        return view('latihan.create_product', ['active' => 'manajemen_product'], compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'qty' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0'
        ]);


        Product::create($request->all());
        return redirect()->route('products.index')
            ->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Product $product)
    // {
    //     //
    //     return view('products.edit', compact('product'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $user = Auth::user();
        // return view('products.edit', compact('product'));
        return view('latihan.edit_product', ["active" => "manajemen_product"], compact('product', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Product $product, Request $request)
    {
        //


        $request->validate([
            'name' => 'required',
            'qty' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0'
        ]);

        $product->update($request->all());
        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        // $product->delete();

        // return redirect()->route('products.index')
        //     ->with('success', 'Product deleted successfully');

        $product = Product::findOrFail($id);

        // Cek apakah ada pesanan terkait dengan produk
        if ($product->orders()->exists()) {
            // Tampilkan peringatan SweetAlert jika produk memiliki pesanan terkait
            return back()->with('error', 'Produk memiliki pesanan terkait. Anda tidak dapat menghapus produk ini.');
        }

        // Lanjutkan penghapusan jika tidak ada pesanan terkait
        $product->delete();

        // Redirect ke halaman yang sesuai dan berikan pesan sukses
        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus.');
    }
}