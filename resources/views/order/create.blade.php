<!-- resources/views/order.blade.php -->

@extends('layouts.main')

@section('container')
    <div class="container">
        <h1>Buat Order</h1>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('order.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="product">Produk</label>
                        <select name="product_id" id="product" class="form-control" required>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="qty">Jumlah</label>
                        <input type="number" name="qty" id="qty" class="form-control" min="1" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Buat Order</button>
                </form>
            </div>
        </div>
    </div>
        @if (Session::has('message'))
            <script>
                swal("Message", "{{Session::get('message')}}", 'warning',{
                    button:true,
                    button:'OK',
                    dangerMode:true
                })
            </script>
        @endif
@endsection


