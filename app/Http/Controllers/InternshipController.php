<?php

namespace App\Http\Controllers;

use App\Models\InternshipApplication;
use App\Models\Program;
use Illuminate\Http\Request;

class InternshipController extends Controller
{
    public function index()
    {
        $programs = Program::active()->get();
        return view('pages.internships.index', compact('programs'));
    }

    public function apply(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:120',
            'email' => 'required|email|max:150',
            'phone' => 'required|string|max:25',
            'college' => 'nullable|string|max:200',
            'course' => 'nullable|string|max:150',
            'graduation_year' => 'nullable|string|max:10',
            'preferred_track' => 'required|string|max:100',
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
            'message' => 'nullable|string|max:3000',
        ]);

        $resumePath = null;
        if ($request->hasFile('resume')) {
            $resumePath = $request->file('resume')->store('resumes/internships', 'public');
        }

        InternshipApplication::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'college' => $validated['college'] ?? null,
            'course' => $validated['course'] ?? null,
            'graduation_year' => $validated['graduation_year'] ?? null,
            'preferred_track' => $validated['preferred_track'],
            'resume_path' => $resumePath,
            'message' => $validated['message'] ?? null,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Thank you! Your internship application has been received. Our team will review your application and contact you soon.');
    }
}
