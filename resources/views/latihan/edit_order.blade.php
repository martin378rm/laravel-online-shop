@extends('layouts.app')
@section('container')
  <div class="container">

    <h1>Edit Order</h1><br>
    <form action="{{ route('orders.update', $order->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="qty">Jumlah</label>
        <input type="number" name="qty" id="qty" class="form-control" min="1" required>
      </div>
      <button type="submit" class="btn btn-primary mt-4">Simpan</button>
    </form>
  </div>
@endsection