@extends('layouts.main')

@section('container')
    <div class="container">
        <h1>Katalog Produk</h1>

        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            <p class="card-text">Nama: {{$product->name}} </p>
                            <p class="card-text">Harga: {{$product->price}} </p>
                            <p class="card-text">Jumlah Tersedia:  {{$product->qty}} </p>
                            <a href="{{ url('catalogs/'. $product->id . '/edit') }}" class="btn btn-sm btn-primary">Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection