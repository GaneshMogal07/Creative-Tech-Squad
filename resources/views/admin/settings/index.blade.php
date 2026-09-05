@extends('admin.layouts.master')

@section('title', 'Site Settings')
@section('page_title', 'Global Website & Brand Settings')

@section('content')
<div class="admin-card">
  <div class="admin-card-header">
    <div class="admin-card-title">Configuration & Brand Parameters</div>
  </div>

  <div class="admin-card-body">
    <form action="{{ route('admin.settings.update') }}" method="POST">
      @csrf

      <h4 style="margin-bottom:16px; color:var(--cts-navy); border-bottom:1px solid #E2E8F0; padding-bottom:8px;">Brand & Organization</h4>
      <div class="admin-form-grid" style="margin-bottom:32px;">
        <div class="admin-form-group">
          <label class="admin-label">Site Name</label>
          <input type="text" name="site_name" class="admin-input" value="{{ $settings['site_name'] ?? 'Creative Tech Squad' }}">
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Domain Name</label>
          <input type="text" name="site_domain" class="admin-input" value="{{ $settings['site_domain'] ?? 'creativetechsquad.in' }}">
        </div>

        <div class="admin-form-group full-width">
          <label class="admin-label">Tagline</label>
          <input type="text" name="site_tagline" class="admin-input" value="{{ $settings['site_tagline'] ?? 'Building smart digital solutions with teamwork, creativity, and technology.' }}">
        </div>
      </div>

      <h4 style="margin-bottom:16px; color:var(--cts-navy); border-bottom:1px solid #E2E8F0; padding-bottom:8px;">Direct Contact Channels</h4>
      <div class="admin-form-grid" style="margin-bottom:32px;">
        <div class="admin-form-group">
          <label class="admin-label">Official Email</label>
          <input type="email" name="contact_email" class="admin-input" value="{{ $settings['contact_email'] ?? 'creativetechsquad.official@gmail.com' }}">
        </div>

        <div class="admin-form-group">
          <label class="admin-label">Official Phone</label>
          <input type="text" name="contact_phone" class="admin-input" value="{{ $settings['contact_phone'] ?? '+91 95119 51568' }}">
        </div>

        <div class="admin-form-group full-width">
          <label class="admin-label">Office / Innovation Hub Address</label>
          <input type="text" name="contact_address" class="admin-input" value="{{ $settings['contact_address'] ?? 'Creative Tech Squad Innovation Hub, Pune / Nashik, Maharashtra, India' }}">
        </div>
      </div>

      <h4 style="margin-bottom:16px; color:var(--cts-navy); border-bottom:1px solid #E2E8F0; padding-bottom:8px;">SEO & Social Profiles</h4>
      <div class="admin-form-grid" style="margin-bottom:32px;">
        <div class="admin-form-group">
          <label class="admin-label">LinkedIn URL</label>
          <input type="url" name="linkedin_url" class="admin-input" value="{{ $settings['linkedin_url'] ?? '' }}">
        </div>

        <div class="admin-form-group">
          <label class="admin-label">GitHub URL</label>
          <input type="url" name="github_url" class="admin-input" value="{{ $settings['github_url'] ?? '' }}">
        </div>

        <div class="admin-form-group full-width">
          <label class="admin-label">Meta Description</label>
          <textarea name="meta_description" class="admin-textarea" rows="2">{{ $settings['meta_description'] ?? '' }}</textarea>
        </div>

        <div class="admin-form-group full-width">
          <label class="admin-label">Meta Keywords (Comma separated)</label>
          <input type="text" name="meta_keywords" class="admin-input" value="{{ $settings['meta_keywords'] ?? '' }}">
        </div>
      </div>

      <div>
        <button type="submit" class="admin-btn admin-btn-primary">Save All Settings</button>
      </div>
    </form>
  </div>
</div>
@endsection
