<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use App\Models\CategoryJunction;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request, $id = null)
    {
        $id = $request->id;
        $categories = CategoryJunction::all();
        $items = Product::all(); // get products
        return view('product.index', compact('items', 'categories', 'id'));
    }

    public function category()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('product.category', compact('categories'));
    }

    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::findOrFail($id);
        return view('product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $categories = Category::all();
        $product = Product::findOrFail($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->image = $request->input('image') === 'No image' ? null : $request->input('image');
        $product->save();

        // sync categories (updates catjunction table)
        $product->categories()->sync($request->input('categories', []));

        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }


    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
    }

    public function add()
    {
        return view('product.add');
    }

    public function addjunction()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('product.addjunction', compact('categories', 'products'));
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->image = $request->input('image') === 'No image' ? null : $request->input('image');
        $product->save();

        return redirect()->route('product.index')->with('success', 'Product added successfully.');
    }

    public function storejunction(Request $request)
    {
        $categoryJunction = new CategoryJunction();
        $categoryJunction->product_id = $request->input('product_id');
        $categoryJunction->cat_id = $request->input('cat_id');
        // dd($request->all());

        $categoryJunction->save();
        return redirect()->route('product.index')->with('success', 'Category junction added successfully.');
    }
}
