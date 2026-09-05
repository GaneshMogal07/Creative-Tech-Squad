@extends('admin.layouts.master')

@section('title', 'Edit Case Study')
@section('page_title', 'Edit Project: ' . $project->title)

@section('content')
<div class="admin-card">
  <div class="admin-card-header">
    <div class="admin-card-title">Edit Case Study</div>
    <a href="{{ route('admin.projects.index') }}" class="admin-btn admin-btn-outline admin-btn-sm">&larr; Back</a>
  </div>

  <div class="admin-card-body">
    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="admin-form-grid">
        <div class="admin-form-group">
          <label class="admin-label">Project Title *</label>
          <input type="text" name="title" class="admin-input" value="{{ old('title', $project->title) }}" required>
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Client Name</label>
          <input type="text" name="client_name" class="admin-input" value="{{ old('client_name', $project->client_name) }}">
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Category *</label>
          <select name="category" class="admin-select" required>
            <option value="ERP" {{ $project->category === 'ERP' ? 'selected' : '' }}>ERP</option>
            <option value="AI" {{ $project->category === 'AI' ? 'selected' : '' }}>AI</option>
            <option value="Business" {{ $project->category === 'Business' ? 'selected' : '' }}>Business</option>
            <option value="Education" {{ $project->category === 'Education' ? 'selected' : '' }}>Education</option>
          </select>
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Status *</label>
          <select name="status" class="admin-select" required>
            <option value="published" {{ $project->status === 'published' ? 'selected' : '' }}>Published</option>
            <option value="draft" {{ $project->status === 'draft' ? 'selected' : '' }}>Draft</option>
          </select>
        </div>

        <div class="admin-form-group full-width">
          <label class="admin-label">Summary / Description *</label>
          <textarea name="description" class="admin-textarea" rows="3" required>{{ old('description', $project->description) }}</textarea>
        </div>

        <div class="admin-form-group full-width">
          <label class="admin-label">Client Challenge</label>
          <textarea name="challenge" class="admin-textarea" rows="3">{{ old('challenge', $project->challenge) }}</textarea>
        </div>

        <div class="admin-form-group full-width">
          <label class="admin-label">Our Engineering Solution</label>
          <textarea name="solution" class="admin-textarea" rows="3">{{ old('solution', $project->solution) }}</textarea>
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Technologies (Comma separated)</label>
          <input type="text" name="technology_stack" class="admin-input" value="{{ old('technology_stack', is_array($project->technology_stack) ? implode(', ', $project->technology_stack) : $project->technology_stack) }}">
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Live Project URL</label>
          <input type="url" name="project_url" class="admin-input" value="{{ old('project_url', $project->project_url) }}">
        </div>

        <div class="admin-form-group" style="display:flex; align-items:center; gap:8px; margin-top:28px;">
          <input type="checkbox" name="is_featured" value="1" id="is_featured" {{ $project->is_featured ? 'checked' : '' }}>
          <label for="is_featured" style="font-weight:600;">Feature on Homepage</label>
        </div>
      </div>

      <div style="margin-top:24px;">
        <button type="submit" class="admin-btn admin-btn-primary">Update Project</button>
      </div>
    </form>
  </div>
</div>
@endsection
