@extends('layouts.app')

@section('title', $solution->title . ' — Solutions | Creative Tech Squad')

@section('content')
<section class="hero-section text-center">
  <div class="container container-narrow">
    <a href="{{ route('solutions.index') }}" style="font-size:0.9rem; color:var(--apple-blue); font-weight:600; display:inline-flex; align-items:center; gap:6px; margin-bottom:16px;">
      &larr; Back to all solutions
    </a>
    <h1 class="hero-title" style="font-size:clamp(2.2rem, 4.5vw, 3.8rem);">{{ $solution->title }}</h1>
    <p class="section-subtitle mx-auto" style="font-size:1.15rem;">
      {{ $solution->short_description }}
    </p>
  </div>
</section>

<section class="section" style="background:#ffffff; border-top:1px solid var(--apple-border-light); border-bottom:1px solid var(--apple-border-light);">
  <div class="container container-narrow">
    <div class="card" style="padding:48px 40px; border-radius:var(--apple-radius-xl); box-shadow:var(--apple-shadow-subtle);">
      <h2 style="font-size:1.8rem; font-weight:700; margin-bottom:20px; color:var(--apple-text-primary);">Solution Architecture & Overview</h2>
      
      <div style="font-size:1.05rem; line-height:1.8; color:var(--apple-text-secondary); margin-bottom:36px;">
        {{ $solution->description }}
      </div>

      <div style="background:var(--apple-bg); padding:32px; border-radius:var(--apple-radius-md); border:1px solid var(--apple-border-light); margin-bottom:36px;">
        <h3 style="font-size:1.25rem; font-weight:700; margin-bottom:16px; color:var(--apple-text-primary);">What Makes Our Solution Different:</h3>
        <ul style="list-style:none; display:flex; flex-direction:column; gap:12px; font-size:0.95rem; color:var(--apple-text-secondary);">
          <li style="display:flex; align-items:flex-start; gap:10px;">
            <span style="color:#34c759; font-weight:bold;">✔</span>
            <span><strong style="color:var(--apple-text-primary);">Zero Bloatware:</strong> Only the modules your business needs, custom-fitted to your organization rules.</span>
          </li>
          <li style="display:flex; align-items:flex-start; gap:10px;">
            <span style="color:#34c759; font-weight:bold;">✔</span>
            <span><strong style="color:var(--apple-text-primary);">Relational Data Security:</strong> Built with strict database constraints, encrypted credentials, and full audit logs.</span>
          </li>
          <li style="display:flex; align-items:flex-start; gap:10px;">
            <span style="color:#34c759; font-weight:bold;">✔</span>
            <span><strong style="color:var(--apple-text-primary);">Direct Engineering Support:</strong> Direct communication with the developers who wrote your software.</span>
          </li>
        </ul>
      </div>

      <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:20px; border-top:1px solid var(--apple-border-light); padding-top:28px;">
        <div>
          <h4 style="font-size:1.1rem; font-weight:700; color:var(--apple-text-primary);">Ready to implement {{ $solution->title }}?</h4>
          <p style="color:var(--apple-text-secondary); font-size:0.9rem;">Schedule a discovery meeting with our technical leads.</p>
        </div>
        <button onclick="openModal('projectInquiryModal')" class="btn btn-primary btn-lg">Start This Project</button>
      </div>
    </div>
  </div>
</section>

@if($otherSolutions->count() > 0)
<section class="section" style="padding-bottom:100px;">
  <div class="container">
    <h3 style="font-size:1.6rem; font-weight:700; margin-bottom:32px; text-align:center; color:var(--apple-text-primary);">Other Enterprise Solutions</h3>
    <div class="grid grid-3">
      @foreach($otherSolutions as $other)
        <div class="card" style="display:flex; flex-direction:column; justify-content:space-between; height:100%;">
          <div>
            <h4 style="font-size:1.2rem; font-weight:700; margin-bottom:8px; color:var(--apple-text-primary);">{{ $other->title }}</h4>
            <p style="color:var(--apple-text-secondary); font-size:0.9rem; line-height:1.5; margin-bottom:16px;">{{ Str::limit($other->short_description, 100) }}</p>
          </div>
          <a href="{{ route('solutions.show', $other->slug) }}" style="color:var(--apple-blue); font-weight:600; font-size:0.88rem; margin-top:auto; display:inline-block;">View details &rarr;</a>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endif
@endsection
