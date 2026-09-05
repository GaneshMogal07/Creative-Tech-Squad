@extends('admin.layouts.master')

@section('title', 'Write New Blog Article')
@section('page_title', 'Create Blog Post')

@section('content')
<div class="admin-card">
  <div class="admin-card-header">
    <div class="admin-card-title">Article Content</div>
    <a href="{{ route('admin.blog.index') }}" class="admin-btn admin-btn-outline admin-btn-sm">&larr; Back</a>
  </div>

  <div class="admin-card-body">
    <form action="{{ route('admin.blog.store') }}" method="POST">
      @csrf
      <div class="admin-form-grid">
        <div class="admin-form-group">
          <label class="admin-label">Article Title *</label>
          <input type="text" name="title" class="admin-input" value="{{ old('title') }}" required>
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Slug (Optional)</label>
          <input type="text" name="slug" class="admin-input" value="{{ old('slug') }}">
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Category *</label>
          <select name="category_id" class="admin-select" required>
            @foreach($categories as $cat)
              <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endforeach
          </select>
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Status *</label>
          <select name="status" class="admin-select" required>
            <option value="published">Published</option>
            <option value="draft">Draft</option>
          </select>
        </div>

        <div class="admin-form-group full-width">
          <label class="admin-label">Excerpt / Summary *</label>
          <textarea name="excerpt" class="admin-textarea" rows="2" required>{{ old('excerpt') }}</textarea>
        </div>

        <div class="admin-form-group full-width">
          <label class="admin-label">Full Article HTML / Markdown Content *</label>
          <textarea name="content" class="admin-textarea" rows="10" required>{{ old('content') }}</textarea>
        </div>

        <div class="admin-form-group">
          <label class="admin-label">SEO Meta Title</label>
          <input type="text" name="meta_title" class="admin-input" value="{{ old('meta_title') }}">
        </div>

        <div class="admin-form-group">
          <label class="admin-label">SEO Meta Description</label>
          <input type="text" name="meta_description" class="admin-input" value="{{ old('meta_description') }}">
        </div>
      </div>

      <div style="margin-top:24px;">
        <button type="submit" class="admin-btn admin-btn-primary">Publish Article</button>
      </div>
    </form>
  </div>
</div>
@endsection
