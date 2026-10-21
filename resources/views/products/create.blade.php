@extends('layouts.app')
@section('title', 'Add Product')
@section('content')
    <h2>Add Product</h2>
    <form method="POST" action="{{ route('products.store') }}" style="max-
width: 500px;">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}"
                class="form-control @error('name') is-invalid @enderror">
            @error('name')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" id="price" name="price" value="{{ old('price') }}" Method and URL Route name Goes
                to POST /products products.store store() , saves it LA7 Let Them Add Something: Easy Step-by-Step Guide Page
                11 of 25 class="form-control @error('price') is-invalid @enderror">
            @error('price')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" id="stock" name="stock" value="{{ old('stock') }}"
                class="form-control @error('stock') is-invalid @enderror">
            @error('stock')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select id="category" name="category" class="form-select
@error('category') is-invalid @enderror">
                <option value="">Choose a category</option>
                @foreach (['Drinks', 'Pantry', 'Canned', 'Bakery'] as $option)
                    <option value="{{ $option }}" @selected(old('category') === $option)>{{ $option }}</option>
                @endforeach
            </select>
            @error('category')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Save Product</button>
        <a class="btn btn-secondary" href="{{ route('products.index') }}">Cancel</a>
    </form>
@endsection
