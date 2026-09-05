<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'slug' => 'nullable|string|unique:products,slug',
            'category' => 'required|string|max:100',
            'short_description' => 'required|string|max:500',
            'description' => 'required|string',
            'features' => 'nullable|string', // comma or newline separated in form
            'technology_stack' => 'nullable|string',
            'demo_url' => 'nullable|url',
            'status' => 'required|in:published,draft,archived',
            'is_featured' => 'boolean',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        $features = !empty($validated['features']) ? array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n|,/', $validated['features'])))) : [];
        $techStack = !empty($validated['technology_stack']) ? array_values(array_filter(array_map('trim', explode(',', $validated['technology_stack'])))) : [];

        Product::create([
            'name' => $validated['name'],
            'slug' => $validated['slug'],
            'category' => $validated['category'],
            'short_description' => $validated['short_description'],
            'description' => $validated['description'],
            'features' => $features,
            'technology_stack' => $techStack,
            'demo_url' => $validated['demo_url'] ?? null,
            'status' => $validated['status'],
            'is_featured' => $request->boolean('is_featured'),
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'slug' => 'required|string|unique:products,slug,' . $product->id,
            'category' => 'required|string|max:100',
            'short_description' => 'required|string|max:500',
            'description' => 'required|string',
            'features' => 'nullable|string',
            'technology_stack' => 'nullable|string',
            'demo_url' => 'nullable|url',
            'status' => 'required|in:published,draft,archived',
            'is_featured' => 'boolean',
        ]);

        $features = !empty($validated['features']) ? array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n|,/', $validated['features'])))) : [];
        $techStack = !empty($validated['technology_stack']) ? array_values(array_filter(array_map('trim', explode(',', $validated['technology_stack'])))) : [];

        $product->update([
            'name' => $validated['name'],
            'slug' => $validated['slug'],
            'category' => $validated['category'],
            'short_description' => $validated['short_description'],
            'description' => $validated['description'],
            'features' => $features,
            'technology_stack' => $techStack,
            'demo_url' => $validated['demo_url'] ?? null,
            'status' => $validated['status'],
            'is_featured' => $request->boolean('is_featured'),
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
}
