@extends('admin.layouts.master')

@section('title', 'Manage Blog Posts')
@section('page_title', 'Engineering Articles & Blog')

@section('content')
<div class="admin-card">
  <div class="admin-card-header">
    <div class="admin-card-title">All Articles</div>
    <a href="{{ route('admin.blog.create') }}" class="admin-btn admin-btn-primary">+ Write New Article</a>
  </div>

  <div class="admin-table-wrapper">
    <table class="admin-table">
      <thead>
        <tr>
          <th>Title</th>
          <th>Category</th>
          <th>Author</th>
          <th>Status</th>
          <th>Published</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($posts as $post)
          <tr>
            <td>
              <strong>{{ $post->title }}</strong>
              <div style="font-size:0.8rem; color:#64748B;">/blog/{{ $post->slug }}</div>
            </td>
            <td><span class="admin-badge admin-badge-purple">{{ $post->category->name ?? 'General' }}</span></td>
            <td>{{ $post->author->name ?? 'CTS Team' }}</td>
            <td>
              <span class="admin-badge {{ $post->status === 'published' ? 'admin-badge-success' : 'admin-badge-warning' }}">
                {{ ucfirst($post->status) }}
              </span>
            </td>
            <td style="font-size:0.85rem; color:#64748B;">{{ $post->published_at ? $post->published_at->format('M d, Y') : 'Draft' }}</td>
            <td>
              <div style="display:flex; gap:8px;">
                <a href="{{ route('admin.blog.edit', $post->id) }}" class="admin-btn admin-btn-outline admin-btn-sm">Edit</a>
                <form action="{{ route('admin.blog.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Delete this post?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="admin-btn admin-btn-danger admin-btn-sm">Delete</button>
                </form>
              </div>
            </td>
          </tr>
        @empty
          <tr><td colspan="6" style="text-align:center;">No articles published yet.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div style="padding:16px;">
    {{ $posts->links() }}
  </div>
</div>
@endsection
