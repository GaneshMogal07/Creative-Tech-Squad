@extends('admin.layouts.master')

@section('title', 'Add New Service')
@section('page_title', 'Create Service')

@section('content')
<div class="admin-card">
  <div class="admin-card-header">
    <div class="admin-card-title">Service Details</div>
    <a href="{{ route('admin.services.index') }}" class="admin-btn admin-btn-outline admin-btn-sm">&larr; Back</a>
  </div>

  <div class="admin-card-body">
    <form action="{{ route('admin.services.store') }}" method="POST">
      @csrf
      <div class="admin-form-grid">
        <div class="admin-form-group">
          <label class="admin-label">Service Title *</label>
          <input type="text" name="title" class="admin-input" value="{{ old('title') }}" required>
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Slug (Optional)</label>
          <input type="text" name="slug" class="admin-input" value="{{ old('slug') }}">
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Display Order (Sort)</label>
          <input type="number" name="sort_order" class="admin-input" value="{{ old('sort_order', 0) }}">
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Status *</label>
          <select name="status" class="admin-select" required>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
          </select>
        </div>

        <div class="admin-form-group full-width">
          <label class="admin-label">Short Description *</label>
          <textarea name="short_description" class="admin-textarea" rows="2" required>{{ old('short_description') }}</textarea>
        </div>

        <div class="admin-form-group full-width">
          <label class="admin-label">Full Overview & Deliverables *</label>
          <textarea name="description" class="admin-textarea" rows="5" required>{{ old('description') }}</textarea>
        </div>
      </div>

      <div style="margin-top:24px;">
        <button type="submit" class="admin-btn admin-btn-primary">Save Service</button>
      </div>
    </form>
  </div>
</div>
@endsection
