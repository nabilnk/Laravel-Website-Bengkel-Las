<?php

namespace App\Http\Controllers;

use App\Models\ModelProduct;
use Illuminate\Http\Request;
use App\Models\ProductDetail;

class ProductDetailController extends Controller
{
    public function index()
    {
        $product = ProductDetail::all();
        return view ('layouts.admin.productdetail.index', compact('product'));
    }
    public function store(Request $request)
    {
        $product = new ProductDetail;
        $product->modelproduct_id = $request->modelproduct_id;
        $product->product_specification = $request->product_specification;
        $product->product_dimention = $request->product_dimention;
        $product->product_materials = $request->product_materials;
        $product->save();

        // jika data berhasil disimpan, akan kembali ke halaman utama
        return redirect()->route('productdetail.index')->with('success', 'Product created successfully.');
    }

    public function create($id)
    {
        $product = ModelProduct::findOrFail($id);
        return view ('layouts.admin.productdetail.create', compact('product'));
    }

    public function pdetail($productId, $modelId){
        $product = ProductDetail::where('modelproduct_id', $productId)->where('id', $modelId)->first();
        return view('layouts.frontend.home.productdetail', compact('product'));
    }

    public function edit($id)
    {
        $product = ProductDetail::find($id);
        return view('layouts.admin.productdetail.update', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = ProductDetail::findOrFail($id);
        $request->validate([
            'product_specification' => 'required',
            'product_dimention' => 'required',
            'product_materials' => 'required',
        ]);

        $product->product_specification = $request->product_specification;
        $product->product_dimention = $request->product_dimention;
        $product->product_materials = $request->product_materials;
        $product->save();

        return redirect()->route('productdetail.index')->with('success', 'Product detail updated successfully.');
    }

    public function delete($id)
    {
        $product = ProductDetail::find($id);
        $product->delete();
        return redirect()->back()->with('success', 'Product detail deleted successfully.');
    }
}

