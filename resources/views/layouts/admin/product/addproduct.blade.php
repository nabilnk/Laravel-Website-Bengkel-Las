@extends('layouts.app')

@section('title', 'Product')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Create Model</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Create Model</h2>
            <p class="section-lead">
                Ini adalah halaman admin untuk menambah Model prodak.
            </p>
            <form action="{{ route('modelproduct.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="product_id">Product ID</label>
                    <input type="text" class="form-control" id="product_id" name="product_id" value="{{ old('product_id', $product->id ?? '') }}" required readonly>
                </div>
                <div class="form-group">
                    <label for="product_name">Model Name</label>
                    <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter Model Name" required>
                </div>
                <div class="form-group">
                    <label for="product_image">Product Image</label>
                    <input type="file" class="form-control" id="product_image" name="product_image" required>
                </div>
                <div class="form-group">
                    <label for="product_description">Product Description</label>
                    <textarea class="form-control" id="product_description" name="product_description" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('product.index') }}" class="btn btn-primary">Back</a>
            </form>
        </div>
    </section>
</div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
@endpush