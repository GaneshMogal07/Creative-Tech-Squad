<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $categorySlug = $request->query('category');
        $search = $request->query('q');

        $query = BlogPost::published()->with(['category', 'author']);

        if ($categorySlug && $categorySlug !== 'all') {
            $query->whereHas('category', function ($q) use ($categorySlug) {
                $q->where('slug', $categorySlug);
            });
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        $posts = $query->paginate(9)->withQueryString();
        $categories = Category::where('type', 'blog')->get();

        return view('pages.blog.index', compact('posts', 'categories', 'categorySlug', 'search'));
    }

    public function show(string $slug)
    {
        $post = BlogPost::where('slug', $slug)->where('status', 'published')->with(['category', 'author'])->firstOrFail();
        $relatedPosts = BlogPost::where('id', '!=', $post->id)->where('status', 'published')->take(3)->get();
        return view('pages.blog.show', compact('post', 'relatedPosts'));
    }
}
