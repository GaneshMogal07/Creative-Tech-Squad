@extends('layouts.app')

@section('title', 'Education & Practical Engineering Programs — Creative Tech Squad')

@section('content')
<section class="hero-section" style="padding-bottom:40px;">
  <div class="hero-glow"></div>
  <div class="container text-center hero-content">
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

<section class="section" style="padding-top:20px;">
  <div class="container">
    <div class="grid grid-2">
      @foreach($programs as $prog)
        <div class="card" style="display:flex; flex-direction:column; justify-content:space-between;">
          <div>
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px;">
              <span class="badge badge-purple">{{ $prog->duration }}</span>
              <span class="badge badge-blue">{{ $prog->level }}</span>
            </div>

            <h3 style="font-size:1.45rem; margin-bottom:12px;">{{ $prog->title }}</h3>
            <p style="color:var(--cts-text-muted); font-size:0.98rem; line-height:1.6; margin-bottom:20px;">
              {{ $prog->description }}
            </p>

            @if(!empty($prog->skills))
              <div style="margin-bottom:20px;">
                <div style="font-size:0.8rem; font-weight:700; text-transform:uppercase; color:#64748B; margin-bottom:8px;">Core Skills Covered</div>
                <div style="display:flex; flex-wrap:wrap; gap:6px;">
                  @foreach($prog->skills as $s)
                    <span style="font-size:0.78rem; background:var(--cts-bg-alt); padding:4px 10px; border-radius:6px; font-weight:600; color:#334155;">{{ $s }}</span>
                  @endforeach
                </div>
              </div>
            @endif

            @if($prog->project_details)
              <div style="background:var(--cts-bg); padding:16px; border-radius:10px; border:1px solid var(--cts-border); margin-bottom:24px;">
                <div style="font-size:0.82rem; font-weight:700; color:var(--cts-navy); margin-bottom:4px;">Cap-stone Capable Project:</div>
                <p style="font-size:0.9rem; color:#475569; margin:0;">{{ $prog->project_details }}</p>
              </div>
            @endif
          </div>

          <div style="display:flex; justify-content:space-between; align-items:center; border-top:1px solid var(--cts-border); padding-top:20px;">
            <div>
              <div style="font-size:0.8rem; color:#64748B;">Program Investment</div>
              <div style="font-size:1.15rem; font-weight:800; color:var(--cts-navy);">{{ $prog->fee ?? 'Scholarships Open' }}</div>
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
