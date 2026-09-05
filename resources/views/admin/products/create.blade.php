@extends('admin.layouts.master')

@section('title', 'Add New Product')
@section('page_title', 'Create Product')

@section('content')
<div class="admin-card">
  <div class="admin-card-header">
    <div class="admin-card-title">Product Details</div>
    <a href="{{ route('admin.products.index') }}" class="admin-btn admin-btn-outline admin-btn-sm">&larr; Back</a>
  </div>

  <div class="admin-card-body">
    <form action="{{ route('admin.products.store') }}" method="POST">
      @csrf
      <div class="admin-form-grid">
        <div class="admin-form-group">
          <label class="admin-label">Product Name *</label>
          <input type="text" name="name" class="admin-input" value="{{ old('name') }}" required>
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Slug (Optional, auto-generated)</label>
          <input type="text" name="slug" class="admin-input" value="{{ old('slug') }}">
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Category *</label>
          <select name="category" class="admin-select" required>
            <option value="ERP">ERP</option>
            <option value="AI">AI</option>
            <option value="Business">Business</option>
            <option value="Education">Education</option>
            <option value="Healthcare">Healthcare</option>
            <option value="Other">Other</option>
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
          <label class="admin-label">Short Description *</label>
          <textarea name="short_description" class="admin-textarea" rows="2" required>{{ old('short_description') }}</textarea>
        </div>

        <div class="admin-form-group full-width">
          <label class="admin-label">Full Description *</label>
          <textarea name="description" class="admin-textarea" rows="5" required>{{ old('description') }}</textarea>
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Key Features (One per line or comma separated)</label>
          <textarea name="features" class="admin-textarea" rows="3">{{ old('features') }}</textarea>
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Technology Stack (Comma-separated: Laravel, MySQL, Redis...)</label>
          <input type="text" name="technology_stack" class="admin-input" value="{{ old('technology_stack') }}">
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Demo URL</label>
          <input type="url" name="demo_url" class="admin-input" value="{{ old('demo_url') }}" placeholder="https://">
        </div>

        <div class="admin-form-group" style="display:flex; align-items:center; gap:8px; margin-top:28px;">
          <input type="checkbox" name="is_featured" value="1" id="is_featured">
          <label for="is_featured" style="font-weight:600;">Mark as Featured on Homepage</label>
        </div>
      </div>

      <div style="margin-top:24px;">
        <button type="submit" class="admin-btn admin-btn-primary">Save & Publish Product</button>
      </div>
    </form>
  </div>
</div>
@endsection
