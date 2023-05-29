<!-- resources/views/order/dashboard.blade.php -->

@extends('layouts.main')

@section('container')
    <div class="container">
        <h1>Dashboard Orderan</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Product ID</th>
                    <th>Jumlah</th>
                    {{-- <th>Total Pembayaran</th> --}}
                    <th>Tanggal Order</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $key => $order)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{$order->product_id}}</td>
                        <td>{{ $order->qty }}</td>
                        {{-- <td>{{ $order->qty * $products->price }} </td> --}}
                        <td>{{ $order->created_at }}</td>
                        <td><a href="{{url('order/'.$order->product_id .'/detail')}}" class="btn btn-info">Detail</a>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
