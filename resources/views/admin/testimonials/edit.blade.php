@extends('admin.layouts.master')

@section('title', 'Edit Testimonial')
@section('page_title', 'Edit Testimonial: ' . $testimonial->name)

@section('content')
<div class="admin-card">
  <div class="admin-card-header">
    <div class="admin-card-title">Edit Testimonial</div>
    <a href="{{ route('admin.testimonials.index') }}" class="admin-btn admin-btn-outline admin-btn-sm">&larr; Back</a>
  </div>

  <div class="admin-card-body">
    <form action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="admin-form-grid">
        <div class="admin-form-group">
          <label class="admin-label">Person / Client Name *</label>
          <input type="text" name="name" class="admin-input" value="{{ old('name', $testimonial->name) }}" required>
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Designation / Role</label>
          <input type="text" name="designation" class="admin-input" value="{{ old('designation', $testimonial->designation) }}">
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Company / Institute Name</label>
          <input type="text" name="company" class="admin-input" value="{{ old('company', $testimonial->company) }}">
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Rating (1-5 Stars) *</label>
          <select name="rating" class="admin-select" required>
            <option value="5" {{ $testimonial->rating == 5 ? 'selected' : '' }}>5 Stars ⭐⭐⭐⭐⭐</option>
            <option value="4" {{ $testimonial->rating == 4 ? 'selected' : '' }}>4 Stars ⭐⭐⭐⭐</option>
            <option value="3" {{ $testimonial->rating == 3 ? 'selected' : '' }}>3 Stars ⭐⭐⭐</option>
          </select>
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Status *</label>
          <select name="status" class="admin-select" required>
            <option value="active" {{ $testimonial->status === 'active' ? 'selected' : '' }}>Active</option>
            <option value="inactive" {{ $testimonial->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
          </select>
        </div>

        <div class="admin-form-group full-width">
          <label class="admin-label">Testimonial Quote / Message *</label>
          <textarea name="message" class="admin-textarea" rows="3" required>{{ old('message', $testimonial->message) }}</textarea>
        </div>
      </div>

      <div style="margin-top:24px;">
        <button type="submit" class="admin-btn admin-btn-primary">Update Testimonial</button>
      </div>
    </form>
  </div>
</div>
@endsection
