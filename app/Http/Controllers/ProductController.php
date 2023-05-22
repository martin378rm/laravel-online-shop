<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $products = Product::all();
        // return view('products.products')->with('products', $products);

        $products = Product::all();

        return view('products.index', compact('products'));
        // ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // $validatedData = $request->validate([
        //     'name' => 'required',
        //     'qty' => 'required|integer|min:0',
        //     'price' => 'required|numeric|min:0',
        // ]);

        // $dataProduct = Product::create([
        //     'name' => $validatedData['name'],
        //     'qty' => $validatedData['qty'],
        //     'price' => $validatedData['price']
        // ]);

        // return redirect('/products');

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
    public function show(Product $product)
    {
        //
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Product $product, Request $request)
    {
        //

        // $request->validate([
        //     'name' => 'required',
        //     'qty' => 'required|integer|min:0',
        //     'price' => 'required|numeric|min:0',
        // ]);

        // $product->name = $request->name;
        // $product->qty = $request->qty;
        // $product->price = $request->price;

        // $product->save();
        // return redirect('/get');

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
    public function destroy(Product $product)
    {
        //
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }
}