@extends('admin.layouts.master')

@section('title', 'Education Programs')
@section('page_title', 'Education & Cohort Programs')

@section('content')
<div class="admin-card">
  <div class="admin-card-header">
    <div class="admin-card-title">All Training Programs</div>
    <a href="{{ route('admin.programs.create') }}" class="admin-btn admin-btn-primary">+ Add New Program</a>
  </div>

  <div class="admin-table-wrapper">
    <table class="admin-table">
      <thead>
        <tr>
          <th>Program Title</th>
          <th>Duration</th>
          <th>Level</th>
          <th>Fee</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($programs as $prog)
          <tr>
            <td>
              <strong>{{ $prog->title }}</strong>
              <div style="font-size:0.8rem; color:#64748B;">/education/{{ $prog->slug }}</div>
            </td>
            <td><span class="admin-badge admin-badge-purple">{{ $prog->duration }}</span></td>
            <td>{{ $prog->level }}</td>
            <td><strong>{{ $prog->fee ?? 'Free/Scholarship' }}</strong></td>
            <td>
              <span class="admin-badge {{ $prog->status === 'active' ? 'admin-badge-success' : 'admin-badge-warning' }}">
                {{ ucfirst($prog->status) }}
              </span>
            </td>
            <td>
              <div style="display:flex; gap:8px;">
                <a href="{{ route('admin.programs.edit', $prog->id) }}" class="admin-btn admin-btn-outline admin-btn-sm">Edit</a>
                <form action="{{ route('admin.programs.destroy', $prog->id) }}" method="POST" onsubmit="return confirm('Delete this program?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="admin-btn admin-btn-danger admin-btn-sm">Delete</button>
                </form>
              </div>
            </td>
          </tr>
        @empty
          <tr><td colspan="6" style="text-align:center;">No programs added yet.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
