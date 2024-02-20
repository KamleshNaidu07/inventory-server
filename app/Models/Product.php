<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'quantity', 'price', 'category_id', 'supplier_id', 'image_url',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function getPriceFormattedAttribute()
    {
        return number_format($this->price, 2);
    }

    public function scopeInStock($query)
    {
        return $query->where('quantity', '>', 0);
    }
}
