@extends('layouts.app')

@section('title', 'Creative Tech Squad')

@section('content')

<!-- Section 01: Hero Header -->
<section class="apple-store-hero">
  <div class="container">
    <div class="apple-store-hero-grid">
      <div>
        <h1 class="apple-hero-title">Creative Tech Squad</h1>
      </div>
      <div class="apple-hero-right">
        <h2 class="apple-hero-right-title">The best way to build the software products you love.</h2>
        <div class="apple-hero-links">
          <a href="javascript:void(0)" onclick="openSpecialistWidget()" class="apple-hero-link">
            Connect with a Lead Architect <span style="font-size:12px;">↗</span>
          </a>
          <a href="{{ route('solutions.index') }}" class="apple-hero-link">
            Explore Innovation Hub <span style="font-size:12px;">↗</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Section 02: Horizontal Category Ribbon -->
<section class="apple-category-section">
  <div class="container" style="position:relative;">
    <button class="apple-slider-nav-btn prev" id="catSliderPrev" aria-label="Previous">
      <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
    </button>
    <button class="apple-slider-nav-btn next" id="catSliderNext" aria-label="Next">
      <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
    </button>

    <div class="apple-category-slider" id="categorySlider">
      <a href="{{ route('solutions.show', 'erp-solutions') }}" class="apple-category-item">
        <div class="apple-category-thumb">
          <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
        </div>
        <span class="apple-category-name">ERP Suite</span>
      </a>

      <a href="{{ route('solutions.show', 'custom-software') }}" class="apple-category-item">
        <div class="apple-category-thumb">
          <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
        </div>
        <span class="apple-category-name">Custom SaaS</span>
      </a>

      <a href="{{ route('ai') }}" class="apple-category-item">
        <div class="apple-category-thumb">
          <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
        </div>
        <span class="apple-category-name">Neural AI</span>
      </a>

      <a href="{{ route('education') }}" class="apple-category-item">
        <div class="apple-category-thumb">
          <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5"/></svg>
        </div>
        <span class="apple-category-name">Education</span>
      </a>

      <a href="{{ route('internships') }}" class="apple-category-item">
        <div class="apple-category-thumb">
          <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
        </div>
        <span class="apple-category-name">Internships</span>
      </a>

      <a href="{{ route('portfolio') }}" class="apple-category-item">
        <div class="apple-category-thumb">
          <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
        </div>
        <span class="apple-category-name">Portfolio</span>
      </a>

      <a href="{{ route('careers') }}" class="apple-category-item">
        <div class="apple-category-thumb">
          <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/></svg>
        </div>
        <span class="apple-category-name">Careers</span>
      </a>

      <a href="{{ route('products.index') }}" class="apple-category-item">
        <div class="apple-category-thumb">
          <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
        </div>
        <span class="apple-category-name">Products</span>
      </a>

      <a href="{{ route('blog.index') }}" class="apple-category-item">
        <div class="apple-category-thumb">
          <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
        </div>
        <span class="apple-category-name">Tech Blog</span>
      </a>

      <a href="{{ route('contact') }}" class="apple-category-item">
        <div class="apple-category-thumb">
          <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
        </div>
        <span class="apple-category-name">Contact</span>
      </a>
    </div>
  </div>
</section>

<!-- Client Trust & Social Proof Strip -->
<div class="client-trust-section">
  <div class="container">
    <div class="client-trust-label">Trusted by fast-moving companies, industrial squads &amp; institutions</div>
    <div class="client-trust-logos">
      <div class="client-logo-item">
        <svg width="16" height="16" fill="none" stroke="#0071e3" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
        Apex Logistics &amp; ERP
      </div>
      <div class="client-logo-item">
        <svg width="16" height="16" fill="none" stroke="#34c759" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
        Maharashtra AgroTech
      </div>
      <div class="client-logo-item">
        <svg width="16" height="16" fill="none" stroke="#7b2cff" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 00-9.78 2.096A4.001 4.001 0 003 15z"/></svg>
        CloudCore Infotech
      </div>
      <div class="client-logo-item">
        <svg width="16" height="16" fill="none" stroke="#b64400" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5"/></svg>
        PICT Tech Labs
      </div>
      <div class="client-logo-item">
        <svg width="16" height="16" fill="none" stroke="#0071e3" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
        Kalyani Precision Mfg
      </div>
    </div>
  </div>
