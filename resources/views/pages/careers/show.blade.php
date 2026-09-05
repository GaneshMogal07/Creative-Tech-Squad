@extends('layouts.app')

@section('title', $career->title . ' — Careers | Creative Tech Squad')

@section('content')
<section class="hero-section" style="padding-bottom:40px;">
  <div class="hero-glow"></div>
  <div class="container text-center hero-content container-narrow">
    <a href="{{ route('careers') }}" style="font-size:0.9rem; color:var(--cts-blue); font-weight:600; display:inline-flex; align-items:center; gap:6px; margin-bottom:16px;">
      &larr; Back to all careers
    </a>
    <div style="margin-bottom:12px;">
      <span class="badge badge-purple">{{ $career->department }}</span>
      <span class="badge badge-blue">{{ $career->employment_type }}</span>
    </div>
    <h1 class="hero-title" style="font-size:clamp(2rem, 4.2vw, 3.4rem);">{{ $career->title }}</h1>
    <div style="display:flex; justify-content:center; gap:20px; color:var(--cts-text-muted); font-size:0.95rem;">
      <span>📍 {{ $career->location }}</span>
      <span>💼 {{ $career->experience }}</span>
      @if($career->salary_range)
        <span>💰 {{ $career->salary_range }}</span>
      @endif
    </div>
  </div>
</section>

<section class="section" style="background:var(--cts-white); padding-top:60px;">
  <div class="container container-narrow">
    <div class="card" style="padding:48px; border-radius:var(--cts-radius-xl); box-shadow:var(--cts-shadow-md); margin-bottom:48px;">
      <h2 style="font-size:1.6rem; color:var(--cts-navy); margin-bottom:16px;">Role Overview</h2>
      <p style="font-size:1.05rem; line-height:1.75; color:#334155; margin-bottom:32px;">
        {{ $career->description }}
      </p>

      @if($career->requirements)
        <h3 style="font-size:1.3rem; color:var(--cts-navy); margin-bottom:14px;">Key Requirements & Qualifications</h3>
        <div style="font-size:0.98rem; line-height:1.75; color:#475569; white-space:pre-line; margin-bottom:32px; background:var(--cts-bg); padding:24px; border-radius:12px; border:1px solid var(--cts-border);">
          {{ $career->requirements }}
        </div>
      @endif

      <!-- Job Application Form -->
      <div style="border-top:1px solid var(--cts-border); padding-top:36px;" id="applyForm">
        <h3 style="font-size:1.5rem; color:var(--cts-navy); margin-bottom:8px;">Apply for this Position</h3>
        <p style="color:var(--cts-text-muted); font-size:0.92rem; margin-bottom:24px;">Submit your details and CV. We respond to all applicants within 48 hours.</p>

        <form action="{{ route('careers.apply', $career->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label class="form-label">Full Name *</label>
            <input type="text" name="name" class="form-control" required>
          </div>

          <div class="form-group" style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
            <div>
              <label class="form-label">Email Address *</label>
              <input type="email" name="email" class="form-control" required>
            </div>
            <div>
              <label class="form-label">Phone / WhatsApp *</label>
              <input type="text" name="phone" class="form-control" required>
            </div>
          </div>

          <div class="form-group">
            <label class="form-label">Resume / CV (PDF, DOCX) *</label>
            <input type="file" name="resume" class="form-control" accept=".pdf,.doc,.docx" required>
          </div>

          <div class="form-group">
            <label class="form-label">Cover Note / Why CTS?</label>
            <textarea name="cover_letter" class="form-control" rows="3" placeholder="Highlight your top projects or why you'd be a great fit..."></textarea>
          </div>

          <button type="submit" class="btn btn-primary btn-lg" style="width:100%;">Submit Application</button>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection
