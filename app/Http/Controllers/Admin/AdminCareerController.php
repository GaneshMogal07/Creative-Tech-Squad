<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Career;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminCareerController extends Controller
{
    public function index()
    {
        $careers = Career::withCount('applications')->latest()->get();
        return view('admin.careers.index', compact('careers'));
    }

    public function create()
    {
        return view('admin.careers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:180',
            'slug' => 'nullable|string|unique:careers,slug',
            'department' => 'required|string|max:100',
            'location' => 'required|string|max:100',
            'employment_type' => 'required|string|max:100',
            'experience' => 'required|string|max:100',
            'description' => 'required|string',
            'requirements' => 'nullable|string',
            'salary_range' => 'nullable|string|max:100',
            'status' => 'required|in:active,closed',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        Career::create($validated);

        return redirect()->route('admin.careers.index')->with('success', 'Job posting created successfully.');
    }

    public function edit(Career $career)
    {
        return view('admin.careers.edit', compact('career'));
    }

    public function update(Request $request, Career $career)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:180',
            'slug' => 'required|string|unique:careers,slug,' . $career->id,
            'department' => 'required|string|max:100',
            'location' => 'required|string|max:100',
            'employment_type' => 'required|string|max:100',
            'experience' => 'required|string|max:100',
            'description' => 'required|string',
            'requirements' => 'nullable|string',
            'salary_range' => 'nullable|string|max:100',
            'status' => 'required|in:active,closed',
        ]);

        $career->update($validated);

        return redirect()->route('admin.careers.index')->with('success', 'Job posting updated successfully.');
    }

    public function destroy(Career $career)
    {
        $career->delete();
        return redirect()->route('admin.careers.index')->with('success', 'Job posting deleted.');
    }

    public function applications(Career $career)
    {
        $applications = $career->applications()->latest()->paginate(20);
        return view('admin.careers.applications', compact('career', 'applications'));
    }

    public function allApplications()
    {
        $applications = JobApplication::with('career')->latest()->paginate(20);
        $totalCandidates = JobApplication::count();
        return view('admin.careers.all_applications', compact('applications', 'totalCandidates'));
    }

    public function updateApplicationStatus(Request $request, JobApplication $application)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,reviewed,shortlisted,interview,rejected,hired',
        ]);

        $application->update(['status' => $validated['status']]);

        return redirect()->back()->with('success', 'Candidate application status updated to ' . ucfirst($validated['status']));
    }

    public function destroyApplication(JobApplication $application)
    {
        $application->delete();
        return redirect()->back()->with('success', 'Job application record deleted.');
    }
}
