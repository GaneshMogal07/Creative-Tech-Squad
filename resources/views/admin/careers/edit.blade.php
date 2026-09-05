@extends('admin.layouts.master')

@section('title', 'Edit Job Posting')
@section('page_title', 'Edit Position: ' . $career->title)

@section('content')
<div class="admin-card">
  <div class="admin-card-header">
    <div class="admin-card-title">Edit Position</div>
    <a href="{{ route('admin.careers.index') }}" class="admin-btn admin-btn-outline admin-btn-sm">&larr; Back</a>
  </div>

  <div class="admin-card-body">
    <form action="{{ route('admin.careers.update', $career->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="admin-form-grid">
        <div class="admin-form-group">
          <label class="admin-label">Job Title *</label>
          <input type="text" name="title" class="admin-input" value="{{ old('title', $career->title) }}" required>
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Slug *</label>
          <input type="text" name="slug" class="admin-input" value="{{ old('slug', $career->slug) }}" required>
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Department *</label>
          <input type="text" name="department" class="admin-input" value="{{ old('department', $career->department) }}" required>
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Location *</label>
          <input type="text" name="location" class="admin-input" value="{{ old('location', $career->location) }}" required>
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Employment Type *</label>
          <input type="text" name="employment_type" class="admin-input" value="{{ old('employment_type', $career->employment_type) }}" required>
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Experience Required *</label>
          <input type="text" name="experience" class="admin-input" value="{{ old('experience', $career->experience) }}" required>
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Salary Range</label>
          <input type="text" name="salary_range" class="admin-input" value="{{ old('salary_range', $career->salary_range) }}">
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Status *</label>
          <select name="status" class="admin-select" required>
            <option value="active" {{ $career->status === 'active' ? 'selected' : '' }}>Active</option>
            <option value="closed" {{ $career->status === 'closed' ? 'selected' : '' }}>Closed</option>
          </select>
        </div>

        <div class="admin-form-group full-width">
          <label class="admin-label">Job Description *</label>
          <textarea name="description" class="admin-textarea" rows="4" required>{{ old('description', $career->description) }}</textarea>
        </div>

        <div class="admin-form-group full-width">
          <label class="admin-label">Requirements</label>
          <textarea name="requirements" class="admin-textarea" rows="4">{{ old('requirements', $career->requirements) }}</textarea>
        </div>
      </div>

      <div style="margin-top:24px;">
        <button type="submit" class="admin-btn admin-btn-primary">Update Job Posting</button>
      </div>
    </form>
  </div>
</div>
@endsection
