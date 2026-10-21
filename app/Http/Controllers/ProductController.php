<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    private function getProducts()
    {
        $json = file_get_contents(storage_path('products.json'));
        return json_decode($json, true);
    }
    private function saveProducts(array $products)
    {
        file_put_contents(
            storage_path('products.json'),
            json_encode($products, JSON_PRETTY_PRINT)
        );
    }
    public function index(Request $request)
    {
        $category = $request->query('category', 'all');
        $price = $request->query('price', 'all');
        $products = $this->getProducts();
        $matches = [];
        foreach ($products as $id => $product) {
            $priceLevel = $product['price'] >= 40 ? 'expensive' :
                'affordable';
            $categoryOk = $category === 'all' ||
                strtolower($product['category']) === strtolower($category);
            $priceOk = $price === 'all' || $priceLevel ===
                strtolower($price);
            if ($categoryOk && $priceOk) {
                $matches[$id] = $product;
            }
        }
        return view('products.index', [
            'products' => $matches,
            'category' => $category,
            'price' => $price,
        ]);
    }
    public function create()
    {
        return view('products.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'price' => 'required|integer|min:1|max:10000',
            'stock' => 'required|integer|min:0|max:10000',
            'category' => 'required|in:Drinks,Pantry,Canned,Bakery',
        ]);
        $products = $this->getProducts();
        $newId = max(array_keys($products)) + 1;
        $products[$newId] = [
            'id' => $newId,
            'name' => $validated['name'],
            'price' => (int) $validated['price'],
            'stock' => (int) $validated['stock'],
            'category' => $validated['category'],
        ];
        $this->saveProducts($products);
        return redirect()->route('products.index')
            ->with('success', $validated['name'] . ' was added.');
    }
    public function show(string $id)
    {
        $products = $this->getProducts();
        if (!isset($products[$id])) {
            abort(404);
        }
        return view('products.show', [
            'product' => $products[$id],
            'heading' => 'Product Details',
        ]);
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
        $products = $this->getProducts();
        return view('products.show', [
            'product' => $products[5],
            'heading' => 'Featured Product',
        ]);
    }
}
