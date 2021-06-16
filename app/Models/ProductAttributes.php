<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttributes extends Model
{
    use HasFactory;



    protected $fillable = [
        'products_id',
        'sku',
        'image_attr',
        'mrp',
        'price',
        'qty',
        'sizes_id',
        'colors_id',
        'image_attr',
    ];

    public function product_id()
    {
        return $this->belongsTo(Product::class);
    }

 
}
