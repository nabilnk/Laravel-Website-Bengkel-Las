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
                        <tr>    
                            <td>{{ $transaksi->order->id_order }}</td>
                            <form action="{{ route('transaksi.update', ['id' => $transaksi->id]) }}" method="POST">
                                @csrf
                                <td>{{ $transaksi->order->jenis_produk }}</td>
                                <td>
                                    <select name="status_pembayaran" class="form-select">
                                        <option value="Belum Ada Pembayaran" {{ $transaksi->status_pembayaran == 'Belum Ada Pembayaran' ? 'selected' : '' }}>Belum Ada Pembayaran</option>
                                        <option value="Belum Lunas" {{ $transaksi->status_pembayaran == 'Belum Lunas' ? 'selected' : '' }}>Belum Lunas</option>
                                        <option value="Lunas" {{ $transaksi->status_pembayaran == 'Lunas' ? 'selected' : '' }}>Lunas</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="informasi_pembayaran" class="form-control" value="{{ old('informasi_pembayaran', $transaksi->informasi_pembayaran) }}"> 
                                </td>
                                <td>
                                    <input type="text" name="harga_akhir" class="form-control" value="{{ old('harga_akhir', $transaksi->harga_akhir) }}"> 
                                </td>
                                <td>{{ $transaksi->metode_pembayaran }}</td>
                                <td>
                                    <select name="validasi" class="form-select">
                                        <option value="Valid" {{ $transaksi->validasi == 'Valid' ? 'selected' : '' }}>Valid</option>
                                        <option value="Tidak Valid" {{ $transaksi->validasi == 'Tidak Valid' ? 'selected' : '' }}>Tidak Valid</option>
                                        <option value="Belum di cek" {{ $transaksi->validasi == 'Belum di cek' ? 'selected' : '' }}>Belum di cek</option>
                                    </select>                                    
                                </td>
                                <td>
                                    <img src="{{ asset('storage/images/' . $transaksi->bukti_pembayaran) }}" alt="Bukti Pembayaran" width="100"></td>
                                <td>
                                    <button type="submit">Submit</button>
                                </td>
                            </form>
                        </tr>
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
