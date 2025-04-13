<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function index(){
        $transaksis = Transaksi::with('order')->get();
        return view('layouts.admin.transaksi.index', compact('transaksis'));
    }

    public function create(){
        $orders = Order::with('transaksi')->where('user_id', Auth::user()->id)->get();
        $transaksi = Transaksi::whereHas('order', function($query) {
            $query->where('user_id', Auth::user()->id);
        })->first();
        return view('layouts.frontend.home.transaksi', compact('orders', 'transaksi'));
    }

    public function store(Request $request){
        // Validasi data
        $request->validate([
        'status_pembayaran' => 'required',
        'informasi_pembayaran' => 'required',
        'metode_pembayaran' => 'required',
        'langkah_pembayaran' => 'required',
        'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        'validasi' => 'required',
        ]);

        // menyimpan gambar ke folder public/images
        $imageName = $request->file('bukti_pembayaran');
        $imageName->storeAs('/images', $imageName->hashName());

        // menyimpan data ke database
        Transaksi::create([
        'status_pembayaran' => $request->status_pembayaran,
        'informasi_pembayaran' => $request->informasi_pembayaran,
        'metode_pembayaran' => $request->metode_pembayaran,
        'langkah_pembayaran' =>  $request->langkah_pembayaran,
        'bukti_pembayaran' => $imageName->hashname(),
        'validasi' => $request->validasi,
        ]);

        // Jika data berhasil disimpan, akan kembali ke halaman utama
        return redirect()->route('transaksi.create')->with('success', 'Transaksi created successfully.');
    }
    public function show($id)
    {
        $transaksi = Transaksi::find($id);
        return view ('layouts.admin.transaksi.show', compact('transaksi'));
    }
    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::find($id);
        // $request->validate([
        //     'status_pembayaran' => 'nullable|in:Belum Ada Pembayaran,Belum Lunas,Lunas', 
        //     'bukti_pembayaran' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        //     'validasi' => 'nullable|in:Belum Divalidasi,Divalidasi',
        // ]);
        $transaksi->update([
            'informasi_pembayaran' => $request->informasi_pembayaran,
            'harga_akhir' => $request->harga_akhir,
            'status_pembayaran' => $request->status_pembayaran,
            'validasi' => $request->validasi,
            'metode_pembayaran' => $request->metode_pembayaran,
        ]);
        Log::info('Request data:', $request->all());
        return redirect()->route('transaksi.index')->with('success', 'Transaksi updated successfully');
    }
    public function update2(Request $request, $id)
    {
        $transaksi = Transaksi::find($id);
        $request->validate([
            'status_pembayaran' => 'required|in:Belum Ada Pembayaran,Belum Lunas,Lunas', 
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $imageName = $request->file('bukti_pembayaran');
        $imageName->storeAs('/images', $imageName->hashName());
        $transaksi->update([
            'informasi_pembayaran' => $request->informasi_pembayaran,
            'harga_akhir' => $request->harga_akhir,
            'status_pembayaran' => $request->status_pembayaran,
            'validasi' => $request->validasi,
            'metode_pembayaran' => $request->metode_pembayaran,
            'bukti_pembayaran' => $imageName->hashname(),
        ]);
        return redirect()->route('transaksi.index.user')->with('success', 'Transaksi updated successfully');
    }
}
