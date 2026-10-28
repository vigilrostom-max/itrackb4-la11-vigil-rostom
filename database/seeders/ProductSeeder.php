<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $drinks = Category::create(['name' => 'Drinks']);
        $pantry = Category::create(['name' => 'Pantry']);
        $canned = Category::create(['name' => 'Canned']);
        $bakery = Category::create(['name' => 'Bakery']);
        Product::create([
            'name' => 'Coke Mismo 290ml',
            'price' => 20,
            'stock' => 48,
            'category_id' => $drinks->id,
            'is_available' => true,
            'brand' => 'Coca-Cola',
        ]);
        Product::create([
            'name' => 'Pancit Canton Original',
            'price' => 16,
            'stock' => 150,
            'category_id' => $pantry->id,
            'is_available' => true,
            'brand' => 'Lucky Me',
        ]);
        Product::create([
            'name' => 'Century Tuna Flakes 155g',
            'price' => 38,
            'stock' => 60,
            'category_id' => $canned->id,
            'is_available' => true,
            'brand' => 'Century',
        ]);
        Product::create([
            'name' => 'Ensaymada',
            'price' => 25,
            'stock' => 0,
            'category_id' => $bakery->id,
            'is_available' => false,
            'brand' => null,
        ]);
        Product::create([
            'name' => 'Kopiko Brown Coffee Twin Pack',
            'price' => 14,
            'stock' => 200,
            'category_id' => $drinks->id,
            'is_available' => true,
            'brand' => 'Kopiko',
        ]);
        Product::create([
            'name' => 'Fresh Egg (per piece)',
            'price' => 9,
            'stock' => 90,
            'category_id' => $pantry->id,
            'is_available' => true,
            'brand' => null,
        ]);
        Product::create([
            'name' => 'Argentina Corned Beef 150g',
            'price' => 42,
            'stock' => 0,
            'category_id' => $canned->id,
            'is_available' => false,
            'brand' => 'Argentina',
        ]);
        Product::create([
            'name' => 'Spanish Bread (pack of 5)',
            'price' => 30,
            'stock' => 25,
            'category_id' => $bakery->id,
            'is_available' => true,
            'brand' => null,
        ]);
    }
}
