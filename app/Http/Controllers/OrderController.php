<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::all();
        return view('layouts.admin.customorder.index', compact('orders'));
    }

    public function create(){
        return view('layouts.frontend.home.service', [
            'active' => 'Service'
        ]);
    }

   public function store(Request $request)
    {
        // validasi data
        $request->validate([
            'user_id' => 'required',
            'jenis_produk' => 'required',
            'model_produk' => 'required',
            'spesifikasi_produk' => 'required',
            'dimensi_produk' => 'required',
            'bahan_produk' => 'required',
            'gambarsampel_produk' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        // menyimpan gambar ke folder public/images
        $imageName = $request->file('gambarsampel_produk');
        $imageName->storeAs('/images', $imageName->hashName());
        
        // menyimpan data ke database
        $order = Order::create([
            'user_id' => $request->user_id,
            'jenis_produk' => $request->jenis_produk,
            'model_produk' => $request->model_produk,
            'spesifikasi_produk' => $request->spesifikasi_produk,
            'dimensi_produk' => $request->dimensi_produk,
            'bahan_produk' => $request->bahan_produk,
            'gambarsampel_produk' => $imageName->hashName(),
        ]);
        
        Transaksi::create([
            'id_order' => $order->id,
            'user_id' => Auth::user()->id,
        ]);

        // jika data berhasil disimpan, akan kembali ke halaman utama
        return redirect()->route('customorder.create')->with('success', 'Order created successfully.');
    }

    public function order(){
        $orders = Order::all();
        return view('layouts.admin.customorder.index', compact('orders'));
    }

    public function show(){
        $user = Auth::user()->id;
        $orders_list = Order::where('user_id', $user)->get();
        return view('layouts.frontend.home.your-order', compact('orders_list'));
    }  
    public function updateProgress(Request $request, $id){
        $order = Order::find($id);
        $order->update([
            'id_order' => $request->id_order,
            'status' => $request->status,
        ]);
        return redirect()->route('customorder.index');
    }
} 
