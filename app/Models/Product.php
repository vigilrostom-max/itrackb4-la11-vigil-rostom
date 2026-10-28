<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
 protected $fillable = ['name', 'price', 'stock', 'category', 'is_available', 'brand'];
 protected function casts(): array
 {
 return [
 'is_available' => 'boolean', // your boolean column
 'price' => 'integer', // your integer column
 'stock' => 'integer', // your integer column
 ];
 }
}
