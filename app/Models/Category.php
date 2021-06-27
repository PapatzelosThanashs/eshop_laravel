<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'category_slug',
        'status',
        'category_parent_id',
        'category_image',
    ];

    public function productAttr()
    {
        return $this->belongsTo(ProductAttributes::class);
    }

    public function parentName( $id){
        $parent_name=Category::where(['id'=>$id])->first();
        if($parent_name!=null){
            return    $parent_name->category_name;
        }else{
            return    '';
        }
       
    }
}
