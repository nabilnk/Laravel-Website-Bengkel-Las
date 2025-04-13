<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // membuat function crud
    public function index()
    {
        // mengambil data dari database
        $products = Product::all();
        // dd($products);
        // mengirim data ke view
        return view('layouts.admin.product.index', compact('products'));
    }

    public function create()
    {
        return view('layouts.admin.product.create');
    }

    
    public function store(Request $request)
    {
        // validasi data
        $request->validate([
            'product_name' => 'required',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'product_description' => 'required',
        ]);

        // menyimpan gambar ke folder public/images
        $imageName = $request->file('product_image');
        $imageName->storeAs('/images', $imageName->hashName());

        // menyimpan data ke database
        Product::create([
            'product_name' => $request->product_name,
            'product_image' => $imageName->hashName(),
            'product_description' => $request->product_description,
        ]);

        // jika data berhasil disimpan, akan kembali ke halaman utama
        return redirect()->route('product.index')->with('success', 'Product created successfully.'); 
    }

    public function edit($id)
    {
        $product = Product::findorFail($id);
        return view('layouts.admin.product.update', compact('product'));
    }

    public function update2(Request $request, $id){
        $product = Product::findOrFail($id);
        $request->validate([
            'product_name' => 'required',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'product_description' => 'required',
        ]);


        // menyimpan gambar ke folder public/images
        $imageName = $request->file('product_image');
        $imageName->storeAs('/images', $imageName->hashName());
        if ($request->hasFile('product_image')) {
            $imageName = $request->file('product_image');
            $imageName->storeAs('public/images', $imageName->hashName());
            if ($product->product_image && Storage::exists('public/images/' . $product->product_image)) {
                Storage::delete('public/images/' . $product->product_image);
            }
            $product->product_image = $imageName->hashName();
        }
        $product->product_name = $request->product_name;
        $product->product_description = $request->product_description;
        $product->save();
        return redirect()->route('product.index')->with('success', 'Product updated successfully.');    
    }
    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back();
    }
}