</div>

<!-- Section 03: "The latest." (Apple Store Cards Slider with Real UI Previews) -->
<section class="apple-section">
  <div class="container" style="position:relative;">
    <div class="apple-section-header">
      <h2 class="apple-section-title">The latest.</h2>
      <span class="apple-section-subtitle">Take a look at what’s new right now.</span>
    </div>

    <button class="apple-slider-nav-btn prev" id="latestSliderPrev" aria-label="Previous" style="top:55%;">
      <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
    </button>
    <button class="apple-slider-nav-btn next" id="latestSliderNext" aria-label="Next" style="top:55%;">
      <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
    </button>

    <div class="apple-card-slider" id="latestCardSlider">
      
      <!-- Apple Card 1: CTS Enterprise ERP (Realistic Live Dashboard Mockup) -->
      <a href="{{ route('products.show', 'cts-enterprise-erp') }}" class="apple-card">
        <div>
          <div class="apple-card-eyebrow">FLAGSHIP ERP</div>
          <h3 class="apple-card-title">CTS Enterprise ERP</h3>
          <p class="apple-card-desc">Now with biometric multi-shift sync and AI payroll reconciliation.</p>
          <div class="apple-card-price">Production Ready Platform</div>
        </div>
        <div class="apple-card-visual">
          <div class="apple-card-visual-inner" style="flex-direction:column; justify-content:space-between; padding:16px; background:#f8f9fc; text-align:left;">
            <div style="width:100%; display:flex; justify-content:space-between; align-items:center; border-bottom:1px solid rgba(0,0,0,0.06); padding-bottom:8px;">
              <div style="display:flex; align-items:center; gap:6px;">
                <span style="width:8px; height:8px; border-radius:50%; background:#34c759;"></span>
                <span style="font-size:11px; font-weight:700; color:#1d1d1f;">Biometric Sync Active</span>
              </div>
              <span style="font-size:10px; font-weight:600; color:#0071e3; background:#e8f4fd; padding:2px 8px; border-radius:980px;">10k+ Daily Users</span>
            </div>
            <div style="width:100%; margin:8px 0;">
              <div style="display:flex; justify-content:space-between; font-size:11px; margin-bottom:4px;">
                <span style="color:#6e6e73;">Shift Attendance Rate</span>
                <strong style="color:#1d1d1f;">99.4%</strong>
              </div>
              <div style="width:100%; height:6px; background:#e5e5ea; border-radius:980px; overflow:hidden;">
                <div style="width:99.4%; height:100%; background:linear-gradient(90deg, #0071e3, #34c759); border-radius:980px;"></div>
              </div>
            </div>
            <div style="width:100%; display:flex; gap:6px;">
              <div style="flex:1; background:#ffffff; border:1px solid rgba(0,0,0,0.06); border-radius:8px; padding:6px 8px;">
                <div style="font-size:9px; color:#86868b; text-transform:uppercase;">Shift 1</div>
                <div style="font-size:12px; font-weight:700; color:#1d1d1f;">840 Present</div>
              </div>
              <div style="flex:1; background:#ffffff; border:1px solid rgba(0,0,0,0.06); border-radius:8px; padding:6px 8px;">
                <div style="font-size:9px; color:#86868b; text-transform:uppercase;">Shift 2</div>
                <div style="font-size:12px; font-weight:700; color:#1d1d1f;">580 Present</div>
              </div>
            </div>
          </div>
        </div>
      </a>

      <!-- Apple Card 2: Custom SaaS Studio (API & Microservices Mockup) -->
      <a href="{{ route('solutions.show', 'custom-software') }}" class="apple-card">
        <div>
          <div class="apple-card-eyebrow">CUSTOM SOFTWARE</div>
          <h3 class="apple-card-title">Custom SaaS Studio</h3>
          <p class="apple-card-desc">Purpose-built web platforms, executive dashboards, and billing engines.</p>
          <div class="apple-card-price">Full-Stack Laravel & Angular</div>
        </div>
        <div class="apple-card-visual">
          <div class="apple-card-visual-inner" style="flex-direction:column; justify-content:space-between; padding:14px; background:#1e1e24; color:#ffffff; text-align:left; font-family:monospace;">
            <div style="width:100%; display:flex; justify-content:space-between; align-items:center; border-bottom:1px solid rgba(255,255,255,0.1); padding-bottom:6px;">
              <span style="font-size:10px; color:#34c759; font-weight:700;">POST /api/v2/workflow</span>
              <span style="font-size:9px; background:rgba(52,199,89,0.2); color:#34c759; padding:2px 6px; border-radius:4px;">200 OK • 18ms</span>
            </div>
            <div style="font-size:10px; line-height:1.5; color:#a1a1a6; margin:6px 0;">
              <div>{ <span style="color:#7b2cff;">"status"</span>: <span style="color:#34c759;">"dispatched"</span>,</div>
              <div style="padding-left:12px;"><span style="color:#7b2cff;">"pipeline"</span>: <span style="color:#0071e3;">"automated-billing"</span>,</div>
              <div style="padding-left:12px;"><span style="color:#7b2cff;">"records_synced"</span>: <span style="color:#ff9f0a;">1420</span> }</div>
            </div>
            <div style="width:100%; display:flex; justify-content:space-between; font-size:10px; color:#86868b; border-top:1px solid rgba(255,255,255,0.08); padding-top:6px;">
              <span>Architecture: Event-Driven</span>
              <span style="color:#11c5e8;">4-Week MVP</span>
            </div>
          </div>
        </div>
      </a>

      <!-- Apple Card 3: Neural AI Studio (Dark Pro Vector RAG Terminal) -->
      <a href="{{ route('ai') }}" class="apple-card apple-card-dark">
        <div>
          <div class="apple-card-eyebrow" style="color:#ff9f0a;">CTS NEURAL ENGINE</div>
          <h3 class="apple-card-title">Neural AI Studio</h3>
          <p class="apple-card-desc">All out intelligence. Zero hallucination RAG pipelines & document parsing.</p>
          <div class="apple-card-price">Enterprise Knowledge Base</div>
        </div>
        <div class="apple-card-visual">
          <div class="apple-card-visual-inner" style="flex-direction:column; justify-content:space-between; padding:14px; background:#0d0d11; border-color:rgba(255,255,255,0.12); text-align:left;">
            <div style="width:100%; display:flex; justify-content:space-between; align-items:center; border-bottom:1px solid rgba(255,255,255,0.1); padding-bottom:6px;">
              <span style="font-size:10px; font-weight:700; color:#ff9f0a; display:flex; align-items:center; gap:4px;">
                <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                Semantic RAG Pipeline
              </span>
              <span style="font-size:9px; color:#34c759; font-family:monospace;">LATENCY: 38ms</span>
            </div>
            <div style="background:rgba(255,255,255,0.05); padding:8px 10px; border-radius:8px; font-size:10px; color:#d2d2d7; margin:6px 0;">
              <span style="color:#86868b;">Q:</span> "Extract total tax &amp; items from Invoice #942"<br>
              <span style="color:#34c759;">A:</span> "₹14,200 parsed into ERP with 100% citation."
            </div>
            <div style="display:flex; gap:6px; font-size:9px;">
              <span style="background:rgba(255,159,10,0.15); color:#ff9f0a; padding:2px 6px; border-radius:4px;">Zero Hallucination</span>
              <span style="background:rgba(0,113,227,0.15); color:#0071e3; padding:2px 6px; border-radius:4px;">Private DB</span>
            </div>
          </div>
        </div>
      </a>

      <!-- Apple Card 4: Education & Internships (Live PR Cohort Review Mockup) -->
      <a href="{{ route('education') }}" class="apple-card">
        <div>
          <div class="apple-card-eyebrow">EDUCATION LAB</div>
          <h3 class="apple-card-title">Engineering Cohort</h3>
          <p class="apple-card-desc">Hands-on practical full-stack Laravel, Java Spring Boot & AI training.</p>
          <div class="apple-card-price">Internships & Placement Tracks</div>
        </div>
        <div class="apple-card-visual">
          <div class="apple-card-visual-inner" style="flex-direction:column; justify-content:space-between; padding:14px; background:#f5f7fa; text-align:left;">
            <div style="width:100%; display:flex; justify-content:space-between; align-items:center; border-bottom:1px solid rgba(0,0,0,0.06); padding-bottom:6px;">
              <span style="font-size:11px; font-weight:700; color:#1d1d1f; display:flex; align-items:center; gap:4px;">
                <svg width="12" height="12" fill="none" stroke="#7b2cff" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5"/></svg>
                Cohort Capstone Project
              </span>
              <span style="font-size:9px; background:#e6f9ed; color:#34c759; font-weight:700; padding:2px 6px; border-radius:980px;">PR Approved</span>
            </div>
            <div style="font-size:10.5px; color:#1d1d1f; font-weight:600; margin:6px 0;">
              <span>PR #418: Multi-tenant HRMS sync</span>
              <div style="font-size:9.5px; color:#6e6e73; font-weight:400; margin-top:2px;">14 unit tests passed • Production code reviewed</div>
            </div>
            <div style="display:flex; flex-wrap:wrap; gap:4px;">
              <span style="font-size:9px; background:#ffffff; border:1px solid #d2d2d7; padding:2px 6px; border-radius:980px; color:#1d1d1f;">Laravel 11</span>
              <span style="font-size:9px; background:#ffffff; border:1px solid #d2d2d7; padding:2px 6px; border-radius:980px; color:#1d1d1f;">Spring Boot</span>
              <span style="font-size:9px; background:#ffffff; border:1px solid #d2d2d7; padding:2px 6px; border-radius:980px; color:#1d1d1f;">Angular</span>
            </div>
          </div>
        </div>
      </a>

    </div>
  </div>
