<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        $services = Service::active()->get();
        $testimonials = Testimonial::active()->get();
        return view('pages.about', compact('services', 'testimonials'));
    }

    public function privacy()
    {
        return view('pages.privacy');
    }

    public function terms()
    {
        return view('pages.terms');
    }
}
