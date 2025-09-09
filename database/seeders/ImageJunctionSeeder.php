<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ImageJunction;
use App\Models\Product;
use App\Models\Image;

class ImageJunctionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $images = Image::all()->pluck('id');
        $products   = Product::all()->pluck('id');

        foreach ($products as $productId) {
            ImageJunction::create([
                'image_id'     => $images->random(),
                'product_id' => $productId,
            ]);
        }
    }
}
