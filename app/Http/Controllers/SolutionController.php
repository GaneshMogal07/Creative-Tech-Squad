<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class SolutionController extends Controller
{
    public function index()
    {
        $solutions = Service::active()->get();
        return view('pages.solutions.index', compact('solutions'));
    }

    public function show(string $slug)
    {
        $solution = Service::where('slug', $slug)->where('status', 'active')->firstOrFail();
        $otherSolutions = Service::where('id', '!=', $solution->id)->where('status', 'active')->take(3)->get();
        return view('pages.solutions.show', compact('solution', 'otherSolutions'));
    }
}
