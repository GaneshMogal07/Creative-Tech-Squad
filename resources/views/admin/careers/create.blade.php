@extends('admin.layouts.master')

@section('title', 'Post New Career Opening')
@section('page_title', 'Create Job Posting')

@section('content')
<div class="admin-card">
  <div class="admin-card-header">
    <div class="admin-card-title">Job Details</div>
    <a href="{{ route('admin.careers.index') }}" class="admin-btn admin-btn-outline admin-btn-sm">&larr; Back</a>
  </div>

  <div class="admin-card-body">
    <form action="{{ route('admin.careers.store') }}" method="POST">
      @csrf
      <div class="admin-form-grid">
        <div class="admin-form-group">
          <label class="admin-label">Job Title *</label>
          <input type="text" name="title" class="admin-input" value="{{ old('title') }}" required>
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Slug (Optional)</label>
          <input type="text" name="slug" class="admin-input" value="{{ old('slug') }}">
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Department *</label>
          <input type="text" name="department" class="admin-input" value="{{ old('department', 'Software Engineering') }}" required>
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Location *</label>
          <input type="text" name="location" class="admin-input" value="{{ old('location', 'Pune / Nashik / Hybrid') }}" required>
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Employment Type *</label>
          <input type="text" name="employment_type" class="admin-input" value="{{ old('employment_type', 'Full-time') }}" required>
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Experience Required *</label>
          <input type="text" name="experience" class="admin-input" value="{{ old('experience', '2 - 4 Years') }}" required>
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Salary Range</label>
          <input type="text" name="salary_range" class="admin-input" value="{{ old('salary_range') }}" placeholder="e.g. ₹6,00,000 - ₹10,00,000 / annum">
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Status *</label>
          <select name="status" class="admin-select" required>
            <option value="active">Active (Accepting Applications)</option>
            <option value="closed">Closed</option>
          </select>
        </div>

        <div class="admin-form-group full-width">
          <label class="admin-label">Job Description / Role Overview *</label>
          <textarea name="description" class="admin-textarea" rows="4" required>{{ old('description') }}</textarea>
        </div>

        <div class="admin-form-group full-width">
          <label class="admin-label">Requirements & Qualifications</label>
          <textarea name="requirements" class="admin-textarea" rows="4">{{ old('requirements') }}</textarea>
        </div>
      </div>

      <div style="margin-top:24px;">
        <button type="submit" class="admin-btn admin-btn-primary">Publish Job Posting</button>
      </div>
    </form>
  </div>
</div>
@endsection
