@extends('admin.layouts.master')

@section('title', 'Inquiry Details: ' . $inquiry->name)
@section('page_title', 'Inquiry Details')

@section('content')
<div class="admin-card">
  <div class="admin-card-header">
    <div class="admin-card-title">Inquiry from {{ $inquiry->name }}</div>
    <a href="{{ route('admin.inquiries.index') }}" class="admin-btn admin-btn-outline admin-btn-sm">&larr; Back</a>
  </div>

  <div class="admin-card-body">
    <div style="display:grid; grid-template-columns:2fr 1fr; gap:32px;">
      <div>
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px; margin-bottom:28px;">
          <div>
            <div style="font-size:0.85rem; color:#64748B;">Client Name</div>
            <div style="font-size:1.1rem; font-weight:700;">{{ $inquiry->name }}</div>
          </div>
          <div>
            <div style="font-size:0.85rem; color:#64748B;">Company / Organization</div>
            <div style="font-size:1.1rem; font-weight:600;">{{ $inquiry->company ?? 'N/A' }}</div>
          </div>
          <div>
            <div style="font-size:0.85rem; color:#64748B;">Email Address</div>
            <div style="font-size:1.05rem; font-weight:600;"><a href="mailto:{{ $inquiry->email }}">{{ $inquiry->email }}</a></div>
          </div>
          <div>
            <div style="font-size:0.85rem; color:#64748B;">Phone Number</div>
            <div style="font-size:1.05rem; font-weight:600;">{{ $inquiry->phone ?? 'Not provided' }}</div>
          </div>
          <div>
            <div style="font-size:0.85rem; color:#64748B;">Inquiry Type</div>
            <span class="admin-badge admin-badge-blue">{{ $inquiry->inquiry_type }}</span>
          </div>
          <div>
            <div style="font-size:0.85rem; color:#64748B;">Budget Range</div>
            <div style="font-size:1.05rem; font-weight:600; color:#0F172A;">{{ $inquiry->budget_range ?? 'Not specified' }}</div>
          </div>
        </div>

        <div style="margin-bottom:28px;">
          <div style="font-size:0.85rem; color:#64748B; margin-bottom:8px;">Project Scope & Message</div>
          <div style="background:#F8FAFC; border:1px solid #E2E8F0; padding:20px; border-radius:12px; font-size:1rem; line-height:1.7; color:#1E293B;">
            {{ $inquiry->message }}
          </div>
        </div>
      </div>

      <div style="background:#F8FAFC; border:1px solid #E2E8F0; padding:24px; border-radius:12px; height:fit-content;">
        <h4 style="margin-bottom:16px;">Lead Status & Assignment</h4>
        <form action="{{ route('admin.inquiries.update', $inquiry->id) }}" method="POST">
          @csrf
          @method('PATCH')

          <div class="admin-form-group">
            <label class="admin-label">Status</label>
            <select name="status" class="admin-select" required>
              <option value="new" {{ $inquiry->status === 'new' ? 'selected' : '' }}>New Lead</option>
              <option value="in_progress" {{ $inquiry->status === 'in_progress' ? 'selected' : '' }}>In Progress</option>
              <option value="contacted" {{ $inquiry->status === 'contacted' ? 'selected' : '' }}>Contacted / Meeting Scheduled</option>
              <option value="closed" {{ $inquiry->status === 'closed' ? 'selected' : '' }}>Closed</option>
            </select>
          </div>

          <div class="admin-form-group">
            <label class="admin-label">Assigned Staff</label>
            <select name="assigned_to" class="admin-select">
              <option value="">-- Unassigned --</option>
              @foreach($users as $u)
                <option value="{{ $u->id }}" {{ $inquiry->assigned_to == $u->id ? 'selected' : '' }}>{{ $u->name }}</option>
              @endforeach
            </select>
          </div>

          <button type="submit" class="admin-btn admin-btn-primary" style="width:100%;">Save Changes</button>
        </form>

        <div style="margin-top:20px; font-size:0.85rem; color:#64748B;">
          Received on: {{ $inquiry->created_at->format('M d, Y h:i A') }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
