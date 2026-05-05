<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image_url',
        'stock',
        'category_id',
    ];

    /**
     * Get the category that owns the product.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function OrderItems(){
        return $this->hasMany(OrderItem::class);
    }


public function isInWishlist()
{
    if (!Auth::check()) {
        return false;
    }

    return Wishlist::where('product_id', $this->id)
        ->where('user_id', Auth::id())
        ->exists();
}
}
