<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'code' => 'required|unique:products',
            'name' => 'required|unique:products',
            'qty' => 'required|integer'
        ]);

        try {
            Product::create($validator);
            return response()->json(['message' => 'Product created successfully.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create product.'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $productId)
    {
        $validator = $request->validate([
            'code' => 'required|unique:products',
            'name' => 'required|unique:products',
            'qty' => 'required|integer'
        ]);

        try {
            $product = Product::find($productId);

            $product->code = $validator['code'];
            $product->name = $validator['name'];
            $product->qty = $validator['qty'];

            $product->save();
            return response()->json(['message' => 'Product updated successfully.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update product.'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $productId)
    {
        try {
            $product = Product::find($productId);
            $product->delete();
            return response()->json(['message' => 'Product deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete product.'], 500);
        }
    }
}
