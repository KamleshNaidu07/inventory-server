<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     description="Category model",
 *     title="Category",
 *     @OA\Property(
 *         property="id",
 *         description="ID of the category",
 *         type="integer",
 *         example=1,
 *     ),
 *     @OA\Property(
 *         property="name",
 *         description="Name of the category",
 *         type="string",
 *         example="Example Category",
 *     ),
 *     @OA\Property(
 *         property="description",
 *         description="Description of the category",
 *         type="string",
 *         example="Example category description.",
 *     ),
 *     @OA\Property(
 *         property="parent_id",
 *         description="ID of the parent category",
 *         type="integer",
 *         example=1,
 *     ),
 *     @OA\Property(
 *         property="formatted_name",
 *         description="Formatted name of the category with indentation based on depth",
 *         type="string",
 *         readOnly=true,
 *         example="- Example Category",
 *     ),
 * )
 */
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
