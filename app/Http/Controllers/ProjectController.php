<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->query('category');
        $query = Project::published();

        if ($category && $category !== 'all') {
            $query->where('category', $category);
        }

        $projects = $query->get();
        $categories = Project::published()->distinct()->pluck('category');

        return view('pages.portfolio.index', compact('projects', 'categories', 'category'));
    }

    public function show(string $slug)
    {
        $project = Project::where('slug', $slug)->where('status', 'published')->firstOrFail();
        $relatedProjects = Project::where('id', '!=', $project->id)->where('status', 'published')->take(3)->get();
        return view('pages.portfolio.show', compact('project', 'relatedProjects'));
    }
}
