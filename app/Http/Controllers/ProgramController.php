<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::active()->get();
        return view('pages.education.index', compact('programs'));
    }

    public function show(string $slug)
    {
        $program = Program::where('slug', $slug)->where('status', 'active')->firstOrFail();
        $otherPrograms = Program::where('id', '!=', $program->id)->where('status', 'active')->take(3)->get();
        return view('pages.education.show', compact('program', 'otherPrograms'));
    }
}
