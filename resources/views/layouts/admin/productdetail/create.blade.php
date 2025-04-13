@extends('layouts.app')

@section('title', 'Product')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Create Product Detail</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Create Product Detail</h2>
            <p class="section-lead">
                Ini adalah halaman admin untuk menambah prodak detail.
            </p>
            <form action="{{ route('productdetail.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="product_description">Model Produk</label>
                    <input class="form-control" id="modelproduct_id" name="modelproduct_id" rows="3" value="{{ $product->id }}" required></input>
                </div>
                <div class="form-group">
                    <label for="product_description">Product Specification</label>
                    <textarea class="form-control" id="product_description" name="product_specification" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="product_description">Product Dimention</label>
                    <textarea class="form-control" id="product_dimention" name="product_dimention" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="product_description">Product Materials</label>
                    <textarea class="form-control" id="product_materials" name="product_materials" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary" >Submit</button>
                <a href="{{ route('productdetail.index') }}" class="btn btn-primary">Back</a>
            </form>
        </div>
    </section>
</div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
@endpush