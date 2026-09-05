@extends('admin.layouts.master')

@section('title', 'Applicants for ' . $career->title)
@section('page_title', 'Job Applicants: ' . $career->title)

@section('content')
<div class="admin-card">
  <div class="admin-card-header">
    <div>
      <div class="admin-card-title">Candidates for {{ $career->title }} ({{ $applications->total() }})</div>
      <p style="font-size:0.85rem; color:#64748B; margin-top:4px;">{{ $career->department }} • {{ $career->location }} • {{ $career->employment_type }}</p>
    </div>
    <div style="display:flex; gap:10px;">
      <a href="{{ route('admin.careers.index') }}" class="admin-btn admin-btn-outline admin-btn-sm">&larr; Back to Careers</a>
      <a href="{{ route('admin.careers.all_applications') }}" class="admin-btn admin-btn-secondary admin-btn-sm">View All Candidates</a>
    </div>
  </div>

  <div class="admin-table-wrapper">
    <table class="admin-table">
      <thead>
        <tr>
          <th>Candidate Name</th>
          <th>Email / Phone</th>
          <th>Cover Note</th>
          <th>Hiring Status</th>
          <th>Resume Document</th>
          <th>Applied Date</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($applications as $app)
          <tr>
            <td><strong>{{ $app->name }}</strong></td>
            <td>
              <div><a href="mailto:{{ $app->email }}" style="color:#007EFA;">{{ $app->email }}</a></div>
              <div style="font-size:0.8rem; color:#64748B;">📞 {{ $app->phone }}</div>
            </td>
            <td>
              <div style="max-width:280px; font-size:0.85rem; color:#475569; line-height:1.4;">
                {{ $app->cover_letter ?? 'No cover note provided.' }}
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
                <a href="{{ asset('storage/' . $app->resume_path) }}" target="_blank" class="admin-btn admin-btn-outline admin-btn-sm" style="display:inline-flex; align-items:center; gap:6px; font-size:0.82rem;">
                  📄 View Resume ↗
                </a>
              @else
                <span style="color:#94A3B8; font-size:0.82rem;">No file</span>
              @endif
            </td>
            <td style="font-size:0.82rem; color:#64748B;">{{ $app->created_at->format('M d, Y') }}</td>
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
          <tr><td colspan="7" style="text-align:center; padding:30px;">No candidates have applied for this position yet.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div style="padding:16px;">
    {{ $applications->links() }}
  </div>
</div>
@endsection
