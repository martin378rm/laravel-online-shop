@extends('layouts.app')
@section('container')


<!-- Main Content -->
<div id="content">


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="container">
            <h1>Test</h1>
    
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
        </div>
        {{-- end katalog --}}

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
{{-- <footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
        </div>
    </div>
</footer> --}}
<!-- End of Footer -->

</div>
@endsection

