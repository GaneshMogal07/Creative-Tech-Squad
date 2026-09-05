@extends('admin.layouts.master')

@section('title', 'All Job Applications')
@section('page_title', 'Job Candidates Management')

@section('content')
<div class="admin-card">
  <div class="admin-card-header">
    <div>
      <div class="admin-card-title">All Candidate Applications ({{ $totalCandidates }})</div>
      <p style="font-size:0.85rem; color:#64748B; margin-top:4px;">Manage resumes, update hiring stages, and review applicant details.</p>
    </div>
    <div style="display:flex; gap:10px;">
      <a href="{{ route('admin.careers.index') }}" class="admin-btn admin-btn-outline admin-btn-sm">&larr; Manage Job Openings</a>
      <a href="{{ route('admin.careers.create') }}" class="admin-btn admin-btn-primary admin-btn-sm">+ Post New Job</a>
    </div>
  </div>

  <div class="admin-table-wrapper">
    <table class="admin-table">
      <thead>
        <tr>
          <th>Candidate</th>
          <th>Applied Position</th>
          <th>Cover Note</th>
          <th>Hiring Status</th>
          <th>Resume File</th>
          <th>Date</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($applications as $app)
          <tr>
            <td>
              <strong>{{ $app->name }}</strong>
              <div style="font-size:0.82rem; color:#64748B; margin-top:2px;">
                <a href="mailto:{{ $app->email }}" style="color:#007EFA;">{{ $app->email }}</a><br>
                <a href="tel:{{ $app->phone }}" style="color:#475569;">📞 {{ $app->phone }}</a>
              </div>
            </td>
            <td>
              @if($app->career)
                <a href="{{ route('admin.careers.edit', $app->career->id) }}" style="font-weight:600; color:#071B3A;">
                  {{ $app->career->title }}
                </a>
                <div style="font-size:0.75rem; color:#64748B;">{{ $app->career->department }} • {{ $app->career->location }}</div>
              @else
                <span class="admin-badge admin-badge-purple">General Opening</span>
              @endif
            </td>
            <td>
              <div style="max-width:260px; font-size:0.85rem; color:#475569; line-height:1.4;">
                {{ $app->cover_letter ?? 'No cover letter provided.' }}
              </div>
            </td>
            <td>
              <form action="{{ route('admin.careers.application_status', $app->id) }}" method="POST" style="margin:0;">
                @csrf
                @method('PATCH')
                <select name="status" onchange="this.form.submit()" class="admin-form-control" style="padding:4px 8px; font-size:0.82rem; width:auto; border-radius:6px; font-weight:600; background: {{ $app->status == 'shortlisted' ? '#ECFDF5' : ($app->status == 'rejected' ? '#FEF2F2' : '#F8FAFC') }};">
                  <option value="pending" {{ $app->status == 'pending' ? 'selected' : '' }}>⏳ Pending</option>
                  <option value="reviewed" {{ $app->status == 'reviewed' ? 'selected' : '' }}>👀 Reviewed</option>
                  <option value="shortlisted" {{ $app->status == 'shortlisted' ? 'selected' : '' }}>⭐ Shortlisted</option>
                  <option value="interview" {{ $app->status == 'interview' ? 'selected' : '' }}>🎙️ Interview</option>
                  <option value="hired" {{ $app->status == 'hired' ? 'selected' : '' }}>🎉 Hired</option>
                  <option value="rejected" {{ $app->status == 'rejected' ? 'selected' : '' }}>❌ Rejected</option>
                </select>
              </form>
            </td>
            <td>
              @if($app->resume_path)
                <a href="{{ asset('storage/' . $app->resume_path) }}" target="_blank" class="admin-btn admin-btn-outline admin-btn-sm" style="display:inline-flex; align-items:center; gap:6px; font-size:0.82rem; padding:6px 12px;">
                  📄 Download Resume ↗
                </a>
              @else
                <span style="color:#94A3B8; font-size:0.82rem;">No attachment</span>
              @endif
            </td>
            <td style="font-size:0.82rem; color:#64748B; white-space:nowrap;">
              {{ $app->created_at->format('M d, Y') }}<br>
              <span style="font-size:0.75rem;">{{ $app->created_at->format('h:i A') }}</span>
            </td>
            <td>
              <form action="{{ route('admin.careers.application_destroy', $app->id) }}" method="POST" onsubmit="return confirm('Delete candidate application for {{ addslashes($app->name) }}?');" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="admin-btn admin-btn-danger admin-btn-sm" title="Delete" style="padding:4px 8px;">
                  🗑️
                </button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="7" style="text-align:center; padding:40px 20px; color:#64748B;">
              <div style="font-size:2rem; margin-bottom:8px;">👥</div>
              No candidate applications received yet.
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div style="padding:16px;">
    {{ $applications->links() }}
  </div>
</div>
@endsection
