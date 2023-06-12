@extends('layouts.app')
@section('container')

<div class="container">
  <h1>Detail View</h1>
 

    <a class="btn btn-primary" href="{{ url('orders/'. $order->id . '/edit') }}">Update</a>
    <form method="POST" style="display: inline" action="{{ route('orders.destroy',$order->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</button>
    </form>


<table class="table table-striped">
    <tr>
        <th>Customer Number</th>
        <td>{{$user->id}}</td>
    </tr>
    <tr>
        <th>Product Name</th>
        <td>{{$product->name}}</td>
    </tr>
    <tr>
        <th>Price</th>
        <td>{{$product->price}}</td>
    </tr>
    <tr>
        <th>Customer Name</th>
        <td>{{$user->name}}</td>
    </tr>
    <tr>
        <th>Phone</th>
        <td>{{$phone}}</td>
    </tr>
    <tr>
        <th>Quantity Order</th>
        <td>{{$order->qty}}</td>
    </tr>
    
</table>

<input class="btn btn-info" type="button" name="kembali" value="Back" onclick="self.history.back()">

@endsection