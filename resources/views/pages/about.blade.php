@extends('layouts.app')

@section('title', 'About Us — Creative Tech Squad')

@section('content')
<section class="hero-section text-center">
  <div class="container container-narrow">
    <span class="eyebrow">Company Profile</span>
    <h1 class="hero-title">Engineering Digital Platforms That <br><span class="gradient-accent">Actually Move Business.</span></h1>
    <p class="section-subtitle mx-auto">
      Creative Tech Squad is a modern software engineering company building ERP ecosystems, custom digital products, AI-driven automation, and industry-grade engineering cohorts.
    </p>
  </div>
</section>

<!-- Mission & Vision -->
<section class="section" style="background:#ffffff; border-top:1px solid var(--apple-border-light); border-bottom:1px solid var(--apple-border-light);">
  <div class="container">
    <div class="grid grid-2" style="gap:30px;">
      <div class="card detail-card">
        <span class="eyebrow">Our Mission</span>
        <h3 style="font-size:1.5rem; font-weight:700; color:var(--apple-text-primary); margin-bottom:14px;">Create Practical, Resilient Technology</h3>
        <p style="color:var(--apple-text-secondary); font-size:1rem; line-height:1.65;">
          To create practical technology that helps organizations work smarter and helps learners become confident builders through direct project ownership and uncompromising architectural standards.
        </p>
      </div>

      <div class="card detail-card">
        <span class="eyebrow">Our Vision</span>
        <h3 style="font-size:1.5rem; font-weight:700; color:var(--apple-text-primary); margin-bottom:14px;">Global Benchmark in Software & Talent</h3>
        <p style="color:var(--apple-text-secondary); font-size:1rem; line-height:1.65;">
          To become a leading software development squad renowned for solving hard business automation problems while mentoring the next generation of high-caliber engineers.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- Core Pillars / Values -->
<section class="section">
  <div class="container text-center">
    <span class="eyebrow">Why Creative Tech Squad</span>
    <h2 class="section-title">The Principles Behind Our Work</h2>
    <p class="section-subtitle mx-auto">Every line of code and user flow is built with long-term maintainability in mind.</p>

    <div class="grid grid-3" style="margin-top:40px; text-align:left;">
      <div class="card">
        <div style="width:48px; height:48px; border-radius:14px; background:#e8f4fd; color:#0071e3; display:flex; align-items:center; justify-content:center; margin-bottom:18px;">
          <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
        </div>
        <h3 style="font-size:1.25rem; font-weight:700; color:var(--apple-text-primary); margin-bottom:10px;">Architectural Integrity</h3>
        <p style="color:var(--apple-text-secondary); font-size:0.95rem; line-height:1.6;">
          We reject brittle quick-fixes. Our architectures follow clean domain-driven structures, strict relational database normalization, and secure authentication models.
        </p>
      </div>

      <div class="card">
        <div style="width:48px; height:48px; border-radius:14px; background:#f3e8ff; color:#7b2cff; display:flex; align-items:center; justify-content:center; margin-bottom:18px;">
          <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
        </div>
        <h3 style="font-size:1.25rem; font-weight:700; color:var(--apple-text-primary); margin-bottom:10px;">Business-First Thinking</h3>
        <p style="color:var(--apple-text-secondary); font-size:0.95rem; line-height:1.6;">
          Technology is only valuable when it produces tangible operational savings, cuts manual entry errors, and improves user satisfaction.
        </p>
      </div>

      <div class="card">
        <div style="width:48px; height:48px; border-radius:14px; background:#e6f9ed; color:#34c759; display:flex; align-items:center; justify-content:center; margin-bottom:18px;">
          <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
        </div>
        <h3 style="font-size:1.25rem; font-weight:700; color:var(--apple-text-primary); margin-bottom:10px;">Teamwork & Mentorship</h3>
        <p style="color:var(--apple-text-secondary); font-size:0.95rem; line-height:1.6;">
          We pair experienced senior software architects with energetic developers to ensure rapid delivery without sacrificing quality.
        </p>
      </div>
    </div>

    <!-- Direct Callout Box -->
    <div class="callout-box" style="margin-top:60px;">
      <h2 class="section-title" style="font-size:1.8rem; margin-bottom:12px;">Connect with Our Engineering Leads</h2>
      <p style="color:var(--apple-text-secondary); max-width:600px; margin:0 auto 28px; line-height:1.5;">
        Whether you need an enterprise ERP rollout or want to upskill your university student cohort, we're ready.
      </p>
      <button onclick="openModal('projectInquiryModal')" class="btn btn-primary btn-lg">
        Start a Conversation
      </button>
    </div>
  </div>
</section>
@endsection
