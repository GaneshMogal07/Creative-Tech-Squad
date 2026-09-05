<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AiController extends Controller
{
    public function index()
    {
        $aiProducts = Product::where('category', 'AI')->where('status', 'published')->get();
        return view('pages.ai', compact('aiProducts'));
    }
}
