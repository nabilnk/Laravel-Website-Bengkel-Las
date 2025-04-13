@extends('layouts.app')

@section('title')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>List Model</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">List Model Tangga</h2>
            <p class="section-lead">
                Ini adalah halaman Data Tangga
            </p>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Product Image</th>
                            <th>Product Description</th>
                            <th>Detail</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($TanggaProducts as $product)                            
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->product_name }}</td>
                            <td>
                                <img src="{{ asset('storage/images/'.$product->product_image) }}"  width="100">
                            </td>

                            <td>{{ $product->product_description }}</td>
                            <td><a href="{{ route('productdetail.create' , $product->id )}}">Add Detail</a></td>
                            <td>
                                <a class="btn btn-warning" href="{{ url('updatemodeltangga', $product->id) }}"
                                    role="button">Edit</a>
                                <a onclick="confirmation(event)" class="btn btn-danger"
                                    href="{{ url('deletemodeltangga', $product->id) }}">
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