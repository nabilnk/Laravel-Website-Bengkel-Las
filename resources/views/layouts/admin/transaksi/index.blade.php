@extends('layouts.app')

@section('title')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>List Pembayaran</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">List Pembayaran</h2>
            <p class="section-lead">
                Ini adalah halaman admin untuk memvalidasi pembayaran user
            </p>
            <div class="table-responsive">
                <table class="table table-striped" style="width: 100rem">
                    <thead>
                        <tr>
                            <th>ID Order</th>
                            <th>Jenis Produk</th>
                            <th>Status</th>
                            <th>Informasi Pembayaran</th>
                            <th>Harga Akhir</th>
                            <th>Metode Pembayaran</th>
                            <th>Validasi</th>
                            <th>Bukti Pembayaran</th>
                            <th>Aksi</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksis as $transaksi)
                        <tr>
                            <td>{{ $transaksi->order->id_order }}</td>
                            <td>{{ $transaksi->order->jenis_produk }}</td>
                            <td>{{ $transaksi->status_pembayaran }}</td>
                            <td>{{ $transaksi->informasi_pembayaran }}</td>
                            <td>{{ $transaksi->harga_akhir }}</td>
                            <td>{{ $transaksi->metode_pembayaran }}</td>
                            <td>
                                {{ $transaksi->validasi }}                                 
                            </td>
                            <td>
                                <img src="{{ asset('storage/images/' . $transaksi->bukti_pembayaran) }}" alt="Bukti Pembayaran" width="100"></td>
                            <td>
                                <a href="{{ route('transaksi.edit', ['id' => $transaksi->id ]) }}">Update</a>
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
