@extends('admin.layouts.master')

@section('title', 'Contact Messages')
@section('page_title', 'General Contact Messages')

@section('content')
<div class="admin-card">
  <div class="admin-card-header">
    <div class="admin-card-title">All Messages ({{ $messages->total() }})</div>
  </div>

  <div class="admin-table-wrapper">
    <table class="admin-table">
      <thead>
        <tr>
          <th>Sender</th>
          <th>Subject</th>
          <th>Status</th>
          <th>Date</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($messages as $msg)
          <tr>
            <td>
              <strong>{{ $msg->name }}</strong>
              <div style="font-size:0.8rem; color:#64748B;">{{ $msg->email }}</div>
            </td>
            <td>{{ $msg->subject ?? 'No Subject' }}</td>
            <td>
              <span class="admin-badge {{ $msg->status === 'unread' ? 'admin-badge-warning' : 'admin-badge-success' }}">
                {{ ucfirst($msg->status) }}
              </span>
            </td>
            <td style="font-size:0.85rem; color:#64748B;">{{ $msg->created_at->format('M d, Y') }}</td>
            <td>
              <div style="display:flex; gap:8px;">
                <a href="{{ route('admin.contact_messages.show', $msg->id) }}" class="admin-btn admin-btn-outline admin-btn-sm">Read</a>
                <form action="{{ route('admin.contact_messages.destroy', $msg->id) }}" method="POST" onsubmit="return confirm('Delete message?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="admin-btn admin-btn-danger admin-btn-sm">Delete</button>
                </form>
              </div>
            </td>
          </tr>
        @empty
          <tr><td colspan="5" style="text-align:center;">No contact messages received.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div style="padding:16px;">
    {{ $messages->links() }}
  </div>
</div>
@endsection
