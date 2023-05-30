@extends('layouts.main')

@section('container')
    <div class="container">
        <h1>Detail Orderan</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Product Name</th>
                    <th>Jumlah</th>
                    <th>Total Pembayaran</th>
                    <th>Tanggal Order</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach($order as $value) --}}
                    <tr>
                        <td>1</td>
                        <td>{{$product->name}} </td>
                        <td>{{ $order->qty}}</td>
                        <td>{{ $order->qty  * $product->price  }} </td>
                        <td>{{$order->created_at}}</td>
                {{-- @endforeach --}}
                    </tr>
            </tbody>
        </table>
    </div>
@endsection
