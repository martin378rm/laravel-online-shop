<!-- resources/views/products/edit.blade.php -->

@extends('layouts.main')

@section('container')
    <div class="container">
        <h1>Edit Produk</h1>

        <form method="POST" action="{{ route('products.update',$product->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="qty">Jumlah</label>
                <input type="number" class="form-control" id="qty" name="qty"  required>
            </div>

            <div class="form-group">
                <label for="price">Harga</label>
                <input type="number" class="form-control" id="price" name="price"  required>
            </div>

            <button type="submit" class="btn btn-primary mt-4">Simpan</button>
        </form>
    </div>
@endsection
