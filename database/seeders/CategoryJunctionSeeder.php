<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use App\Models\CategoryJunction;

class CategoryJunctionSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::all()->pluck('id');
        $products   = Product::all()->pluck('id');

        foreach ($products as $productId) {
            CategoryJunction::create([
                'cat_id'     => $categories->random(),
                'product_id' => $productId,
            ]);
        }
    }
}

