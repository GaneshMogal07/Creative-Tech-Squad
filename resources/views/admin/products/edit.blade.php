@extends('admin.layouts.master')

@section('title', 'Edit Product')
@section('page_title', 'Edit Product: ' . $product->name)

@section('content')
<div class="admin-card">
  <div class="admin-card-header">
    <div class="admin-card-title">Edit Product Details</div>
    <a href="{{ route('admin.products.index') }}" class="admin-btn admin-btn-outline admin-btn-sm">&larr; Back</a>
  </div>

  <div class="admin-card-body">
    <form action="{{ route('admin.products.update', $product->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="admin-form-grid">
        <div class="admin-form-group">
          <label class="admin-label">Product Name *</label>
          <input type="text" name="name" class="admin-input" value="{{ old('name', $product->name) }}" required>
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Slug *</label>
          <input type="text" name="slug" class="admin-input" value="{{ old('slug', $product->slug) }}" required>
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Category *</label>
          <select name="category" class="admin-select" required>
            <option value="ERP" {{ $product->category === 'ERP' ? 'selected' : '' }}>ERP</option>
            <option value="AI" {{ $product->category === 'AI' ? 'selected' : '' }}>AI</option>
            <option value="Business" {{ $product->category === 'Business' ? 'selected' : '' }}>Business</option>
            <option value="Education" {{ $product->category === 'Education' ? 'selected' : '' }}>Education</option>
            <option value="Healthcare" {{ $product->category === 'Healthcare' ? 'selected' : '' }}>Healthcare</option>
            <option value="Other" {{ $product->category === 'Other' ? 'selected' : '' }}>Other</option>
          </select>
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Status *</label>
          <select name="status" class="admin-select" required>
            <option value="published" {{ $product->status === 'published' ? 'selected' : '' }}>Published</option>
            <option value="draft" {{ $product->status === 'draft' ? 'selected' : '' }}>Draft</option>
          </select>
        </div>

        <div class="admin-form-group full-width">
          <label class="admin-label">Short Description *</label>
          <textarea name="short_description" class="admin-textarea" rows="2" required>{{ old('short_description', $product->short_description) }}</textarea>
        </div>

        <div class="admin-form-group full-width">
          <label class="admin-label">Full Description *</label>
          <textarea name="description" class="admin-textarea" rows="5" required>{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Key Features (Newline/comma separated)</label>
          <textarea name="features" class="admin-textarea" rows="3">{{ old('features', is_array($product->features) ? implode("\n", $product->features) : $product->features) }}</textarea>
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Technology Stack (Comma separated)</label>
          <input type="text" name="technology_stack" class="admin-input" value="{{ old('technology_stack', is_array($product->technology_stack) ? implode(', ', $product->technology_stack) : $product->technology_stack) }}">
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Demo URL</label>
          <input type="url" name="demo_url" class="admin-input" value="{{ old('demo_url', $product->demo_url) }}" placeholder="https://">
        </div>

        <div class="admin-form-group" style="display:flex; align-items:center; gap:8px; margin-top:28px;">
          <input type="checkbox" name="is_featured" value="1" id="is_featured" {{ $product->is_featured ? 'checked' : '' }}>
          <label for="is_featured" style="font-weight:600;">Mark as Featured on Homepage</label>
        </div>
      </div>

      <div style="margin-top:24px;">
        <button type="submit" class="admin-btn admin-btn-primary">Update Product</button>
      </div>
    </form>
  </div>
</div>
@endsection
