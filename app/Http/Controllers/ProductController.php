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
    public function show(Product $product)
    {
        $heading = 'Product Details';
        return view('products.show', compact('product', 'heading'));
    }
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'price' => 'required|integer|min:1|max:10000',
            'stock' => 'required|integer|min:0|max:10000',
            'category_id' => 'required|exists:categories,id',
        ]);
        $product->update($validated);
        return redirect()->route('products.index')
            ->with('success', $validated['name'] . ' was updated.');
    }
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
    public function featured()
    {
        $product = Product::where('id', 5)->firstOrFail();
        $heading = 'Featured Product';
        return view('products.show', compact('product', 'heading'));
    }
}
