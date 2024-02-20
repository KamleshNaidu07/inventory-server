<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'contact_name', 'email', 'phone_number', 'address', 'website', 'payment_terms',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function getWebsiteLinkAttribute()
    {
        return $this->website ? "<a href='{$this->website}' target='_blank'>{$this->website}</a>" : '';
    }
}
