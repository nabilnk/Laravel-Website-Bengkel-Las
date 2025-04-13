@extends('layouts.app')

@section('title')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>List Product Detail</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">List Product Detail</h2>
            <p class="section-lead">
                Ini adalah halaman admin untuk mengatur prodak.
            </p>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product</th>
                            <th>Product Name</th>
                            <th>Product Image</th>
                            <th>Product Specification</th>
                            <th>Product Dimention</th>
                            <th>Product Materials</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $productdetail)                            
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $productdetail->modelproduct->product->product_name }}</td>
                            <td>{{ $productdetail->modelproduct->product_name }}</td>
                            <td>
                                <img src="{{ asset('storage/images/'.$productdetail->modelproduct->product_image) }}"  width="100">
                            </td>
                            <td>{{ $productdetail->product_specification }}</td>
                            <td>{{ $productdetail->product_dimention }}</td>
                            <td>{{ $productdetail->product_materials }}</td>
                            <td>
                                    <a class="btn btn-warning" href="{{ route('productdetail.edit', $productdetail->id) }}"
                                        role="button">Edit</a>
                                    <a onclick="confirmation(event)" class="btn btn-danger"
                                        href="{{ url('deleteproductdetail', $productdetail->id) }}">
                                        Delete
                                    </a> 
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
@endpush