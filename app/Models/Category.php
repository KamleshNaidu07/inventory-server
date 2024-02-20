<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'parent_id',
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function getFormattedNameAttribute()
    {
        return str_repeat('- ', $this->depth()) . $this->name;
    }

    public function scopeRootCategories($query)
    {
        return $query->whereNull('parent_id');
    }
}
