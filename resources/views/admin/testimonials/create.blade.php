@extends('admin.layouts.master')

@section('title', 'Add Testimonial')
@section('page_title', 'Create Testimonial')

@section('content')
<div class="admin-card">
  <div class="admin-card-header">
    <div class="admin-card-title">Testimonial Details</div>
    <a href="{{ route('admin.testimonials.index') }}" class="admin-btn admin-btn-outline admin-btn-sm">&larr; Back</a>
  </div>

  <div class="admin-card-body">
    <form action="{{ route('admin.testimonials.store') }}" method="POST">
      @csrf
      <div class="admin-form-grid">
        <div class="admin-form-group">
          <label class="admin-label">Person / Client Name *</label>
          <input type="text" name="name" class="admin-input" value="{{ old('name') }}" required>
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Designation / Role</label>
          <input type="text" name="designation" class="admin-input" value="{{ old('designation') }}" placeholder="e.g. CTO / Software Intern">
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Company / Institute Name</label>
          <input type="text" name="company" class="admin-input" value="{{ old('company') }}" placeholder="e.g. Apex Industrial Tech">
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Rating (1-5 Stars) *</label>
          <select name="rating" class="admin-select" required>
            <option value="5" selected>5 Stars ⭐⭐⭐⭐⭐</option>
            <option value="4">4 Stars ⭐⭐⭐⭐</option>
            <option value="3">3 Stars ⭐⭐⭐</option>
          </select>
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Status *</label>
          <select name="status" class="admin-select" required>
            <option value="active">Active (Visible)</option>
            <option value="inactive">Inactive</option>
          </select>
        </div>

        <div class="admin-form-group full-width">
          <label class="admin-label">Testimonial Quote / Message *</label>
          <textarea name="message" class="admin-textarea" rows="3" required>{{ old('message') }}</textarea>
        </div>
      </div>

      <div style="margin-top:24px;">
        <button type="submit" class="admin-btn admin-btn-primary">Save Testimonial</button>
      </div>
    </form>
  </div>
</div>
@endsection
