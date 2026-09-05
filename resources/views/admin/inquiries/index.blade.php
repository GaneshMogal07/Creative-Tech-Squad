@extends('admin.layouts.master')

@section('title', 'Project & Business Inquiries')
@section('page_title', 'Project Inquiries & Leads')

@section('content')
<div class="admin-card">
  <div class="admin-card-header">
    <div class="admin-card-title">All Inquiries ({{ $inquiries->total() }})</div>
    <div style="display:flex; gap:8px;">
      <a href="{{ route('admin.inquiries.index') }}" class="admin-btn admin-btn-outline admin-btn-sm {{ empty($status) || $status === 'all' ? 'admin-btn-primary' : '' }}">All</a>
      <a href="{{ route('admin.inquiries.index', ['status' => 'new']) }}" class="admin-btn admin-btn-outline admin-btn-sm {{ $status === 'new' ? 'admin-btn-primary' : '' }}">New</a>
      <a href="{{ route('admin.inquiries.index', ['status' => 'in_progress']) }}" class="admin-btn admin-btn-outline admin-btn-sm {{ $status === 'in_progress' ? 'admin-btn-primary' : '' }}">In Progress</a>
      <a href="{{ route('admin.inquiries.index', ['status' => 'contacted']) }}" class="admin-btn admin-btn-outline admin-btn-sm {{ $status === 'contacted' ? 'admin-btn-primary' : '' }}">Contacted</a>
    </div>
  </div>

  <div class="admin-table-wrapper">
    <table class="admin-table">
      <thead>
        <tr>
          <th>Contact</th>
          <th>Company</th>
          <th>Focus</th>
          <th>Budget</th>
          <th>Status</th>
          <th>Received</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($inquiries as $inq)
          <tr>
            <td>
              <strong>{{ $inq->name }}</strong>
              <div style="font-size:0.8rem; color:#64748B;">{{ $inq->email }} | {{ $inq->phone }}</div>
            </td>
            <td>{{ $inq->company ?? 'N/A' }}</td>
            <td><span class="admin-badge admin-badge-blue">{{ $inq->inquiry_type }}</span></td>
            <td>{{ $inq->budget_range ?? 'Unspecified' }}</td>
            <td>
              <span class="admin-badge {{ $inq->status === 'new' ? 'admin-badge-warning' : ($inq->status === 'closed' ? 'admin-badge-purple' : 'admin-badge-success') }}">
                {{ ucfirst(str_replace('_', ' ', $inq->status)) }}
              </span>
            </td>
            <td style="font-size:0.85rem; color:#64748B;">{{ $inq->created_at->format('M d, Y') }}</td>
            <td>
              <div style="display:flex; gap:8px;">
                <a href="{{ route('admin.inquiries.show', $inq->id) }}" class="admin-btn admin-btn-outline admin-btn-sm">View</a>
                <form action="{{ route('admin.inquiries.destroy', $inq->id) }}" method="POST" onsubmit="return confirm('Delete this inquiry?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="admin-btn admin-btn-danger admin-btn-sm">Delete</button>
                </form>
              </div>
            </td>
          </tr>
        @empty
          <tr><td colspan="7" style="text-align:center;">No inquiries found.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div style="padding:16px;">
    {{ $inquiries->links() }}
  </div>
</div>
@endsection
