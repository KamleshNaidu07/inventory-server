<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     description="Supplier model",
 *     title="Supplier",
 *     @OA\Property(
 *         property="id",
 *         description="ID of the supplier",
 *         type="integer",
 *         example=1,
 *     ),
 *     @OA\Property(
 *         property="name",
 *         description="Name of the supplier",
 *         type="string",
 *         example="Example Supplier",
 *     ),
 *     @OA\Property(
 *         property="contact_name",
 *         description="Contact name of the supplier",
 *         type="string",
 *         example="John Doe",
 *     ),
 *     @OA\Property(
 *         property="email",
 *         description="Email address of the supplier",
 *         type="string",
 *         example="john.doe@example.com",
 *     ),
 *     @OA\Property(
 *         property="phone_number",
 *         description="Phone number of the supplier",
 *         type="string",
 *         example="123-456-7890",
 *     ),
 *     @OA\Property(
 *         property="address",
 *         description="Address of the supplier",
 *         type="string",
 *         example="123 Main St, City, Country",
 *     ),
 *     @OA\Property(
 *         property="website",
 *         description="Website URL of the supplier",
 *         type="string",
 *         example="http://www.supplierwebsite.com",
 *     ),
 *     @OA\Property(
 *         property="payment_terms",
 *         description="Payment terms for the supplier",
 *         type="string",
 *         example="Net 30 days",
 *     ),
 *     @OA\Property(
 *         property="website_link",
 *         description="Formatted link to the supplier's website",
 *         type="string",
 *         readOnly=true,
 *         example="<a href='http://www.supplierwebsite.com' target='_blank'>http://www.supplierwebsite.com</a>",
 *     ),
 * )
 */

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
