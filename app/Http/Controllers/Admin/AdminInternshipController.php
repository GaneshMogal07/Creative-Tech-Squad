<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InternshipApplication;
use Illuminate\Http\Request;

class AdminInternshipController extends Controller
{
    public function index()
    {
        $applications = InternshipApplication::latest()->paginate(20);
        return view('admin.internships.index', compact('applications'));
    }

    public function show(InternshipApplication $internship)
    {
        return view('admin.internships.show', compact('internship'));
    }

    public function updateStatus(Request $request, InternshipApplication $internship)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,under_review,accepted,rejected',
        ]);

        $internship->update($validated);

        return redirect()->back()->with('success', 'Application status updated to ' . ucfirst(str_replace('_', ' ', $internship->status)));
    }

    public function destroy(InternshipApplication $internship)
    {
        $internship->delete();
        return redirect()->route('admin.internships.index')->with('success', 'Application removed.');
    }
}
