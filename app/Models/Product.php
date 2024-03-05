<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     description="Product model",
 *     title="Product",
 *     @OA\Property(
 *         property="id",
 *         description="ID of the product",
 *         type="integer",
 *         example=1,
 *     ),
 *     @OA\Property(
 *         property="name",
 *         description="Name of the product",
 *         type="string",
 *         example="Example Product",
 *     ),
 *     @OA\Property(
 *         property="description",
 *         description="Description of the product",
 *         type="string",
 *         example="Example product description.",
 *     ),
 *     @OA\Property(
 *         property="quantity",
 *         description="Quantity of the product",
 *         type="integer",
 *         example=10,
 *     ),
 *     @OA\Property(
 *         property="price",
 *         description="Price of the product",
 *         type="number",
 *         format="float",
 *         example=19.99,
 *     ),
 *     @OA\Property(
 *         property="category_id",
 *         description="ID of the associated category",
 *         type="integer",
 *         example=1,
 *     ),
 *     @OA\Property(
 *         property="supplier_id",
 *         description="ID of the associated supplier",
 *         type="integer",
 *         example=1,
 *     ),
 *     @OA\Property(
 *         property="image_url",
 *         description="URL of the product's image",
 *         type="string",
 *         example="https://example.com/product_image.jpg",
 *     ),
 *     @OA\Property(
 *         property="price_formatted",
 *         description="Formatted price of the product with two decimal places",
 *         type="string",
 *         readOnly=true,
 *         example="19.99",
 *     ),
 * )
 */
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
