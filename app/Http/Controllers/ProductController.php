<?php
namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
class ProductController extends Controller
{
 public function index()
 {
 $products = Product::all();
 return view('products.index', compact('products'));
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