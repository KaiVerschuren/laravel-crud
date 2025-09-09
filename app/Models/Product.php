<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_junctions', 'product_id', 'cat_id');
    }

    public function images()
    {
        return $this->belongsToMany(Image::class, 'image_junctions', 'product_id', 'image_id');
    }
}
