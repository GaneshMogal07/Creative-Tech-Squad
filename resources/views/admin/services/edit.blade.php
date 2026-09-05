@extends('admin.layouts.master')

@section('title', 'Edit Service')
@section('page_title', 'Edit Service: ' . $service->title)

@section('content')
<div class="admin-card">
  <div class="admin-card-header">
    <div class="admin-card-title">Edit Service Details</div>
    <a href="{{ route('admin.services.index') }}" class="admin-btn admin-btn-outline admin-btn-sm">&larr; Back</a>
  </div>

  <div class="admin-card-body">
    <form action="{{ route('admin.services.update', $service->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="admin-form-grid">
        <div class="admin-form-group">
          <label class="admin-label">Service Title *</label>
          <input type="text" name="title" class="admin-input" value="{{ old('title', $service->title) }}" required>
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Slug *</label>
          <input type="text" name="slug" class="admin-input" value="{{ old('slug', $service->slug) }}" required>
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Display Order (Sort)</label>
          <input type="number" name="sort_order" class="admin-input" value="{{ old('sort_order', $service->sort_order) }}">
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Status *</label>
          <select name="status" class="admin-select" required>
            <option value="active" {{ $service->status === 'active' ? 'selected' : '' }}>Active</option>
            <option value="inactive" {{ $service->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
          </select>
        </div>

        <div class="admin-form-group full-width">
          <label class="admin-label">Short Description *</label>
          <textarea name="short_description" class="admin-textarea" rows="2" required>{{ old('short_description', $service->short_description) }}</textarea>
        </div>

        <div class="admin-form-group full-width">
          <label class="admin-label">Full Overview & Deliverables *</label>
          <textarea name="description" class="admin-textarea" rows="5" required>{{ old('description', $service->description) }}</textarea>
        </div>
      </div>

      <div style="margin-top:24px;">
        <button type="submit" class="admin-btn admin-btn-primary">Update Service</button>
      </div>
    </form>
  </div>
</div>
@endsection
