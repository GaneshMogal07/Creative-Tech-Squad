@extends('admin.layouts.master')

@section('title', 'Add Education Program')
@section('page_title', 'Create Program')

@section('content')
<div class="admin-card">
  <div class="admin-card-header">
    <div class="admin-card-title">Program Curriculum & Details</div>
    <a href="{{ route('admin.programs.index') }}" class="admin-btn admin-btn-outline admin-btn-sm">&larr; Back</a>
  </div>

  <div class="admin-card-body">
    <form action="{{ route('admin.programs.store') }}" method="POST">
      @csrf
      <div class="admin-form-grid">
        <div class="admin-form-group">
          <label class="admin-label">Program Title *</label>
          <input type="text" name="title" class="admin-input" value="{{ old('title') }}" required>
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Type *</label>
          <input type="text" name="type" class="admin-input" value="{{ old('type', 'Course & Internship') }}" required>
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Duration *</label>
          <input type="text" name="duration" class="admin-input" value="{{ old('duration', '3 Months') }}" required>
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Level *</label>
          <input type="text" name="level" class="admin-input" value="{{ old('level', 'Beginner to Advanced') }}" required>
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Program Fee (e.g. ₹14,999)</label>
          <input type="text" name="fee" class="admin-input" value="{{ old('fee') }}">
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Status *</label>
          <select name="status" class="admin-select" required>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
          </select>
        </div>

        <div class="admin-form-group full-width">
          <label class="admin-label">Description / Overview *</label>
          <textarea name="description" class="admin-textarea" rows="3" required>{{ old('description') }}</textarea>
        </div>

        <div class="admin-form-group full-width">
          <label class="admin-label">Skills & Frameworks (Comma separated)</label>
          <input type="text" name="skills" class="admin-input" value="{{ old('skills') }}" placeholder="Laravel 11, MySQL, REST APIs, Blade, Git...">
        </div>

        <div class="admin-form-group full-width">
          <label class="admin-label">Capstone Project Details</label>
          <textarea name="project_details" class="admin-textarea" rows="2">{{ old('project_details') }}</textarea>
        </div>
      </div>

      <div style="margin-top:24px;">
        <button type="submit" class="admin-btn admin-btn-primary">Save Program</button>
      </div>
    </form>
  </div>
</div>
@endsection
