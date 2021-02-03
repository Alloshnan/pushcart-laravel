<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        return Product::with('catalog')->get()->toArray();
    }

    public function store(Request $request)
    {
        $product = new Product([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'catalog_id' => $request->input('catalog_id'),
        ]);
        $product->save();

        return response()->json('Product created!');

    }

    public function show(Product $product)
    {
        return response()->json($product);
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->all());

        return response()->json('Product updated!');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json('Product deleted!');
    }
}
