<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'price', 'quantity', 'sku', 'barcode', 'is_featured', 'is_active', 'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
