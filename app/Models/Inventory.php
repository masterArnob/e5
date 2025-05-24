<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'product_variant_item_id',
        'stock',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function productVariantItem()
    {
        return $this->belongsTo(ProductVariantItem::class);
    }

    public function stockMovements()
    {
        return $this->hasMany(StockMovement::class);
    }
}
