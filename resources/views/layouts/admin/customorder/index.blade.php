@extends('layouts.app')

@section('title')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>List Order</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">List Order</h2>
            <p class="section-lead">
                Ini adalah halaman admin untuk mengelola Orderan user
            </p>
            <div class="table-responsive">
                <table class="table table-striped"  style="width: 100rem">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID Order</th>
                            <th>User ID</th>
                            <th>Jenis Produk</th>
                            <th>Model Produk</th>
                            <th>Spesifikasi Produk</th>
                            <th>Dimensi Produk</th>
                            <th>Bahan Produk</th>
                            <th>Gambar Sampel Produk</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)                            
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <form action="{{ route('update.progress' ,['id' => $order->id]) }}" method="POST">
                                @csrf
                            <td>
                                <input type="text" name="id_order" class="form-control" value="{{ old('id_order', $order->id_order) }}"> 
                            </td>
                            <td>{{ $order->user_id }}</td>
                            <td>{{ $order->jenis_produk }}</td>
                            <td>{{ $order->model_produk }}</td>
                            <td>{{ $order->spesifikasi_produk }}</td>
                            <td>{{ $order->dimensi_produk }}</td>
                            <td>{{ $order->bahan_produk }}</td>
                            <td><img src="{{ asset('storage/images/' . $order->gambarsampel_produk) }}" alt="Gambar Sampel" width="100"></td>
                            <td>
                                <select name="status" class="form-select">
                                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="Diterima oleh Admin" {{ $order->status == 'Diterima oleh Admin' ? 'selected' : '' }}>Diterima oleh Admin</option>
                                    <option value="Sedang diproses" {{ $order->status == 'Sedang diproses' ? 'selected' : '' }}>Sedang diproses</option>
                                    <option value="Siap diantar" {{ $order->status == 'Siap diantar' ? 'selected' : '' }}>Siap diantar</option>
                                    <option value="Diterima oleh Customer" {{ $order->status == 'Diterima oleh Customer' ? 'selected' : '' }}>Diterima oleh Customer</option>
                                </select>
                            </td>
                            <td>
                                <button type="submit">Submit</button>
                            </td>
                            </form>
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
