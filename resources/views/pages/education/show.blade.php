@extends('layouts.app')

@section('title', $program->title . ' — Creative Tech Squad Education')

@section('content')
<section class="hero-section" style="padding-bottom:40px;">
  <div class="hero-glow"></div>
  <div class="container text-center hero-content container-narrow">
    <a href="{{ route('education') }}" style="font-size:0.9rem; color:var(--cts-blue); font-weight:600; display:inline-flex; align-items:center; gap:6px; margin-bottom:16px;">
      &larr; Back to all programs
    </a>
    <div style="margin-bottom:12px;">
      <span class="badge badge-purple">{{ $program->duration }}</span>
      <span class="badge badge-blue">{{ $program->level }}</span>
    </div>
    <h1 class="hero-title" style="font-size:clamp(2rem, 4.2vw, 3.4rem);">{{ $program->title }}</h1>
    <p class="section-subtitle mx-auto">
      {{ $program->description }}
    </p>

    <div style="display:flex; justify-content:center; gap:16px; flex-wrap:wrap;">
      <button onclick="openModal('enrollProgramModal')" class="btn btn-gradient btn-lg">
        Enroll in This Cohort
      </button>
      <a href="{{ route('internships') }}" class="btn btn-secondary btn-lg">
        Apply as Intern
      </a>
    </div>
  </div>
</section>

<section class="section" style="background:var(--cts-white); padding-top:60px;">
  <div class="container container-narrow">
    <div class="card" style="padding:48px; border-radius:var(--cts-radius-xl); box-shadow:var(--cts-shadow-md); margin-bottom:40px;">
      <h2 style="font-size:1.7rem; margin-bottom:20px; color:var(--cts-navy);">Curriculum Structure & Outcomes</h2>
      <p style="font-size:1.05rem; line-height:1.7; color:#334155; margin-bottom:32px;">
        Unlike surface-level tutorials, this program requires building full software layers: database modeling, API development, asynchronous background workers, authentication guards, and live production deployments.
      </p>

      @if(!empty($program->skills))
        <div style="margin-bottom:32px;">
          <h3 style="font-size:1.25rem; margin-bottom:14px; color:var(--cts-navy);">Technologies & Frameworks Mastered</h3>
          <div style="display:flex; flex-wrap:wrap; gap:8px;">
            @foreach($program->skills as $skill)
              <span class="tech-pill">{{ $skill }}</span>
            @endforeach
          </div>
        </div>
      @endif

      @if($program->project_details)
        <div style="background:var(--cts-bg); padding:28px; border-radius:14px; border:1px solid var(--cts-border); margin-bottom:32px;">
          <h3 style="font-size:1.2rem; color:var(--cts-navy); margin-bottom:10px;">Cap-stone Production Project</h3>
          <p style="color:#475569; font-size:0.95rem; line-height:1.6; margin:0;">{{ $program->project_details }}</p>
        </div>
      @endif

      <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:20px; border-top:1px solid var(--cts-border); padding-top:24px;">
        <div>
          <div style="font-size:0.85rem; color:#64748B;">Program Fee</div>
          <div style="font-size:1.4rem; font-weight:800; color:var(--cts-navy);">{{ $program->fee ?? 'Scholarships Open' }}</div>
        </div>
        <button onclick="openModal('enrollProgramModal')" class="btn btn-primary">Enroll Now</button>
      </div>
    </div>
  </div>
</section>

<!-- Program Enrollment Modal -->
<div class="modal-backdrop" id="enrollProgramModal">
  <div class="modal-dialog">
    <button class="modal-close" onclick="closeModal('enrollProgramModal')">&times;</button>
    <div style="margin-bottom:20px;">
      <span class="eyebrow">Cohort Enrollment</span>
      <h3 style="font-size:1.5rem; margin-bottom:6px;">{{ $program->title }}</h3>
      <p style="color:#64748B; font-size:0.92rem;">Fill in your details to secure your seat and receive the detailed syllabus PDF.</p>
    </div>

    <form action="{{ route('contact.store') }}" method="POST">
      @csrf
      <input type="hidden" name="inquiry_type" value="Education: {{ $program->title }}">
      
      <div class="form-group">
        <label class="form-label">Full Name *</label>
        <input type="text" name="name" class="form-control" required>
      </div>

      <div class="form-group" style="display:grid; grid-template-columns:1fr 1fr; gap:14px;">
        <div>
          <label class="form-label">Email *</label>
          <input type="email" name="email" class="form-control" required>
        </div>
        <div>
          <label class="form-label">WhatsApp / Phone *</label>
          <input type="text" name="phone" class="form-control" required>
        </div>
      </div>

      <div class="form-group">
        <label class="form-label">College / Current Role</label>
        <input type="text" name="company" class="form-control" placeholder="e.g. Pune University / Final Year Student">
      </div>

      <div class="form-group">
        <label class="form-label">What is your learning goal? *</label>
        <textarea name="message" class="form-control" rows="3" placeholder="Tell us your background and what you hope to build..." required></textarea>
      </div>

      <button type="submit" class="btn btn-primary" style="width:100%;">Submit Enrollment Request</button>
    </form>
  </div>
</div>
@endsection
