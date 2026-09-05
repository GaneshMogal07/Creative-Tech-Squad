<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:180',
            'slug' => 'nullable|string|unique:projects,slug',
            'client_name' => 'nullable|string|max:150',
            'category' => 'required|string|max:100',
            'description' => 'required|string',
            'challenge' => 'nullable|string',
            'solution' => 'nullable|string',
            'technology_stack' => 'nullable|string',
            'project_url' => 'nullable|url',
            'status' => 'required|in:published,draft',
            'is_featured' => 'boolean',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        $techStack = !empty($validated['technology_stack']) ? array_values(array_filter(array_map('trim', explode(',', $validated['technology_stack'])))) : [];

        Project::create([
            'title' => $validated['title'],
            'slug' => $validated['slug'],
            'client_name' => $validated['client_name'] ?? null,
            'category' => $validated['category'],
            'description' => $validated['description'],
            'challenge' => $validated['challenge'] ?? null,
            'solution' => $validated['solution'] ?? null,
            'technology_stack' => $techStack,
            'project_url' => $validated['project_url'] ?? null,
            'status' => $validated['status'],
            'is_featured' => $request->boolean('is_featured'),
        ]);

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:180',
            'slug' => 'required|string|unique:projects,slug,' . $project->id,
            'client_name' => 'nullable|string|max:150',
            'category' => 'required|string|max:100',
            'description' => 'required|string',
            'challenge' => 'nullable|string',
            'solution' => 'nullable|string',
            'technology_stack' => 'nullable|string',
            'project_url' => 'nullable|url',
            'status' => 'required|in:published,draft',
            'is_featured' => 'boolean',
        ]);

        $techStack = !empty($validated['technology_stack']) ? array_values(array_filter(array_map('trim', explode(',', $validated['technology_stack'])))) : [];

        $project->update([
            'title' => $validated['title'],
            'slug' => $validated['slug'],
            'client_name' => $validated['client_name'] ?? null,
            'category' => $validated['category'],
            'description' => $validated['description'],
            'challenge' => $validated['challenge'] ?? null,
            'solution' => $validated['solution'] ?? null,
            'technology_stack' => $techStack,
            'project_url' => $validated['project_url'] ?? null,
            'status' => $validated['status'],
            'is_featured' => $request->boolean('is_featured'),
        ]);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully.');
    }
}
