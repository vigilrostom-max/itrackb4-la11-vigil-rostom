<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'stock', 'category_id', 'is_available', 'brand'];
    protected function casts(): array
    {
        return [
            'is_available' => 'boolean',
            'price' => 'integer',
            'stock' => 'integer',
        ];
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
