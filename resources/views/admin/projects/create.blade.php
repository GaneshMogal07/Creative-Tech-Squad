@extends('admin.layouts.master')

@section('title', 'Add New Case Study')
@section('page_title', 'Create Portfolio Project')

@section('content')
<div class="admin-card">
  <div class="admin-card-header">
    <div class="admin-card-title">Case Study Details</div>
    <a href="{{ route('admin.projects.index') }}" class="admin-btn admin-btn-outline admin-btn-sm">&larr; Back</a>
  </div>

  <div class="admin-card-body">
    <form action="{{ route('admin.projects.store') }}" method="POST">
      @csrf
      <div class="admin-form-grid">
        <div class="admin-form-group">
          <label class="admin-label">Project Title *</label>
          <input type="text" name="title" class="admin-input" value="{{ old('title') }}" required>
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Client Name</label>
          <input type="text" name="client_name" class="admin-input" value="{{ old('client_name') }}">
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Category *</label>
          <select name="category" class="admin-select" required>
            <option value="ERP">ERP</option>
            <option value="AI">AI</option>
            <option value="Business">Business</option>
            <option value="Education">Education</option>
          </select>
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Status *</label>
          <select name="status" class="admin-select" required>
            <option value="published">Published</option>
            <option value="draft">Draft</option>
          </select>
        </div>

        <div class="admin-form-group full-width">
          <label class="admin-label">Summary / Description *</label>
          <textarea name="description" class="admin-textarea" rows="3" required>{{ old('description') }}</textarea>
        </div>

        <div class="admin-form-group full-width">
          <label class="admin-label">Client Challenge</label>
          <textarea name="challenge" class="admin-textarea" rows="3">{{ old('challenge') }}</textarea>
        </div>

        <div class="admin-form-group full-width">
          <label class="admin-label">Our Engineering Solution</label>
          <textarea name="solution" class="admin-textarea" rows="3">{{ old('solution') }}</textarea>
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Technologies (Comma separated: Laravel, MySQL, Docker...)</label>
          <input type="text" name="technology_stack" class="admin-input" value="{{ old('technology_stack') }}">
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Live Project URL</label>
          <input type="url" name="project_url" class="admin-input" value="{{ old('project_url') }}">
        </div>

        <div class="admin-form-group" style="display:flex; align-items:center; gap:8px; margin-top:28px;">
          <input type="checkbox" name="is_featured" value="1" id="is_featured">
          <label for="is_featured" style="font-weight:600;">Feature on Homepage</label>
        </div>
      </div>

      <div style="margin-top:24px;">
        <button type="submit" class="admin-btn admin-btn-primary">Publish Project</button>
      </div>
    </form>
  </div>
</div>
@endsection
