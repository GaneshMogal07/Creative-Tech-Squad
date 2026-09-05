<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminProgramController extends Controller
{
    public function index()
    {
        $programs = Program::latest()->get();
        return view('admin.programs.index', compact('programs'));
    }

    public function create()
    {
        return view('admin.programs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:180',
            'slug' => 'nullable|string|unique:programs,slug',
            'type' => 'required|string|max:100',
            'duration' => 'required|string|max:100',
            'level' => 'required|string|max:100',
            'description' => 'required|string',
            'skills' => 'nullable|string',
            'project_details' => 'nullable|string',
            'certificate' => 'boolean',
            'fee' => 'nullable|string|max:100',
            'status' => 'required|in:active,inactive',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        $skills = !empty($validated['skills']) ? array_values(array_filter(array_map('trim', explode(',', $validated['skills'])))) : [];

        Program::create([
            'title' => $validated['title'],
            'slug' => $validated['slug'],
            'type' => $validated['type'],
            'duration' => $validated['duration'],
            'level' => $validated['level'],
            'description' => $validated['description'],
            'skills' => $skills,
            'project_details' => $validated['project_details'] ?? null,
            'certificate' => $request->boolean('certificate'),
            'fee' => $validated['fee'] ?? null,
            'status' => $validated['status'],
        ]);

        return redirect()->route('admin.programs.index')->with('success', 'Program created successfully.');
    }

    public function edit(Program $program)
    {
        return view('admin.programs.edit', compact('program'));
    }

    public function update(Request $request, Program $program)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:180',
            'slug' => 'required|string|unique:programs,slug,' . $program->id,
            'type' => 'required|string|max:100',
            'duration' => 'required|string|max:100',
            'level' => 'required|string|max:100',
            'description' => 'required|string',
            'skills' => 'nullable|string',
            'project_details' => 'nullable|string',
            'certificate' => 'boolean',
            'fee' => 'nullable|string|max:100',
            'status' => 'required|in:active,inactive',
        ]);

        $skills = !empty($validated['skills']) ? array_values(array_filter(array_map('trim', explode(',', $validated['skills'])))) : [];

        $program->update([
            'title' => $validated['title'],
            'slug' => $validated['slug'],
            'type' => $validated['type'],
            'duration' => $validated['duration'],
            'level' => $validated['level'],
            'description' => $validated['description'],
            'skills' => $skills,
            'project_details' => $validated['project_details'] ?? null,
            'certificate' => $request->boolean('certificate'),
            'fee' => $validated['fee'] ?? null,
            'status' => $validated['status'],
        ]);

        return redirect()->route('admin.programs.index')->with('success', 'Program updated successfully.');
    }

    public function destroy(Program $program)
    {
        $program->delete();
        return redirect()->route('admin.programs.index')->with('success', 'Program deleted successfully.');
    }
}
