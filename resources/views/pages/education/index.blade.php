@extends('layouts.app')

@section('title', 'Education & Practical Engineering Programs — Creative Tech Squad')

@section('content')
<section class="hero-section text-center">
  <div class="container container-narrow">
    <span class="eyebrow">CTS Academy</span>
    <h1 class="hero-title">Learn Software Engineering by <br><span class="gradient-accent">Building Real Platforms.</span></h1>
    <p class="section-subtitle mx-auto">
      Hands-on development programs covering Laravel, Java Spring Boot, Angular, and practical AI application engineering.
    </p>

    <div style="display:flex; justify-content:center; gap:16px;">
      <a href="{{ route('internships') }}" class="btn btn-primary btn-lg">Explore Internship Tracks</a>
    </div>
  </div>
</section>

<section class="section" style="padding-bottom:100px;">
  <div class="container">
    <div class="grid grid-2">
      @foreach($programs as $prog)
        <div class="card" style="display:flex; flex-direction:column; justify-content:space-between;">
          <div>
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px;">
              <span class="badge badge-purple">{{ $prog->duration }}</span>
              <span class="badge badge-blue">{{ $prog->level }}</span>
            </div>

            <h3 style="font-size:1.45rem; font-weight:700; margin-bottom:12px; color:var(--apple-text-primary);">{{ $prog->title }}</h3>
            <p style="color:var(--apple-text-secondary); font-size:0.98rem; line-height:1.6; margin-bottom:20px;">
              {{ $prog->description }}
            </p>

            @if(!empty($prog->skills))
              <div style="margin-bottom:20px;">
                <div style="font-size:0.75rem; font-weight:700; text-transform:uppercase; color:var(--apple-text-muted); margin-bottom:8px; letter-spacing:0.04em;">Core Skills Covered</div>
                <div style="display:flex; flex-wrap:wrap; gap:6px;">
                  @foreach($prog->skills as $s)
                    <span style="font-size:0.78rem; background:#f0f0f2; padding:4px 10px; border-radius:980px; font-weight:600; color:var(--apple-text-primary);">{{ $s }}</span>
                  @endforeach
                </div>
              </div>
            @endif

            @if($prog->project_details)
              <div style="background:var(--apple-bg); padding:16px; border-radius:12px; border:1px solid var(--apple-border-light); margin-bottom:24px;">
                <div style="font-size:0.82rem; font-weight:700; color:var(--apple-text-primary); margin-bottom:4px;">Cap-stone Capable Project:</div>
                <p style="font-size:0.9rem; color:var(--apple-text-secondary); margin:0;">{{ $prog->project_details }}</p>
              </div>
            @endif
          </div>

          <div style="display:flex; justify-content:space-between; align-items:center; border-top:1px solid var(--apple-border-light); padding-top:20px; margin-top:auto;">
            <div>
              <div style="font-size:0.8rem; color:var(--apple-text-muted);">Program Investment</div>
              <div style="font-size:1.15rem; font-weight:800; color:var(--apple-text-primary);">{{ $prog->fee ?? 'Scholarships Open' }}</div>
            </div>
            <a href="{{ route('education.show', $prog->slug) }}" class="btn btn-primary btn-sm">
              Syllabus & Enrollment &rarr;
            </a>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endsection
