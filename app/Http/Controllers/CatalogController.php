<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    //
    public function index()
    {
        $products = Product::all();

        return view('catalog.index', compact('products'));
        // ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function edit(Product $product)
    {
        return view('catalog.detail', compact('product'));
    }
}