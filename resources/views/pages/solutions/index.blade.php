@extends('layouts.app')

@section('title', 'Solutions — Creative Tech Squad')

@section('content')
<section class="hero-section" style="padding-bottom:50px;">
  <div class="hero-glow"></div>
  <div class="container text-center hero-content">
    <span class="eyebrow">Enterprise Solutions</span>
    <h1 class="hero-title">Purpose-Built Software for <br><span class="gradient-accent">Complex Operations.</span></h1>
    <p class="section-subtitle mx-auto">
      Explore our comprehensive solution suites designed to automate business operations, eliminate data silos, and scale organizations effortlessly.
    </p>
  </div>
</section>

<section class="section" style="padding-top:20px;">
  <div class="container">
    <div class="grid grid-3">
      @foreach($solutions as $sol)
        <div class="card" style="display:flex; flex-direction:column; justify-content:space-between;">
          <div>
            <div class="eyebrow" style="margin-bottom:14px;">0{{ $loop->iteration }}</div>
            <h3 style="font-size:1.4rem; margin-bottom:12px;">{{ $sol->title }}</h3>
            <p style="color:var(--cts-text-muted); font-size:0.95rem; line-height:1.6; margin-bottom:24px;">
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
  </div>
</section>

<section class="section-sm" style="background:var(--cts-white); text-align:center;">
  <div class="container container-narrow">
    <h3 style="font-size:1.8rem; margin-bottom:14px;">Need a Tailored System Architecture?</h3>
    <p style="color:var(--cts-text-muted); margin-bottom:28px;">
      Our solution architects will work with your department heads to blueprint the optimal software stack.
    </p>
    <button onclick="openModal('projectInquiryModal')" class="btn btn-gradient">Request Solution Blueprint</button>
  </div>
</section>
@endsection
