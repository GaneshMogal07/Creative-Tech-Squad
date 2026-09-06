@extends('layouts.app')

@section('title', 'Careers & Open Positions — Creative Tech Squad')

@section('content')
<section class="hero-section text-center">
  <div class="container container-narrow">
    <span class="eyebrow">Work at CTS</span>
    <h1 class="hero-title">Build Impactful Software with a <br><span class="gradient-accent">Team That Values Craft.</span></h1>
    <p class="section-subtitle mx-auto">
      Join our engineering squad in Pune, Nashik, or remote. We offer challenging enterprise products, competitive packages, and continuous growth.
    </p>
  </div>
</section>

<section class="section" style="padding-bottom:100px;">
  <div class="container container-narrow">
    <h2 class="section-title text-center" style="margin-bottom:40px;">Current Openings</h2>

    <div class="grid" style="gap:20px;">
      @forelse($careers as $job)
        <div class="card job-item-card">
          <div>
            <div style="display:flex; align-items:center; gap:10px; margin-bottom:8px; flex-wrap:wrap;">
              <span class="badge badge-purple">{{ $job->department }}</span>
              <span class="badge" style="background:#f0f0f2; color:var(--apple-text-primary);">{{ $job->employment_type }}</span>
            </div>
            <h3 style="font-size:1.35rem; font-weight:700; margin-bottom:6px; color:var(--apple-text-primary);">{{ $job->title }}</h3>
            <div style="font-size:0.9rem; color:var(--apple-text-secondary); display:flex; gap:14px; flex-wrap:wrap;">
              <span>📍 {{ $job->location }}</span>
              <span>💼 {{ $job->experience }}</span>
              @if($job->salary_range)
                <span>💰 {{ $job->salary_range }}</span>
              @endif
            </div>
          </div>

          <div>
            <a href="{{ route('careers.show', $job->slug) }}" class="btn btn-primary btn-sm">
              View Position &rarr;
            </a>
          </div>
        </div>
      @empty
        <div class="card text-center" style="padding:50px;">
          <p style="color:var(--apple-text-secondary);">No open positions currently. Check back soon or send your resume directly to our team.</p>
        </div>
      @endforelse
    </div>
  </div>
</section>
@endsection
