@extends('admin.layouts.master')

@section('title', 'Manage Services & Solutions')
@section('page_title', 'Services & Solutions')

@section('content')
<div class="admin-card">
  <div class="admin-card-header">
    <div class="admin-card-title">All Services</div>
    <a href="{{ route('admin.services.create') }}" class="admin-btn admin-btn-primary">+ Add New Service</a>
  </div>

  <div class="admin-table-wrapper">
    <table class="admin-table">
      <thead>
        <tr>
          <th>Title</th>
          <th>Order</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($services as $srv)
          <tr>
            <td>
              <strong>{{ $srv->title }}</strong>
              <div style="font-size:0.8rem; color:#64748B;">/solutions/{{ $srv->slug }}</div>
            </td>
            <td>{{ $srv->sort_order }}</td>
            <td>
              <span class="admin-badge {{ $srv->status === 'active' ? 'admin-badge-success' : 'admin-badge-warning' }}">
                {{ ucfirst($srv->status) }}
              </span>
            </td>
            <td>
              <div style="display:flex; gap:8px;">
                <a href="{{ route('admin.services.edit', $srv->id) }}" class="admin-btn admin-btn-outline admin-btn-sm">Edit</a>
                <form action="{{ route('admin.services.destroy', $srv->id) }}" method="POST" onsubmit="return confirm('Delete this service?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="admin-btn admin-btn-danger admin-btn-sm">Delete</button>
                </form>
              </div>
            </td>
          </tr>
        @empty
          <tr><td colspan="4" style="text-align:center;">No services added yet.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
