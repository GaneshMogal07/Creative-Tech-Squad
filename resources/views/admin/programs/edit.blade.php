@extends('admin.layouts.master')

@section('title', 'Edit Program')
@section('page_title', 'Edit Program: ' . $program->title)

@section('content')
<div class="admin-card">
  <div class="admin-card-header">
    <div class="admin-card-title">Edit Program Details</div>
    <a href="{{ route('admin.programs.index') }}" class="admin-btn admin-btn-outline admin-btn-sm">&larr; Back</a>
  </div>

  <div class="admin-card-body">
    <form action="{{ route('admin.programs.update', $program->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="admin-form-grid">
        <div class="admin-form-group">
          <label class="admin-label">Program Title *</label>
          <input type="text" name="title" class="admin-input" value="{{ old('title', $program->title) }}" required>
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Slug *</label>
          <input type="text" name="slug" class="admin-input" value="{{ old('slug', $program->slug) }}" required>
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Type *</label>
          <input type="text" name="type" class="admin-input" value="{{ old('type', $program->type) }}" required>
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Duration *</label>
          <input type="text" name="duration" class="admin-input" value="{{ old('duration', $program->duration) }}" required>
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Level *</label>
          <input type="text" name="level" class="admin-input" value="{{ old('level', $program->level) }}" required>
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Program Fee</label>
          <input type="text" name="fee" class="admin-input" value="{{ old('fee', $program->fee) }}">
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Status *</label>
          <select name="status" class="admin-select" required>
            <option value="active" {{ $program->status === 'active' ? 'selected' : '' }}>Active</option>
            <option value="inactive" {{ $program->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
          </select>
        </div>

        <div class="admin-form-group full-width">
          <label class="admin-label">Description / Overview *</label>
          <textarea name="description" class="admin-textarea" rows="3" required>{{ old('description', $program->description) }}</textarea>
        </div>

        <div class="admin-form-group full-width">
          <label class="admin-label">Skills & Frameworks (Comma separated)</label>
          <input type="text" name="skills" class="admin-input" value="{{ old('skills', is_array($program->skills) ? implode(', ', $program->skills) : $program->skills) }}">
        </div>

        <div class="admin-form-group full-width">
          <label class="admin-label">Capstone Project Details</label>
          <textarea name="project_details" class="admin-textarea" rows="2">{{ old('project_details', $program->project_details) }}</textarea>
        </div>
      </div>

      <div style="margin-top:24px;">
        <button type="submit" class="admin-btn admin-btn-primary">Update Program</button>
      </div>
    </form>
  </div>
</div>
@endsection
