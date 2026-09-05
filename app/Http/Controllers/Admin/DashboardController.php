<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\Career;
use App\Models\ContactMessage;
use App\Models\Inquiry;
use App\Models\InternshipApplication;
use App\Models\JobApplication;
use App\Models\Product;
use App\Models\Program;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_products' => Product::count(),
            'total_projects' => Project::count(),
            'total_services' => Service::count(),
            'published_blogs' => BlogPost::where('status', 'published')->count(),
            'active_programs' => Program::where('status', 'active')->count(),
            'open_careers' => Career::where('status', 'active')->count(),
            'new_inquiries' => Inquiry::where('status', 'new')->count(),
            'total_inquiries' => Inquiry::count(),
            'internship_applications' => InternshipApplication::count(),
            'job_applications' => JobApplication::count(),
            'unread_messages' => ContactMessage::where('status', 'unread')->count(),
        ];

        $recentInquiries = Inquiry::latest()->take(6)->get();
        $recentInternships = InternshipApplication::latest()->take(6)->get();
        $recentJobs = JobApplication::with('career')->latest()->take(6)->get();
        $recentBlogs = BlogPost::with('author')->latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentInquiries', 'recentInternships', 'recentJobs', 'recentBlogs'));
    }
}