</section>

<!-- Section 04: "The CTS difference." (Vector Icons) -->
<section class="apple-section">
  <div class="container">
    <div class="apple-section-header">
      <h2 class="apple-section-title">The CTS difference.</h2>
      <span class="apple-section-subtitle">Even more reasons to partner with us.</span>
    </div>

    <div class="apple-grid-4">
      <div class="apple-feature-card">
        <div style="width:48px; height:48px; border-radius:14px; background:#e8f4fd; color:#0071e3; display:flex; align-items:center; justify-content:center; margin-bottom:16px;">
          <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
        </div>
        <h3 class="apple-feature-title">99.9% Reliability</h3>
        <p class="apple-feature-desc">Resilient database architectures, tested queries, and SLA-backed infrastructure for enterprise operations.</p>
      </div>

      <div class="apple-feature-card">
        <div style="width:48px; height:48px; border-radius:14px; background:#f3e8ff; color:#7b2cff; display:flex; align-items:center; justify-content:center; margin-bottom:16px;">
          <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
        </div>
        <h3 class="apple-feature-title">Fast Agile Sprints</h3>
        <p class="apple-feature-desc">From product scope to live staging deployment in weeks, with transparent code reviews and continuous delivery.</p>
      </div>

      <div class="apple-feature-card">
        <div style="width:48px; height:48px; border-radius:14px; background:#e6f9ed; color:#34c759; display:flex; align-items:center; justify-content:center; margin-bottom:16px;">
          <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
        </div>
        <h3 class="apple-feature-title">Enterprise Security</h3>
        <p class="apple-feature-desc">Role-based access control, cryptographic password hashing, audit logs, and GDPR/IT compliance built-in.</p>
      </div>

      <div class="apple-feature-card">
        <div style="width:48px; height:48px; border-radius:14px; background:#fff2e6; color:#b64400; display:flex; align-items:center; justify-content:center; margin-bottom:16px;">
          <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
        </div>
        <h3 class="apple-feature-title">Direct Squad Access</h3>
        <p class="apple-feature-desc">Collaborate directly with lead software architects on Slack, Teams, and dedicated sprints without intermediary friction.</p>
      </div>
    </div>
  </div>
