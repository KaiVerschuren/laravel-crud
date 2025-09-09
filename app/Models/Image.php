<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';

    protected $fillable = ['path', 'alt_text'];

    use HasFactory;

    public function products()
    {
        return $this->belongsToMany(Product::class, 'image_junctions', 'image_id', 'product_id');
    }
}
