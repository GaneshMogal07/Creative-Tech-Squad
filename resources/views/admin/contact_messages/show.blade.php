@extends('admin.layouts.master')

@section('title', 'Read Message: ' . $message->name)
@section('page_title', 'Contact Message')

@section('content')
<div class="admin-card">
  <div class="admin-card-header">
    <div class="admin-card-title">Message from {{ $message->name }}</div>
    <a href="{{ route('admin.contact_messages.index') }}" class="admin-btn admin-btn-outline admin-btn-sm">&larr; Back</a>
  </div>

  <div class="admin-card-body">
    <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px; margin-bottom:28px;">
      <div>
        <div style="font-size:0.85rem; color:#64748B;">Sender Name</div>
        <div style="font-size:1.1rem; font-weight:700;">{{ $message->name }}</div>
      </div>
      <div>
        <div style="font-size:0.85rem; color:#64748B;">Email Address</div>
        <div style="font-size:1.05rem; font-weight:600;"><a href="mailto:{{ $message->email }}">{{ $message->email }}</a></div>
      </div>
      <div>
        <div style="font-size:0.85rem; color:#64748B;">Phone</div>
        <div style="font-size:1.05rem; font-weight:600;">{{ $message->phone ?? 'Not provided' }}</div>
      </div>
      <div>
        <div style="font-size:0.85rem; color:#64748B;">Subject</div>
        <div style="font-size:1.05rem; font-weight:600;">{{ $message->subject ?? 'General Contact' }}</div>
      </div>
    </div>

    <div style="margin-bottom:28px;">
      <div style="font-size:0.85rem; color:#64748B; margin-bottom:8px;">Message Content</div>
      <div style="background:#F8FAFC; border:1px solid #E2E8F0; padding:20px; border-radius:12px; font-size:1rem; line-height:1.7; color:#1E293B;">
        {{ $message->message }}
      </div>
    </div>

    <div style="display:flex; justify-content:space-between; align-items:center; border-top:1px solid #E2E8F0; padding-top:20px;">
      <a href="mailto:{{ $message->email }}?subject=Re: {{ $message->subject }}" class="admin-btn admin-btn-primary">Reply via Email</a>
      <span style="font-size:0.85rem; color:#64748B;">Received: {{ $message->created_at->format('M d, Y h:i A') }}</span>
    </div>
  </div>
</div>
@endsection
