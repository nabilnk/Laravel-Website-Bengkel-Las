<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ModelProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ModelProductController extends Controller
{
    public function index($id)
    {
        $product = Product::findOrFail($id);
        return view ('layouts.admin.product.addproduct', compact('product'));
    }
    public function store(Request $request)
    {
        $product = new ModelProduct;
        $product->product_id = $request->product_id;
        $product->product_name = $request->product_name;
         // menyimpan gambar ke folder public/images
        $imageName = $request->file('product_image');
        $imageName->storeAs('/images', $imageName->hashName());
        $product->product_image = $imageName->hashName();
        $product->product_description = $request->product_description;
        $product->save();

        // jika data berhasil disimpan, akan kembali ke halaman utama
        return redirect()->route('product.index')->with('success', 'Product created successfully.');
    }

   
    public function showTangga()
    {
        $tanggaProductIds = Product::where('product_name', 'Tangga')->pluck('id');
        $TanggaProducts = ModelProduct::whereIn('product_id', $tanggaProductIds)->get();
        return view('layouts.admin.tangga.index', compact('TanggaProducts'));
    }
    
    
    public function showPagar()
    {
        $pagarProductId = Product::where('product_name', 'Pagar')->pluck('id');
        $PagarProducts = ModelProduct::whereIn('product_id', $pagarProductId)->get();
        return view('layouts.admin.pagar.index', compact('PagarProducts'));
    }

    public function showKanopi()
    {
        $kanopiProductId = Product::where('product_name', 'Kanopi')->pluck('id');
        $KanopiProducts = ModelProduct::whereIn('product_id', $kanopiProductId)->get();
        return view('layouts.admin.kanopi.index', compact('KanopiProducts'));
    }

    public function editpagar($id)
    {
        $product = ModelProduct::findOrFail($id);
        return view('layouts.admin.pagar.update', compact('product'));
    }

    public function editkanopi($id)
    {
        $product = ModelProduct::findOrFail($id);
        return view('layouts.admin.kanopi.update', compact('product'));
    }

    public function edittangga($id)
    {
        $product = ModelProduct::findOrFail($id);
        return view('layouts.admin.tangga.update', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = ModelProduct::findOrFail($id);
        $request->validate([
            'product_name' => 'required',
            'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'product_description' => 'required',
        ]);

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

        return redirect()->route('pagar.index')->with('success', 'Product updated successfully.');
    }

    public function update2(Request $request, $id)
    {
        $product = ModelProduct::findOrFail($id);
        $request->validate([
            'product_name' => 'required',
            'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'product_description' => 'required',
        ]);

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

        return redirect()->route('tangga.index')->with('success', 'Product updated successfully.');
    }

    public function update3(Request $request, $id)
    {
        $product = ModelProduct::findOrFail($id);
        $request->validate([
            'product_name' => 'required',
            'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'product_description' => 'required',
        ]);

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

        return redirect()->route('kanopi.index')->with('success', 'Product updated successfully.');
    }

    public function delete($id)
    {
        $product = ModelProduct::findOrFail($id);
        if ($product->product_image && Storage::exists('public/images/' . $product->product_image)) {
            Storage::delete('public/images/' . $product->product_image);
        }
        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully.');
    }

    public function delete2($id)
    {
        $product = ModelProduct::findOrFail($id);
        if ($product->product_image && Storage::exists('public/images/' . $product->product_image)) {
            Storage::delete('public/images/' . $product->product_image);
        }
        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully.');
    }

    public function delete3($id)
    {
        $product = ModelProduct::findOrFail($id);
        if ($product->product_image && Storage::exists('public/images/' . $product->product_image)) {
            Storage::delete('public/images/' . $product->product_image);
        }
        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully.');
    }
    
    
}
