@extends('layouts.app')

@section('title', $project->title . ' — Case Study | Creative Tech Squad')

@section('content')
<section class="hero-section" style="padding-bottom:40px;">
  <div class="hero-glow"></div>
  <div class="container text-center hero-content container-narrow">
    <a href="{{ route('portfolio') }}" style="font-size:0.9rem; color:var(--cts-blue); font-weight:600; display:inline-flex; align-items:center; gap:6px; margin-bottom:16px;">
      &larr; Back to all case studies
    </a>
    <div style="margin-bottom:12px;">
      <span class="badge badge-blue">{{ $project->category }}</span>
      <span style="font-size:0.9rem; color:#64748B; font-weight:600; margin-left:8px;">Client: {{ $project->client_name ?? 'Enterprise Partner' }}</span>
    </div>
    <h1 class="hero-title" style="font-size:clamp(2.2rem, 4.5vw, 3.8rem);">{{ $project->title }}</h1>
    <p class="section-subtitle mx-auto" style="font-size:1.15rem;">
      {{ $project->description }}
    </p>
  </div>
</section>

<section class="section" style="background:#ffffff; padding-top:40px;">
  <div class="container container-narrow">
    <div class="card detail-card" style="margin-bottom:40px;">
      
      @if($project->challenge)
        <div style="margin-bottom:36px;">
          <h2 style="font-size:1.5rem; color:var(--cts-navy); margin-bottom:14px;">The Operational Challenge</h2>
          <div style="font-size:1.02rem; line-height:1.75; color:#475569; background:#FEF2F2; border-left:4px solid #EF4444; padding:20px; border-radius:8px;">
            {{ $project->challenge }}
          </div>
        </div>
      @endif

      @if($project->solution)
        <div style="margin-bottom:36px;">
          <h2 style="font-size:1.5rem; color:var(--cts-navy); margin-bottom:14px;">Our Engineering Solution</h2>
          <div style="font-size:1.02rem; line-height:1.75; color:#334155; background:#F0FDF4; border-left:4px solid #10B981; padding:20px; border-radius:8px;">
            {{ $project->solution }}
          </div>
        </div>
      @endif

      @if(!empty($project->technology_stack))
        <div style="border-top:1px solid var(--cts-border); padding-top:24px; margin-bottom:32px;">
          <h4 style="font-size:1.1rem; color:var(--cts-navy); margin-bottom:12px;">Technologies Employed</h4>
          <div style="display:flex; flex-wrap:wrap; gap:8px;">
            @foreach($project->technology_stack as $tech)
              <span class="tech-pill">{{ $tech }}</span>
            @endforeach
          </div>
        </div>
      @endif

      <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:20px; border-top:1px solid var(--cts-border); padding-top:28px;">
        <div>
          <h4 style="font-size:1.15rem; color:var(--cts-navy);">Have a similar project requirement?</h4>
          <p style="color:var(--cts-text-muted); font-size:0.92rem;">Let our engineering squad build your solution.</p>
        </div>
        <button onclick="openModal('projectInquiryModal')" class="btn btn-primary">Start a Project</button>
      </div>
    </div>
  </div>
</section>

@if($relatedProjects->count() > 0)
<section class="section">
  <div class="container">
    <h3 style="font-size:1.5rem; margin-bottom:30px; text-align:center;">More Case Studies</h3>
    <div class="grid grid-3">
      @foreach($relatedProjects as $rel)
        <div class="card">
          <span class="badge badge-blue" style="margin-bottom:10px;">{{ $rel->category }}</span>
          <h4 style="font-size:1.2rem; margin-bottom:8px;">{{ $rel->title }}</h4>
          <p style="color:var(--cts-text-muted); font-size:0.9rem; margin-bottom:16px;">{{ Str::limit($rel->description, 100) }}</p>
          <a href="{{ route('portfolio.show', $rel->slug) }}" style="color:var(--cts-blue); font-weight:600; font-size:0.88rem;">Read case study &rarr;</a>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endif
@endsection
