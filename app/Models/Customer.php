<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone_number', 'address', 'website', 'company_name',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function getWebsiteLinkAttribute()
    {
        return $this->website ? "<a href='{$this->website}' target='_blank'>{$this->website}</a>" : '';
    }
}
