<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'name',
        'image',
        'slug',
        'brand_id',
        'model',
        'short_desc',
        'desc',
        'keywords',
        'technical_specification',
        'uses',
        'warranty',
        'status',

    ];

    public function attribute()
    {
        return $this->HasMany(ProductAttributes::class,'products_id');
    }

    public function image()
    {
        return $this->HasMany(ProductImages::class,'products_id');
    }
    
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