</section>

<!-- Section 05: Featured Product Lineup -->
<section class="apple-section" style="background:#ffffff; border-top:1px solid var(--apple-border-light); border-bottom:1px solid var(--apple-border-light); padding:70px 0;">
  <div class="container">
    <div style="display:flex; justify-content:space-between; align-items:flex-end; margin-bottom:36px; flex-wrap:wrap; gap:16px;">
      <div>
        <div style="font-size:12px; font-weight:700; text-transform:uppercase; color:#b64400; letter-spacing:0.08em; margin-bottom:6px;">PRODUCTION SOFTWARE</div>
        <h2 style="font-size:32px; font-weight:700; letter-spacing:-0.02em; color:#1d1d1f;">Ready-to-Deploy Platforms</h2>
      </div>
      <a href="{{ route('products.index') }}" class="apple-btn apple-btn-secondary">
        View All Products &rarr;
      </a>
    </div>

    <div class="apple-grid-3">
      @forelse($products as $product)
        <div class="apple-feature-card" style="padding:28px;">
          <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:14px;">
            <span style="font-size:11px; font-weight:700; text-transform:uppercase; padding:4px 10px; border-radius:12px; background:#f5f5f7; color:#1d1d1f;">{{ $product->category }}</span>
            @if($product->is_featured)
              <span style="font-size:11px; font-weight:700; text-transform:uppercase; padding:4px 10px; border-radius:12px; background:#e8f4fd; color:#0071e3;">Featured</span>
            @endif
          </div>
          <h3 style="font-size:20px; font-weight:700; margin-bottom:8px; color:#1d1d1f;">{{ $product->name }}</h3>
          <p style="font-size:13px; color:#6e6e73; line-height:1.5; margin-bottom:20px;">{{ $product->short_description }}</p>
          
          <div style="margin-top:auto; display:flex; justify-content:space-between; align-items:center;">
            <a href="{{ route('products.show', $product->slug) }}" style="font-size:13px; font-weight:600; color:#0071e3;">
              Learn more &gt;
            </a>
            <button onclick="openModal('projectInquiryModal')" class="apple-btn apple-btn-secondary" style="padding:6px 14px; font-size:12px;">
              Request Demo
            </button>
          </div>
        </div>
      @empty
        <div class="apple-feature-card" style="grid-column:1/-1; text-align:center; padding:40px;">
          <p style="color:#6e6e73;">Production platforms are being provisioned.</p>
        </div>
      @endforelse
    </div>
  </div>
</section>

<!-- Section 06: Call to Action Banner (Apple Minimalist) -->
<section class="apple-section text-center" style="padding:80px 0;">
  <div class="container container-narrow">
    <span style="font-size:12px; font-weight:700; text-transform:uppercase; color:#b64400; letter-spacing:0.08em;">START YOUR NEXT BUILD</span>
    <h2 style="font-size:clamp(30px, 4.5vw, 44px); font-weight:700; letter-spacing:-0.025em; color:#1d1d1f; margin:10px 0 16px;">
      Ready to move your business forward?
    </h2>
    <p style="font-size:17px; color:#6e6e73; line-height:1.5; margin-bottom:32px;">
      Talk directly to our lead engineers. We evaluate your workflow and deliver modular, scalable solutions on time.
    </p>

    <div style="display:flex; justify-content:center; gap:12px; flex-wrap:wrap;">
      <button onclick="openModal('projectInquiryModal')" class="apple-btn apple-btn-primary" style="padding:12px 28px; font-size:15px;">
        Start a Project
      </button>
      <a href="{{ route('contact') }}" class="apple-btn apple-btn-secondary" style="padding:12px 28px; font-size:15px;">
        Contact Us
      </a>
    </div>
  </div>
</section>

@endsection
