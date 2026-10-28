<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categoryId = $request->query('category_id');
        $query = Product::with('category');
        if ($categoryId) {
            $query = $query->where('category_id', $categoryId);
        }
        $products = $query->get();
        return view('products.index', compact('products'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'price' => 'required|integer|min:1|max:10000',
            'stock' => 'required|integer|min:0|max:10000',
            'category_id' => 'required|exists:categories,id',
        ]);
        Product::create($validated);
        return redirect()->route('products.index')
            ->with('success', $validated['name'] . ' was added.');
    }
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $heading = 'Product Details';
        return view('products.show', compact('product', 'heading'));
    }
    public function edit(string $id)
    {
        //
    }
    public function update(Request $request, string $id)
    {
        //
    }
    public function destroy(string $id)
    {
        //
    }
    public function featured()
    {
        $product = Product::findOrFail(5);
        $heading = 'Featured Product';
        return view('products.show', compact('product', 'heading'));
    }
}
