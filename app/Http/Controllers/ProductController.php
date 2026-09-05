<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->query('category');
        $query = Product::published();

        if ($category && $category !== 'all') {
            $query->where('category', $category);
        }

        $products = $query->get();
        $categories = Product::published()->distinct()->pluck('category');

        return view('pages.products.index', compact('products', 'categories', 'category'));
    }

    public function show(string $slug)
    {
        $product = Product::where('slug', $slug)->where('status', 'published')->firstOrFail();
        $relatedProducts = Product::where('id', '!=', $product->id)->where('status', 'published')->take(3)->get();
        return view('pages.products.show', compact('product', 'relatedProducts'));
    }
}
