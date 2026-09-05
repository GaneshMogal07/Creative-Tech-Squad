@extends('layouts.app')

@section('title', 'Solutions — Creative Tech Squad')

@section('content')
<section class="hero-section text-center">
  <div class="container container-narrow">
    <span class="eyebrow">Enterprise Solutions</span>
    <h1 class="hero-title">Purpose-Built Software for <br><span class="gradient-accent">Complex Operations.</span></h1>
    <p class="section-subtitle mx-auto">
      Explore our comprehensive solution suites designed to automate business operations, eliminate data silos, and scale organizations effortlessly.
    </p>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="grid grid-3">
      @foreach($solutions as $sol)
        <div class="card" style="display:flex; flex-direction:column; justify-content:space-between;">
          <div>
            <div class="eyebrow" style="margin-bottom:14px;">0{{ $loop->iteration }}</div>
            <h3 style="font-size:1.4rem; font-weight:700; margin-bottom:12px; color:var(--apple-text-primary);">{{ $sol->title }}</h3>
            <p style="color:var(--apple-text-secondary); font-size:0.95rem; line-height:1.6; margin-bottom:24px;">
              {{ $sol->short_description }}
            </p>
          </div>
          <div>
            <a href="{{ route('solutions.show', $sol->slug) }}" class="btn btn-primary btn-sm" style="width:100%;">
              Explore Solution &rarr;
            </a>
          </div>
        </div>
      @endforeach
    </div>

    <!-- Clean Callout Box with proper margins -->
    <div class="callout-box" style="margin-top:60px;">
      <h3 style="font-size:1.8rem; font-weight:700; color:var(--apple-text-primary); margin-bottom:12px;">Need a Tailored System Architecture?</h3>
      <p style="color:var(--apple-text-secondary); max-width:640px; margin:0 auto 28px; font-size:1rem; line-height:1.5;">
        Our solution architects will work with your department heads to blueprint the optimal software stack.
      </p>
      <button onclick="openModal('projectInquiryModal')" class="btn btn-gradient btn-lg">Request Solution Blueprint</button>
    </div>
  </div>
</section>
@endsection
