@extends('layouts.app')

@section('title', 'Update Product')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Update Product</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Update Product</h2>
            <p class="section-lead">
                Ini adalah halaman admin untuk update produk.
            </p>
            <form action="{{ route('tangga.update2', ['id' => $product->id ]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="product_name">Product Name</label>
                    <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter product name" required value="{{ $product->product_name }}">
                </div>
                <div class="form-group">
                    <label for="product_image">Product Image</label>
                    <input type="file" class="form-control" id="product_image" name="product_image">
                    <img src="{{ asset('storage/images/'.$product->product_image) }}" width="100" class="mt-2">
                </div>
                <div class="form-group">
                    <label for="product_description">Product Description</label>
                    <textarea class="form-control" id="product_description" name="product_description" rows="3" required>{{ $product->product_description }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('tangga.index') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </section>
</div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
@endpush