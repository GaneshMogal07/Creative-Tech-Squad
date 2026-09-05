<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class AdminContactController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::latest()->paginate(20);
        return view('admin.contact_messages.index', compact('messages'));
    }

    public function show(ContactMessage $message)
    {
        if ($message->status === 'unread') {
            $message->update(['status' => 'read']);
        }
        return view('admin.contact_messages.show', compact('message'));
    }

    public function destroy(ContactMessage $message)
    {
        $message->delete();
        return redirect()->route('admin.contact_messages.index')->with('success', 'Message deleted.');
    }
}
