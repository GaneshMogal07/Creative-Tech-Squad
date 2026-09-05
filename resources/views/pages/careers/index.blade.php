@extends('layouts.app')

@section('title', 'Careers & Open Positions — Creative Tech Squad')

@section('content')
<section class="hero-section" style="padding-bottom:40px;">
  <div class="hero-glow"></div>
  <div class="container text-center hero-content">
    <span class="eyebrow">Work at CTS</span>
    <h1 class="hero-title">Build Impactful Software with a <br><span class="gradient-accent">Team That Values Craft.</span></h1>
    <p class="section-subtitle mx-auto">
      Join our engineering squad in Pune, Nashik, or remote. We offer challenging enterprise products, competitive packages, and continuous growth.
    </p>
  </div>
</section>

<section class="section" style="padding-top:20px;">
  <div class="container container-narrow">
    <h2 class="section-title text-center" style="margin-bottom:40px;">Current Openings</h2>

    <div class="grid" style="gap:20px;">
      @forelse($careers as $job)
        <div class="card" style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:20px; padding:28px 36px;">
          <div>
            <div style="display:flex; align-items:center; gap:10px; margin-bottom:8px;">
              <span class="badge badge-purple">{{ $job->department }}</span>
              <span class="badge badge-gray">{{ $job->employment_type }}</span>
            </div>
            <h3 style="font-size:1.35rem; margin-bottom:6px; color:var(--cts-navy);">{{ $job->title }}</h3>
            <div style="font-size:0.9rem; color:var(--cts-text-muted); display:flex; gap:16px;">
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
        <div class="card text-center" style="padding:40px;">
          <p style="color:var(--cts-text-muted);">No open positions currently. Check back soon or send your resume directly to our team.</p>
        </div>
      @endforelse
    </div>
  </div>
</section>
@endsection
