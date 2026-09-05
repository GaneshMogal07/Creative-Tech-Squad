<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use App\Models\User;
use Illuminate\Http\Request;

class AdminInquiryController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status');
        $query = Inquiry::with('assignedUser')->latest();

        if ($status && $status !== 'all') {
            $query->where('status', $status);
        }

        $inquiries = $query->paginate(20)->withQueryString();
        $users = User::all();

        return view('admin.inquiries.index', compact('inquiries', 'users', 'status'));
    }

    public function show(Inquiry $inquiry)
    {
        $users = User::all();
        return view('admin.inquiries.show', compact('inquiry', 'users'));
    }

    public function update(Request $request, Inquiry $inquiry)
    {
        $validated = $request->validate([
            'status' => 'required|in:new,in_progress,contacted,closed',
            'assigned_to' => 'nullable|exists:users,id',
        ]);

        $inquiry->update($validated);

        return redirect()->back()->with('success', 'Inquiry updated successfully.');
    }

    public function destroy(Inquiry $inquiry)
    {
        $inquiry->delete();
        return redirect()->route('admin.inquiries.index')->with('success', 'Inquiry deleted.');
    }
}
