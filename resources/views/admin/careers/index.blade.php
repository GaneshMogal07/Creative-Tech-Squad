@extends('admin.layouts.master')

@section('title', 'Manage Careers')
@section('page_title', 'Careers & Job Postings')

@section('content')
<div class="admin-card">
  <div class="admin-card-header">
    <div class="admin-card-title">All Open Positions</div>
    <a href="{{ route('admin.careers.create') }}" class="admin-btn admin-btn-primary">+ Post New Opening</a>
  </div>

  <div class="admin-table-wrapper">
    <table class="admin-table">
      <thead>
        <tr>
          <th>Position Title</th>
          <th>Department</th>
          <th>Location</th>
          <th>Applicants</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($careers as $job)
          <tr>
            <td>
              <strong>{{ $job->title }}</strong>
              <div style="font-size:0.8rem; color:#64748B;">/careers/{{ $job->slug }}</div>
            </td>
            <td><span class="admin-badge admin-badge-purple">{{ $job->department }}</span></td>
            <td>{{ $job->location }}</td>
            <td>
              <a href="{{ route('admin.careers.applications', $job->id) }}" class="admin-badge admin-badge-blue">
                {{ $job->applications_count }} Candidates &rarr;
              </a>
            </td>
            <td>
              <span class="admin-badge {{ $job->status === 'active' ? 'admin-badge-success' : 'admin-badge-warning' }}">
                {{ ucfirst($job->status) }}
              </span>
            </td>
            <td>
              <div style="display:flex; gap:8px;">
                <a href="{{ route('admin.careers.edit', $job->id) }}" class="admin-btn admin-btn-outline admin-btn-sm">Edit</a>
                <form action="{{ route('admin.careers.destroy', $job->id) }}" method="POST" onsubmit="return confirm('Delete this job post?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="admin-btn admin-btn-danger admin-btn-sm">Delete</button>
                </form>
              </div>
            </td>
          </tr>
        @empty
          <tr><td colspan="6" style="text-align:center;">No job postings available.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
