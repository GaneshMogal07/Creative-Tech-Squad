@extends('admin.layouts.master')

@section('title', 'Internship Applications')
@section('page_title', 'Internship Applications')

@section('content')
<div class="admin-card">
  <div class="admin-card-header">
    <div class="admin-card-title">All Internship Applicants</div>
  </div>

  <div class="admin-table-wrapper">
    <table class="admin-table">
      <thead>
        <tr>
          <th>Applicant</th>
          <th>College / Degree</th>
          <th>Track</th>
          <th>Year</th>
          <th>Status</th>
          <th>Applied Date</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($applications as $app)
          <tr>
            <td>
              <strong>{{ $app->name }}</strong>
              <div style="font-size:0.8rem; color:#64748B;">{{ $app->email }} | {{ $app->phone }}</div>
            </td>
            <td>
              <div>{{ $app->college ?? 'N/A' }}</div>
              <div style="font-size:0.8rem; color:#64748B;">{{ $app->course }}</div>
            </td>
            <td><span class="admin-badge admin-badge-purple">{{ $app->preferred_track }}</span></td>
            <td>{{ $app->graduation_year }}</td>
            <td>
              <span class="admin-badge {{ $app->status === 'pending' ? 'admin-badge-warning' : ($app->status === 'accepted' ? 'admin-badge-success' : 'admin-badge-blue') }}">
                {{ ucfirst(str_replace('_', ' ', $app->status)) }}
              </span>
            </td>
            <td style="font-size:0.85rem; color:#64748B;">{{ $app->created_at->format('M d, Y') }}</td>
            <td>
              <div style="display:flex; gap:8px;">
                <a href="{{ route('admin.internships.show', $app->id) }}" class="admin-btn admin-btn-outline admin-btn-sm">Review</a>
                <form action="{{ route('admin.internships.destroy', $app->id) }}" method="POST" onsubmit="return confirm('Delete this record?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="admin-btn admin-btn-danger admin-btn-sm">Delete</button>
                </form>
              </div>
            </td>
          </tr>
        @empty
          <tr><td colspan="7" style="text-align:center;">No internship applications received yet.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div style="padding:16px;">
    {{ $applications->links() }}
  </div>
</div>
@endsection
