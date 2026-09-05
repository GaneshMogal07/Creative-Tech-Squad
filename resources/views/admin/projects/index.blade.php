@extends('admin.layouts.master')

@section('title', 'Portfolio Projects')
@section('page_title', 'Portfolio Case Studies')

@section('content')
<div class="admin-card">
  <div class="admin-card-header">
    <div class="admin-card-title">All Portfolio Case Studies</div>
    <a href="{{ route('admin.projects.create') }}" class="admin-btn admin-btn-primary">+ Add New Project</a>
  </div>

  <div class="admin-table-wrapper">
    <table class="admin-table">
      <thead>
        <tr>
          <th>Title</th>
          <th>Client</th>
          <th>Category</th>
          <th>Status</th>
          <th>Featured</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($projects as $prj)
          <tr>
            <td>
              <strong>{{ $prj->title }}</strong>
              <div style="font-size:0.8rem; color:#64748B;">/portfolio/{{ $prj->slug }}</div>
            </td>
            <td>{{ $prj->client_name ?? 'N/A' }}</td>
            <td><span class="admin-badge admin-badge-blue">{{ $prj->category }}</span></td>
            <td>
              <span class="admin-badge {{ $prj->status === 'published' ? 'admin-badge-success' : 'admin-badge-warning' }}">
                {{ ucfirst($prj->status) }}
              </span>
            </td>
            <td>
              @if($prj->is_featured)
                <span class="admin-badge admin-badge-purple">Featured</span>
              @else
                <span style="color:#94A3B8; font-size:0.85rem;">Standard</span>
              @endif
            </td>
            <td>
              <div style="display:flex; gap:8px;">
                <a href="{{ route('admin.projects.edit', $prj->id) }}" class="admin-btn admin-btn-outline admin-btn-sm">Edit</a>
                <form action="{{ route('admin.projects.destroy', $prj->id) }}" method="POST" onsubmit="return confirm('Delete this project?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="admin-btn admin-btn-danger admin-btn-sm">Delete</button>
                </form>
              </div>
            </td>
          </tr>
        @empty
          <tr><td colspan="6" style="text-align:center;">No projects added yet.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
