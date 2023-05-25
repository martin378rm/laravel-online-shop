<!-- resources/views/order.blade.php -->

@extends('layouts.main')

@section('container')
    <div class="container">
        <h1>Pemesanan Produk</h1>

        <form action="{{ route('order.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="product">Produk</label>
                <select name="product" id="product" class="form-control" required>
                    <option value="">Pilih Produk</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="quantity">Jumlah</label>
                <input type="number" class="form-control" id="quantity" name="quantity" required>
            </div>

            <button type="submit" class="btn btn-primary">Buat Pesanan</button>
        </form>
    </div>
@endsection
