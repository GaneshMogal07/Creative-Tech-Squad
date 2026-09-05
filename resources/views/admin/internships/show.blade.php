@extends('admin.layouts.master')

@section('title', 'Review Application: ' . $internship->name)
@section('page_title', 'Internship Applicant Review')

@section('content')
<div class="admin-card">
  <div class="admin-card-header">
    <div class="admin-card-title">Applicant Profile: {{ $internship->name }}</div>
    <a href="{{ route('admin.internships.index') }}" class="admin-btn admin-btn-outline admin-btn-sm">&larr; Back</a>
  </div>

  <div class="admin-card-body">
    <div style="display:grid; grid-template-columns:2fr 1fr; gap:32px;">
      <div>
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px; margin-bottom:28px;">
          <div>
            <div style="font-size:0.85rem; color:#64748B;">Email Address</div>
            <div style="font-size:1.05rem; font-weight:600;"><a href="mailto:{{ $internship->email }}">{{ $internship->email }}</a></div>
          </div>
          <div>
            <div style="font-size:0.85rem; color:#64748B;">Phone / WhatsApp</div>
            <div style="font-size:1.05rem; font-weight:600;"><a href="tel:{{ $internship->phone }}">{{ $internship->phone }}</a></div>
          </div>
          <div>
            <div style="font-size:0.85rem; color:#64748B;">College / University</div>
            <div style="font-size:1.05rem; font-weight:600;">{{ $internship->college ?? 'Not Provided' }}</div>
          </div>
          <div>
            <div style="font-size:0.85rem; color:#64748B;">Course & Year</div>
            <div style="font-size:1.05rem; font-weight:600;">{{ $internship->course }} (Grad: {{ $internship->graduation_year }})</div>
          </div>
        </div>

        <div style="margin-bottom:28px;">
          <div style="font-size:0.85rem; color:#64748B; margin-bottom:6px;">Preferred Track</div>
          <span class="admin-badge admin-badge-purple" style="font-size:0.95rem; padding:6px 14px;">{{ $internship->preferred_track }}</span>
        </div>

        @if($internship->message)
          <div style="margin-bottom:28px;">
            <div style="font-size:0.85rem; color:#64748B; margin-bottom:6px;">Applicant Statement</div>
            <div style="background:#F8FAFC; border:1px solid #E2E8F0; padding:18px; border-radius:10px; font-size:0.95rem; line-height:1.6;">
              {{ $internship->message }}
            </div>
          </div>
        @endif

        @if($internship->resume_path)
          <div>
            <div style="font-size:0.85rem; color:#64748B; margin-bottom:6px;">Uploaded Resume Document</div>
            <a href="{{ asset('storage/' . $internship->resume_path) }}" target="_blank" class="admin-btn admin-btn-outline">
              📄 View / Download Resume PDF ↗
            </a>
          </div>
        @else
          <div style="font-size:0.9rem; color:#64748B;">No resume file attached.</div>
        @endif
      </div>

      <!-- Application Status Control Box -->
      <div style="background:#F8FAFC; border:1px solid #E2E8F0; padding:24px; border-radius:12px; height:fit-content;">
        <h4 style="margin-bottom:16px;">Update Review Status</h4>
        <form action="{{ route('admin.internships.status', $internship->id) }}" method="POST">
          @csrf
          @method('PATCH')
          
          <div class="admin-form-group">
            <label class="admin-label">Current Status</label>
            <select name="status" class="admin-select" required>
              <option value="pending" {{ $internship->status === 'pending' ? 'selected' : '' }}>Pending</option>
              <option value="under_review" {{ $internship->status === 'under_review' ? 'selected' : '' }}>Under Review</option>
              <option value="accepted" {{ $internship->status === 'accepted' ? 'selected' : '' }}>Accepted / Offer Sent</option>
              <option value="rejected" {{ $internship->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
          </div>

          <button type="submit" class="admin-btn admin-btn-primary" style="width:100%;">Save Status</button>
        </form>

        <div style="margin-top:20px; font-size:0.85rem; color:#64748B;">
          Applied on: {{ $internship->created_at->format('M d, Y h:i A') }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
