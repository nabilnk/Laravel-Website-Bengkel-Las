@extends('layouts.app')

@section('title')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>List Product</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">List Product</h2>
            <p class="section-lead">
                Ini adalah halaman admin untuk mengatur prodak.
            </p>
            <a href="{{ route('product.create') }}" class="btn btn-primary">Create Product</a>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Product Image</th>
                            <th>Product Description</th>
                            <th>Add Product</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)                            
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->product_name }}</td>
                            <td>
                                <img src="{{ asset('storage/images/'.$product->product_image) }}"  width="100">
                            </td>
                            <td>{{ $product->product_description }}</td>
                            <td><a href="{{ route('modelproduct.index' , $product->id )}}">Add Model</a></td>
                            <td>
                                <a class="btn btn-warning" href="{{ route('product.edit', $product->id) }}"
                                    role="button">Edit</a>
                                <a onclick="confirmation(event)" class="btn btn-danger"
                                    href="{{ route('product.delete', $product->id) }}">
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