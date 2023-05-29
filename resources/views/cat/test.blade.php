<!-- resources/views/catalog.blade.php -->

@extends('layouts.main')

@section('container')
    <div class="container">
        <h1>Katalog Produk</h1>

        <div class="row">
            {{-- @foreach ($products as $product) --}}
                <div class="col-md-4">
                    <div class="card">
                        {{-- <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}"> --}}
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            <p class="card-text"></p>
                            <a class="btn btn-primary">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            {{-- @endforeach --}}
        </div>
    </div>
@endsection
