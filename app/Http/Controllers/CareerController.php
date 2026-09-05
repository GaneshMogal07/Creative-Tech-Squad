<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\JobApplication;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index()
    {
        $careers = Career::active()->get();
        return view('pages.careers.index', compact('careers'));
    }

    public function show(string $slug)
    {
        $career = Career::where('slug', $slug)->where('status', 'active')->firstOrFail();
        return view('pages.careers.show', compact('career'));
    }

    public function apply(Request $request, Career $career)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:120',
            'email' => 'required|email|max:150',
            'phone' => 'required|string|max:25',
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
            'cover_letter' => 'nullable|string|max:4000',
        ]);

        $resumePath = null;
        if ($request->hasFile('resume')) {
            $resumePath = $request->file('resume')->store('resumes/jobs', 'public');
        }

        JobApplication::create([
            'career_id' => $career->id,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'resume_path' => $resumePath,
            'cover_letter' => $validated['cover_letter'] ?? null,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Application submitted successfully! Our recruitment team will review your profile.');
    }
}
