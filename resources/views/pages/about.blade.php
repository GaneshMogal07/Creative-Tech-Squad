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
      <div class="card" style="padding:44px 36px;">
        <span class="eyebrow">Our Mission</span>
        <h3 style="font-size:1.6rem; font-weight:700; color:var(--apple-text-primary); margin-bottom:16px;">Create Practical, Resilient Technology</h3>
        <p style="color:var(--apple-text-secondary); font-size:1.05rem; line-height:1.7;">
          To create practical technology that helps organizations work smarter and helps learners become confident builders through direct project ownership and uncompromising architectural standards.
        </p>
      </div>

      <div class="card" style="padding:44px 36px;">
        <span class="eyebrow">Our Vision</span>
        <h3 style="font-size:1.6rem; font-weight:700; color:var(--apple-text-primary); margin-bottom:16px;">Global Benchmark in Software & Talent</h3>
        <p style="color:var(--apple-text-secondary); font-size:1.05rem; line-height:1.7;">
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
        <div style="font-size:2rem; margin-bottom:16px;">🏛️</div>
        <h3 style="font-size:1.25rem; font-weight:700; color:var(--apple-text-primary); margin-bottom:10px;">Architectural Integrity</h3>
        <p style="color:var(--apple-text-secondary); font-size:0.95rem; line-height:1.5;">
          We reject brittle quick-fixes. Our architectures follow clean domain-driven structures, strict relational database normalization, and secure authentication models.
        </p>
      </div>

      <div class="card">
        <div style="font-size:2rem; margin-bottom:16px;">🎯</div>
        <h3 style="font-size:1.25rem; font-weight:700; color:var(--apple-text-primary); margin-bottom:10px;">Business-First Thinking</h3>
        <p style="color:var(--apple-text-secondary); font-size:0.95rem; line-height:1.5;">
          Technology is only valuable when it produces tangible operational savings, cuts manual entry errors, and improves user satisfaction.
        </p>
      </div>

      <div class="card">
        <div style="font-size:2rem; margin-bottom:16px;">🤝</div>
        <h3 style="font-size:1.25rem; font-weight:700; color:var(--apple-text-primary); margin-bottom:10px;">Teamwork & Mentorship</h3>
        <p style="color:var(--apple-text-secondary); font-size:0.95rem; line-height:1.5;">
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
