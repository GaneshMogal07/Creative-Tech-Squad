<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\Inquiry;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.contact');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:120',
            'email' => 'required|email|max:150',
            'phone' => 'nullable|string|max:25',
            'company' => 'nullable|string|max:150',
            'inquiry_type' => 'required|string|max:100',
            'budget_range' => 'nullable|string|max:100',
            'message' => 'required|string|max:5000',
        ]);

        Inquiry::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'company' => $validated['company'] ?? null,
            'inquiry_type' => $validated['inquiry_type'],
            'budget_range' => $validated['budget_range'] ?? null,
            'message' => $validated['message'],
            'status' => 'new',
        ]);

        return redirect()->back()->with('success', 'Thank you for reaching out! Our technology consultants will connect with you within 24 hours.');
    }

    public function messageStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:120',
            'email' => 'required|email|max:150',
            'phone' => 'nullable|string|max:25',
            'subject' => 'nullable|string|max:200',
            'message' => 'required|string|max:5000',
        ]);

        ContactMessage::create($validated);

        return redirect()->back()->with('success', 'Message sent successfully. We will get back to you shortly.');
    }
}
