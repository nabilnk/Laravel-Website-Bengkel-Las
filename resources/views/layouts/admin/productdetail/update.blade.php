@extends('layouts.app')

@section('title', 'Product')

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
                Ini adalah halaman admin untuk update prodak detail.
            </p>
            <form action="{{ route('productdetail.update', ['id' => $product->id ]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="product_name">Model Produk</label>
                    <input type="text" class="form-control" id="modelproduk_id" name="modelproduk_id" required value="{{ $product->modelproduct_id }}">
                </div>
                <div class="form-group">
                    <label for="product_description">Product Specification</label>
                    <textarea class="form-control" id="product_specification" name="product_specification" rows="3" required>{{ $product->product_specification }}</textarea>
                </div>
                <div class="form-group">
                    <label for="product_name">Product Dimention</label>
                    <input type="text" class="form-control" id="product_dimention" name="product_dimention" placeholder="Enter product dimention" required value="{{ $product->product_dimention }}">
                </div>
                <div class="form-group">
                    <label for="product_name">Product Material</label>
                    <input type="text" class="form-control" id="product_material" name="product_materials" placeholder="Enter product materials" required value="{{ $product->product_materials }}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('productdetail.index') }}" class="btn btn-primary">Back</a>
            </form>
        </div>
    </section>
</div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
@endpush