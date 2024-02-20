<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number', 'customer_id', 'supplier_id', 'order_date', 'delivery_date', 'status', 'total_amount',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getStatusFormattedAttribute()
    {
        switch ($this->status) {
            case 'pending': return 'Pending';
            case 'shipped': return 'Shipped';
            case 'completed': return 'Completed';
            default: return $this->status;
        }
    }
}
