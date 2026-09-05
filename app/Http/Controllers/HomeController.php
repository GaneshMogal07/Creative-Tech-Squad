<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Category;
use App\Models\Product;
use App\Models\Program;
use App\Models\Project;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::active()->take(6)->get();
        $products = Product::published()->take(6)->get();
        $projects = Project::published()->take(4)->get();
        $programs = Program::active()->take(4)->get();
        $blogs = BlogPost::published()->take(3)->get();
        $testimonials = Testimonial::active()->get();

        return view('pages.home', compact(
            'services',
            'products',
            'projects',
            'programs',
            'blogs',
            'testimonials'
        ));
    }
}
