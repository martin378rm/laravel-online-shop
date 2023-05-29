@extends('layouts.main')

@section('container')
    <div class="container">
        <h1>Detail Produk</h1>
        <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            <p class="card-text">Nama: {{$product->name}} </p>
                            <p class="card-text">Harga: {{$product->price}} </p>
                            <p class="card-text">Jumlah Tersedia: {{$product->qty}}  </p>
                            <a href="/order/create" class="btn btn-primary" >Order</a>
                        </div>
                    </div>
                </div>  
        </div>
    </div>
@endsection