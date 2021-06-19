<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    use HasFactory;

    protected $fillable = [
     'id',
     'products_id',
     'images',
    ];

    public function product_id()
    {
        return $this->belongsTo(Product::class);
    }
}
