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

<!-- Section 02: Horizontal Category Ribbon (Screenshot 1) -->
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
        <div class="apple-category-thumb">🏢</div>
        <span class="apple-category-name">ERP Suite</span>
      </a>

      <a href="{{ route('solutions.show', 'custom-software') }}" class="apple-category-item">
        <div class="apple-category-thumb">💻</div>
        <span class="apple-category-name">Custom SaaS</span>
      </a>

      <a href="{{ route('ai') }}" class="apple-category-item">
        <div class="apple-category-thumb">🤖</div>
        <span class="apple-category-name">Neural AI</span>
      </a>

      <a href="{{ route('education') }}" class="apple-category-item">
        <div class="apple-category-thumb">🎓</div>
        <span class="apple-category-name">Education</span>
      </a>

      <a href="{{ route('internships') }}" class="apple-category-item">
        <div class="apple-category-thumb">💼</div>
        <span class="apple-category-name">Internships</span>
      </a>

      <a href="{{ route('portfolio') }}" class="apple-category-item">
        <div class="apple-category-thumb">✨</div>
        <span class="apple-category-name">Portfolio</span>
      </a>

      <a href="{{ route('careers') }}" class="apple-category-item">
        <div class="apple-category-thumb">🚀</div>
        <span class="apple-category-name">Careers</span>
      </a>

      <a href="{{ route('products.index') }}" class="apple-category-item">
        <div class="apple-category-thumb">📦</div>
        <span class="apple-category-name">Products</span>
      </a>

      <a href="{{ route('blog.index') }}" class="apple-category-item">
        <div class="apple-category-thumb">📝</div>
        <span class="apple-category-name">Tech Blog</span>
      </a>

      <a href="{{ route('contact') }}" class="apple-category-item">
        <div class="apple-category-thumb">📬</div>
        <span class="apple-category-name">Contact</span>
      </a>
    </div>
  </div>
</section>

<!-- Section 03: "The latest." (Screenshot 2: Apple Store Cards Slider) -->
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
      
      <!-- Apple Card 1: CTS Enterprise ERP -->
      <a href="{{ route('products.show', 'cts-enterprise-erp') }}" class="apple-card">
        <div>
          <div class="apple-card-eyebrow">FLAGSHIP ERP</div>
          <h3 class="apple-card-title">CTS Enterprise ERP</h3>
          <p class="apple-card-desc">Now with biometric multi-shift sync and AI payroll reconciliation.</p>
          <div class="apple-card-price">Production Ready Platform</div>
        </div>
        <div class="apple-card-visual">
          <div class="apple-card-visual-inner">
            <div>
              <div style="font-size:42px; margin-bottom:8px;">📊</div>
              <div style="font-size:14px; font-weight:700; color:#1d1d1f;">Real-Time Operations</div>
              <div style="font-size:12px; color:#6e6e73; margin-top:4px;">10k+ Daily Active Users</div>
            </div>
          </div>
        </div>
      </a>

      <!-- Apple Card 2: Custom SaaS Studio -->
      <a href="{{ route('solutions.show', 'custom-software') }}" class="apple-card">
        <div>
          <div class="apple-card-eyebrow">CUSTOM SOFTWARE</div>
          <h3 class="apple-card-title">Custom SaaS Studio</h3>
          <p class="apple-card-desc">Purpose-built web platforms, executive dashboards, and billing engines.</p>
          <div class="apple-card-price">Full-Stack Laravel & Angular</div>
        </div>
        <div class="apple-card-visual">
          <div class="apple-card-visual-inner">
            <div>
              <div style="font-size:42px; margin-bottom:8px;">⚡</div>
              <div style="font-size:14px; font-weight:700; color:#1d1d1f;">Rapid Sprint Delivery</div>
              <div style="font-size:12px; color:#6e6e73; margin-top:4px;">4-Week Production MVP</div>
            </div>
          </div>
        </div>
      </a>

      <!-- Apple Card 3: Neural AI Pro (Dark Pro Card from Screenshot 2!) -->
      <a href="{{ route('ai') }}" class="apple-card apple-card-dark">
        <div>
          <div class="apple-card-eyebrow" style="color:#ff6934;">CTS NEURAL ENGINE</div>
          <h3 class="apple-card-title">Neural AI Studio</h3>
          <p class="apple-card-desc">All out intelligence. Zero hallucination RAG pipelines & document parsing.</p>
          <div class="apple-card-price">Enterprise Knowledge Base</div>
        </div>
        <div class="apple-card-visual">
          <div class="apple-card-visual-inner">
            <div>
              <div style="font-size:42px; margin-bottom:8px;">🧠</div>
              <div style="font-size:14px; font-weight:700; color:#ffffff;">DeepSeek & OpenAI LLMs</div>
              <div style="font-size:12px; color:#a1a1a6; margin-top:4px;">Sub-100ms Inference</div>
            </div>
          </div>
        </div>
      </a>

      <!-- Apple Card 4: Education & Internships -->
      <a href="{{ route('education') }}" class="apple-card">
        <div>
          <div class="apple-card-eyebrow">EDUCATION LAB</div>
          <h3 class="apple-card-title">Engineering Cohort</h3>
          <p class="apple-card-desc">Hands-on practical full-stack Laravel, Java Spring Boot & AI training.</p>
          <div class="apple-card-price">Internships & Placement Tracks</div>
        </div>
        <div class="apple-card-visual">
          <div class="apple-card-visual-inner">
            <div>
              <div style="font-size:42px; margin-bottom:8px;">🎓</div>
              <div style="font-size:14px; font-weight:700; color:#1d1d1f;">Real Codebase PRs</div>
              <div style="font-size:12px; color:#6e6e73; margin-top:4px;">Industry Certification</div>
            </div>
          </div>
        </div>
      </a>

    </div>
  </div>
</section>

<!-- Section 04: "The CTS difference." (Screenshot 2 & 3: Reasons to Partner) -->
<section class="apple-section">
  <div class="container">
    <div class="apple-section-header">
      <h2 class="apple-section-title">The CTS difference.</h2>
      <span class="apple-section-subtitle">Even more reasons to partner with us.</span>
    </div>

    <div class="apple-grid-4">
      <div class="apple-feature-card">
        <span class="apple-feature-icon">🛡️</span>
        <h3 class="apple-feature-title">99.9% Reliability</h3>
        <p class="apple-feature-desc">Resilient database architectures, tested queries, and SLA-backed infrastructure for enterprise operations.</p>
      </div>

      <div class="apple-feature-card">
        <span class="apple-feature-icon">⚡</span>
        <h3 class="apple-feature-title">Fast Agile Sprints</h3>
        <p class="apple-feature-desc">From product scope to live staging deployment in weeks, with transparent code reviews and continuous delivery.</p>
      </div>

      <div class="apple-feature-card">
        <span class="apple-feature-icon">🔒</span>
        <h3 class="apple-feature-title">Enterprise Security</h3>
        <p class="apple-feature-desc">Role-based access control, cryptographic password hashing, audit logs, and GDPR/IT compliance built-in.</p>
      </div>

      <div class="apple-feature-card">
        <span class="apple-feature-icon">🤝</span>
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
