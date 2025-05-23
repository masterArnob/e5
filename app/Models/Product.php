<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'thumb_image',
        'brand_name',
        'qty',
        'short_desc',
        'price',
        'status'
    ];

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }
}
