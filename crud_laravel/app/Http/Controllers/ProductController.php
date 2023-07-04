<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('index', compact('products'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(StoreProductRequest $request)
    {
        Product::create($request->validated());
        return redirect(route('product.index'))->withSuccess('Berhasil tambah');
    }

    public function show(Product $product)
    {
        return view('show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view("edit", compact('product'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->validated());
        return redirect(route('product.index'))->withSuccess('Berhasil edit');
    }
    
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect(route('product.index'))->withSuccess('Berhasil hapus');
    }
}
