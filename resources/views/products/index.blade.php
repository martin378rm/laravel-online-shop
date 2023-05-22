@extends('layouts.main')

@section('container')
<div class="container">
  <h1>Daftar Produk</h1>

  <a href="{{ route('products.create') }}"  class="btn btn-primary">Tambah Produk </a>

  <table class="table">
      <thead>
          <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Jumlah</th>
              <th>Harga</th>
              <th>Aksi</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($products as $product)
          <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->qty}}</td>
            <td>{{$product->price}}</td>
            <td>
                <a href="{{ url('products/'. $product->id . '/edit') }}" class="btn btn-sm btn-primary">Edit</a>
                <form method="POST" style="display: inline" action="{{ route('products.destroy',$product->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</button>
                </form>
            </td>
        </tr>

          @endforeach
              
      </tbody>
  </table>
</div>
@endsection


{{-- href="{{ route('edit', $product->id) }}" --}}
{{-- action="{{ route('destroy', $product->id) }}"  --}}