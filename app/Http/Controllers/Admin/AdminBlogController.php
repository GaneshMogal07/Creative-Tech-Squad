<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdminBlogController extends Controller
{
    public function index()
    {
        $posts = BlogPost::with(['category', 'author'])->latest()->paginate(15);
        return view('admin.blog.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::where('type', 'blog')->get();
        return view('admin.blog.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:200',
            'slug' => 'nullable|string|unique:blog_posts,slug',
            'category_id' => 'required|exists:categories,id',
            'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'meta_title' => 'nullable|string|max:150',
            'meta_description' => 'nullable|string|max:300',
            'status' => 'required|in:published,draft',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        $validated['author_id'] = Auth::id();
        if ($validated['status'] === 'published') {
            $validated['published_at'] = now();
        }

        BlogPost::create($validated);

        return redirect()->route('admin.blog.index')->with('success', 'Blog article published successfully.');
    }

    public function edit(BlogPost $blog)
    {
        $categories = Category::where('type', 'blog')->get();
        return view('admin.blog.edit', compact('blog', 'categories'));
    }

    public function update(Request $request, BlogPost $blog)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:200',
            'slug' => 'required|string|unique:blog_posts,slug,' . $blog->id,
            'category_id' => 'required|exists:categories,id',
            'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'meta_title' => 'nullable|string|max:150',
            'meta_description' => 'nullable|string|max:300',
            'status' => 'required|in:published,draft',
        ]);

        if ($validated['status'] === 'published' && empty($blog->published_at)) {
            $validated['published_at'] = now();
        }

        $blog->update($validated);

        return redirect()->route('admin.blog.index')->with('success', 'Blog article updated successfully.');
    }

    public function destroy(BlogPost $blog)
    {
        $blog->delete();
        return redirect()->route('admin.blog.index')->with('success', 'Blog article deleted successfully.');
    }
}
