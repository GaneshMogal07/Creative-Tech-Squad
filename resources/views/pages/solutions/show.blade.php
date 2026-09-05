@extends('layouts.app')

@section('title', $solution->title . ' — Solutions | Creative Tech Squad')

@section('content')
<section class="hero-section" style="padding-bottom:40px;">
  <div class="hero-glow"></div>
  <div class="container text-center hero-content container-narrow">
    <a href="{{ route('solutions.index') }}" style="font-size:0.9rem; color:var(--cts-blue); font-weight:600; display:inline-flex; align-items:center; gap:6px; margin-bottom:16px;">
      &larr; Back to all solutions
    </a>
    <h1 class="hero-title" style="font-size:clamp(2.2rem, 4.5vw, 3.8rem);">{{ $solution->title }}</h1>
    <p class="section-subtitle mx-auto" style="font-size:1.15rem;">
      {{ $solution->short_description }}
    </p>
  </div>
</section>

<section class="section" style="background:var(--cts-white); padding-top:60px;">
  <div class="container container-narrow">
    <div class="card" style="padding:48px; border-radius:var(--cts-radius-xl); box-shadow:var(--cts-shadow-md);">
      <h2 style="font-size:1.8rem; margin-bottom:20px; color:var(--cts-navy);">Solution Architecture & Overview</h2>
      
      <div style="font-size:1.05rem; line-height:1.8; color:#334155; margin-bottom:36px;">
        {{ $solution->description }}
      </div>

      <div style="background:var(--cts-bg); padding:32px; border-radius:var(--cts-radius-md); border:1px solid var(--cts-border); margin-bottom:36px;">
        <h3 style="font-size:1.25rem; margin-bottom:16px;">What Makes Our Solution Different:</h3>
        <ul style="list-style:none; display:flex; flex-direction:column; gap:12px; font-size:0.95rem; color:#475569;">
          <li style="display:flex; align-items:flex-start; gap:10px;">
            <span style="color:#10B981; font-weight:bold;">✔</span>
            <span><strong>Zero Bloatware:</strong> Only the modules your business needs, custom-fitted to your organization rules.</span>
          </li>
          <li style="display:flex; align-items:flex-start; gap:10px;">
            <span style="color:#10B981; font-weight:bold;">✔</span>
            <span><strong>Relational Data Security:</strong> Built with strict database constraints, encrypted credentials, and full audit logs.</span>
          </li>
          <li style="display:flex; align-items:flex-start; gap:10px;">
            <span style="color:#10B981; font-weight:bold;">✔</span>
            <span><strong>Direct Engineering Support:</strong> Direct communication with the developers who wrote your software.</span>
          </li>
        </ul>
      </div>

      <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:20px; border-top:1px solid var(--cts-border); padding-top:28px;">
        <div>
          <h4 style="font-size:1.1rem; color:var(--cts-navy);">Ready to implement {{ $solution->title }}?</h4>
          <p style="color:var(--cts-text-muted); font-size:0.9rem;">Schedule a discovery meeting with our technical leads.</p>
        </div>
        <button onclick="openModal('projectInquiryModal')" class="btn btn-primary">Start This Project</button>
      </div>
    </div>
  </div>
</section>

@if($otherSolutions->count() > 0)
<section class="section">
  <div class="container">
    <h3 style="font-size:1.5rem; margin-bottom:30px; text-align:center;">Other Enterprise Solutions</h3>
    <div class="grid grid-3">
      @foreach($otherSolutions as $other)
        <div class="card">
          <h4 style="font-size:1.2rem; margin-bottom:8px;">{{ $other->title }}</h4>
          <p style="color:var(--cts-text-muted); font-size:0.9rem; margin-bottom:16px;">{{ Str::limit($other->short_description, 100) }}</p>
          <a href="{{ route('solutions.show', $other->slug) }}" style="color:var(--cts-blue); font-weight:600; font-size:0.88rem;">View details &rarr;</a>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endif
@endsection
