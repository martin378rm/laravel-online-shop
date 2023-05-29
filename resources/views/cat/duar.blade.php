<!-- resources/views/order/create.blade.php -->

@extends('layouts.main')

@section('container')
    <div class="container">
        <h1>Buat Order</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text">Harga : </p>

                <form  method="POST">
                    @csrf
                    <input type="hidden" name="product_id" >
                    <div class="form-group">
                        <label for="qty">Jumlah</label> <br>
                        <input type="number" name="qty" id="qty" class="form-control mb-2" min="1" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Buat Order</button>
                </form>
            </div>
        </div>
    </div>
@endsection
