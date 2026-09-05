@extends('admin.layouts.master')

@section('title', 'Manage Testimonials')
@section('page_title', 'Client & Student Testimonials')

@section('content')
<div class="admin-card">
  <div class="admin-card-header">
    <div class="admin-card-title">All Testimonials</div>
    <a href="{{ route('admin.testimonials.create') }}" class="admin-btn admin-btn-primary">+ Add Testimonial</a>
  </div>

  <div class="admin-table-wrapper">
    <table class="admin-table">
      <thead>
        <tr>
          <th>Name / Client</th>
          <th>Designation / Company</th>
          <th>Rating</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($testimonials as $tst)
          <tr>
            <td><strong>{{ $tst->name }}</strong></td>
            <td>{{ $tst->designation }} • {{ $tst->company }}</td>
            <td>{{ str_repeat('⭐', $tst->rating) }}</td>
            <td>
              <span class="admin-badge {{ $tst->status === 'active' ? 'admin-badge-success' : 'admin-badge-warning' }}">
                {{ ucfirst($tst->status) }}
              </span>
            </td>
            <td>
              <div style="display:flex; gap:8px;">
                <a href="{{ route('admin.testimonials.edit', $tst->id) }}" class="admin-btn admin-btn-outline admin-btn-sm">Edit</a>
                <form action="{{ route('admin.testimonials.destroy', $tst->id) }}" method="POST" onsubmit="return confirm('Delete testimonial?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="admin-btn admin-btn-danger admin-btn-sm">Delete</button>
                </form>
              </div>
            </td>
          </tr>
        @empty
          <tr><td colspan="5" style="text-align:center;">No testimonials added yet.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
