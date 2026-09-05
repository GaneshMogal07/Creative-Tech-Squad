@extends('layouts.app')

@section('title', 'Creative Tech Squad')

@section('content')

<!-- Section 01: Hero -->
<section class="hero-section">
  <div class="hero-glow"></div>
  <div class="container text-center hero-content">
    <div class="eyebrow">
      <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
      CREATIVE TECH SQUAD
    </div>
    
    <h1 class="hero-title">
      Technology that moves your <br class="hidden-mobile">
      <span class="gradient-accent">business forward.</span>
    </h1>

    <p class="section-subtitle mx-auto">
      Creative Tech Squad builds ERP solutions, custom software products, AI-powered applications, and practical technology programs.
    </p>

    <div style="display:flex; justify-content:center; gap:16px; flex-wrap:wrap;">
      <button onclick="openModal('projectInquiryModal')" class="btn btn-primary btn-lg" id="heroStartProjectBtn">
        Start a Project
        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
      </button>
      <a href="{{ route('solutions.index') }}" class="btn btn-secondary btn-lg">
        Explore Solutions
      </a>
    </div>

    <!-- Live Telemetry Stats -->
    <div class="hero-stats">
      <div>
        <div class="hero-stat-value gradient-text">99.9%</div>
        <div class="hero-stat-label">Architecture Reliability</div>
      </div>
      <div>
        <div class="hero-stat-value gradient-text">6+</div>
        <div class="hero-stat-label">Core Tech Platforms</div>
      </div>
      <div>
        <div class="hero-stat-value gradient-text">100%</div>
        <div class="hero-stat-label">Dynamic Database Driven</div>
      </div>
      <div>
        <div class="hero-stat-value gradient-text">10k+</div>
        <div class="hero-stat-label">Daily Transacting Users</div>
      </div>
    </div>
  </div>
</section>

<!-- Section 02: Trust Statement -->
<section class="section-sm" style="background:var(--cts-white); border-top:1px solid var(--cts-border); border-bottom:1px solid var(--cts-border);">
  <div class="container text-center container-narrow">
    <p style="font-size:clamp(1.25rem, 2.2vw, 1.75rem); font-weight:600; color:var(--cts-navy); line-height:1.45;">
      “We combine business understanding, robust software engineering, and creative design to build digital platforms people can actually use.”
    </p>
  </div>
</section>

<!-- Section 03: What We Build -->
<section class="section">
  <div class="container">
    <div class="text-center" style="margin-bottom:60px;">
      <span class="eyebrow">Enterprise Capabilities</span>
      <h2 class="section-title">Engineered for Scale & Clarity</h2>
      <p class="section-subtitle mx-auto">From mission-critical ERP operations to intelligent AI agents, we engineer resilient software architectures.</p>
    </div>

    <div class="grid grid-4">
      <div class="card card-glass">
        <div style="width:52px; height:52px; border-radius:14px; background:var(--cts-blue-light); color:var(--cts-blue); display:flex; align-items:center; justify-content:center; font-size:1.5rem; margin-bottom:20px;">
          🏢
        </div>
        <h3 style="font-size:1.35rem; margin-bottom:12px;">ERP Solutions</h3>
        <p style="color:var(--cts-text-muted); font-size:0.95rem; margin-bottom:20px;">
          Tailored business workflows, HRMS, multi-shift biometric attendance, automated payroll, and audit trails.
        </p>
        <a href="{{ route('solutions.show', 'erp-solutions') }}" style="color:var(--cts-blue); font-weight:600; font-size:0.9rem; display:inline-flex; align-items:center; gap:6px;">
          Learn more &rarr;
        </a>
      </div>

      <div class="card card-glass">
        <div style="width:52px; height:52px; border-radius:14px; background:var(--cts-purple-light); color:var(--cts-purple); display:flex; align-items:center; justify-content:center; font-size:1.5rem; margin-bottom:20px;">
          💻
        </div>
        <h3 style="font-size:1.35rem; margin-bottom:12px;">Custom Products</h3>
        <p style="color:var(--cts-text-muted); font-size:0.95rem; margin-bottom:20px;">
          Purpose-built SaaS web platforms, executive dashboards, billing engines, and client portals.
        </p>
        <a href="{{ route('solutions.show', 'custom-software') }}" style="color:var(--cts-purple); font-weight:600; font-size:0.9rem; display:inline-flex; align-items:center; gap:6px;">
          Learn more &rarr;
        </a>
      </div>

      <div class="card card-glass">
        <div style="width:52px; height:52px; border-radius:14px; background:#E0F2FE; color:#0284C7; display:flex; align-items:center; justify-content:center; font-size:1.5rem; margin-bottom:20px;">
          ✨
        </div>
        <h3 style="font-size:1.35rem; margin-bottom:12px;">AI Solutions</h3>
        <p style="color:var(--cts-text-muted); font-size:0.95rem; margin-bottom:20px;">
          RAG knowledge assistants, smart document OCR, invoice parsing, and predictive workflow automation.
        </p>
        <a href="{{ route('ai') }}" style="color:#0284C7; font-weight:600; font-size:0.9rem; display:inline-flex; align-items:center; gap:6px;">
          Explore AI &rarr;
        </a>
      </div>

      <div class="card card-glass">
        <div style="width:52px; height:52px; border-radius:14px; background:#DCFCE7; color:#16A34A; display:flex; align-items:center; justify-content:center; font-size:1.5rem; margin-bottom:20px;">
          🎓
        </div>
        <h3 style="font-size:1.35rem; margin-bottom:12px;">Education & Internships</h3>
        <p style="color:var(--cts-text-muted); font-size:0.95rem; margin-bottom:20px;">
          Intensive cohort engineering programs and hands-on internships in Laravel, Spring Boot, and AI.
        </p>
        <a href="{{ route('education') }}" style="color:#16A34A; font-weight:600; font-size:0.9rem; display:inline-flex; align-items:center; gap:6px;">
          View tracks &rarr;
        </a>
      </div>
    </div>
  </div>
</section>

<!-- Section 04: ERP Highlight -->
<section class="section" style="background:var(--cts-white);">
  <div class="container">
    <div class="grid grid-2" style="align-items:center; gap:60px;">
      <div>
        <span class="eyebrow">Flagship Platform</span>
        <h2 class="section-title">One platform.<br><span class="gradient-accent">Smarter operations.</span></h2>
        <p style="color:var(--cts-text-muted); font-size:1.1rem; margin-bottom:24px; line-height:1.6;">
          CTS develops configurable, high-throughput ERP ecosystems for HR, attendance, payroll, manufacturing, education, and institutional workflows.
        </p>

        <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:32px;">
          <div style="display:flex; align-items:center; gap:10px;">
            <span style="color:#10B981; font-weight:bold;">✔</span>
            <span style="font-size:0.95rem; font-weight:600;">HR & Employee Hierarchy</span>
          </div>
          <div style="display:flex; align-items:center; gap:10px;">
            <span style="color:#10B981; font-weight:bold;">✔</span>
            <span style="font-size:0.95rem; font-weight:600;">Biometric Attendance Sync</span>
          </div>
          <div style="display:flex; align-items:center; gap:10px;">
            <span style="color:#10B981; font-weight:bold;">✔</span>
            <span style="font-size:0.95rem; font-weight:600;">Automated Payroll & Taxes</span>
          </div>
          <div style="display:flex; align-items:center; gap:10px;">
            <span style="color:#10B981; font-weight:bold;">✔</span>
            <span style="font-size:0.95rem; font-weight:600;">Role-Based Access Control</span>
          </div>
          <div style="display:flex; align-items:center; gap:10px;">
            <span style="color:#10B981; font-weight:bold;">✔</span>
            <span style="font-size:0.95rem; font-weight:600;">Multi-Level Approvals</span>
          </div>
          <div style="display:flex; align-items:center; gap:10px;">
            <span style="color:#10B981; font-weight:bold;">✔</span>
            <span style="font-size:0.95rem; font-weight:600;">Instant Analytics & Exports</span>
          </div>
        </div>

        <div style="display:flex; gap:16px;">
          <a href="{{ route('products.show', 'cts-enterprise-erp') }}" class="btn btn-primary">Explore CTS ERP</a>
          <button onclick="openModal('projectInquiryModal')" class="btn btn-secondary">Request Demo</button>
        </div>
      </div>

      <div>
        <div class="card card-dark" style="padding:40px; box-shadow:var(--cts-shadow-lg);">
          <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:24px; padding-bottom:16px; border-bottom:1px solid rgba(255,255,255,0.1);">
            <div style="font-weight:700; font-size:1.1rem; color:white;">CTS ERP Operations Console</div>
            <span class="badge badge-success">Live Sync Active</span>
          </div>

          <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:24px;">
            <div style="background:rgba(255,255,255,0.05); padding:16px; border-radius:12px;">
              <div style="font-size:0.8rem; color:#94A3B8;">On-Prem & Cloud Attendance</div>
              <div style="font-size:1.4rem; font-weight:700; color:white; margin-top:4px;">420 / 435 Active</div>
            </div>
            <div style="background:rgba(255,255,255,0.05); padding:16px; border-radius:12px;">
              <div style="font-size:0.8rem; color:#94A3B8;">Payroll Reconciliation</div>
              <div style="font-size:1.4rem; font-weight:700; color:#11C5E8; margin-top:4px;">100% Calculated</div>
            </div>
          </div>

          <p style="font-size:0.88rem; color:#94A3B8; line-height:1.6;">
            Modular architecture allows CTS ERP to seamlessly expand with your organization—supporting multi-plant manufacturing, multi-campus universities, and distributed service teams.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Section 05: Technology Stack -->
<section class="section-sm" style="background:var(--cts-bg-alt); text-align:center;">
  <div class="container">
    <span class="eyebrow">Enterprise Tech Stack</span>
    <h3 style="font-size:1.6rem; margin-bottom:12px;">Powered by Proven Technologies</h3>
    <p style="color:var(--cts-text-muted); font-size:0.95rem; max-width:600px; margin:0 auto 24px;">
      We build resilient software on time-tested enterprise stacks.
    </p>

    <div class="tech-pills">
      <div class="tech-pill">⚡ Laravel / PHP 8.2+</div>
      <div class="tech-pill">☕ Java Spring Boot</div>
      <div class="tech-pill">🅰 Angular & TypeScript</div>
      <div class="tech-pill">🗄 MySQL & PostgreSQL</div>
      <div class="tech-pill">🔌 RESTful APIs</div>
      <div class="tech-pill">🧠 AI / LLM Integration</div>
      <div class="tech-pill">🐳 Docker & Linux</div>
      <div class="tech-pill">🔒 Enterprise Auth & Security</div>
    </div>
  </div>
</section>

<!-- Section 06: Featured Products -->
<section class="section">
  <div class="container">
    <div style="display:flex; justify-content:space-between; align-items:flex-end; margin-bottom:48px; flex-wrap:wrap; gap:20px;">
      <div>
        <span class="eyebrow">Software Products</span>
        <h2 class="section-title">Ready-to-Deploy Platforms</h2>
      </div>
      <a href="{{ route('products.index') }}" class="btn btn-secondary">
        View All Products &rarr;
      </a>
    </div>

    <div class="grid grid-3">
      @forelse($products as $product)
        <div class="card">
          <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px;">
            <span class="badge badge-blue">{{ $product->category }}</span>
            @if($product->is_featured)
              <span class="badge badge-purple">Featured</span>
            @endif
          </div>
          <h3 style="font-size:1.3rem; margin-bottom:10px;">{{ $product->name }}</h3>
          <p style="color:var(--cts-text-muted); font-size:0.92rem; margin-bottom:20px; line-height:1.55;">
            {{ $product->short_description }}
          </p>

          @if(!empty($product->technology_stack))
            <div style="display:flex; flex-wrap:wrap; gap:6px; margin-bottom:20px;">
              @foreach(array_slice($product->technology_stack, 0, 3) as $tech)
                <span style="font-size:0.75rem; background:var(--cts-bg-alt); padding:3px 8px; border-radius:4px; color:#475569; font-weight:600;">{{ $tech }}</span>
              @endforeach
            </div>
          @endif

          <a href="{{ route('products.show', $product->slug) }}" class="btn btn-primary btn-sm" style="width:100%;">
            View Platform Details
          </a>
        </div>
      @empty
        <p>No products available yet.</p>
      @endforelse
    </div>
  </div>
</section>

<!-- Section 07: AI Dark Feature -->
<section class="section" style="padding-top:0;">
  <div class="container">
    <div class="ai-dark-wrapper">
      <div class="ai-glow-bg"></div>
      <div class="grid grid-2" style="align-items:center; gap:40px; position:relative; z-index:1;">
        <div>
          <span class="eyebrow dark">AI Readiness</span>
          <h2 style="font-size:clamp(2rem, 3.5vw, 3rem); color:white; margin-bottom:20px; line-height:1.15;">
            Make your software <br><span style="color:#11C5E8;">infinitely smarter.</span>
          </h2>
          <p style="color:#94A3B8; font-size:1.05rem; margin-bottom:28px; line-height:1.6;">
            We integrate practical artificial intelligence directly into your daily operational tools: automatic document parsing, semantic search over company SOPs, and predictive workflow alerts.
          </p>

          <div style="display:flex; gap:16px; flex-wrap:wrap;">
            <a href="{{ route('ai') }}" class="btn btn-gradient">Explore AI Capabilities</a>
            <button onclick="openModal('projectInquiryModal')" class="btn btn-outline-white">Talk About AI</button>
          </div>
        </div>

        <div>
          <!-- Live Interactive AI Simulation Box -->
          <div style="background:rgba(13, 27, 46, 0.9); border:1px solid rgba(255, 255, 255, 0.12); border-radius:18px; padding:24px; box-shadow:0 15px 35px rgba(0,0,0,0.5);">
            <div style="display:flex; align-items:center; gap:8px; margin-bottom:16px; padding-bottom:12px; border-bottom:1px solid rgba(255,255,255,0.08);">
              <div style="width:10px; height:10px; border-radius:50%; background:#10B981;"></div>
              <span style="font-size:0.85rem; font-weight:600; color:#E2E8F0;">CTS Intelligent RAG Simulator</span>
            </div>

            <div id="aiDemoResponse" style="min-height:90px; font-size:0.92rem; color:#CBD5E1; line-height:1.55; margin-bottom:16px; background:rgba(0,0,0,0.25); padding:14px; border-radius:10px;">
              <em>Ask how CTS AI processes ERP logs, extracts invoices, or accelerates software learning...</em>
            </div>

            <div style="display:flex; gap:10px;">
              <input type="text" id="aiDemoInput" placeholder="e.g. How does AI help ERP attendance?" style="flex:1; background:rgba(255,255,255,0.08); border:1px solid rgba(255,255,255,0.15); border-radius:8px; padding:10px 14px; color:white; font-size:0.9rem;">
              <button id="aiDemoSubmit" class="btn btn-gradient btn-sm">
                <span id="aiDemoSpinner" style="display:none;">⏳</span>
                Query AI
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Section 08: Education & Internships -->
<section class="section" style="background:var(--cts-white);">
  <div class="container">
    <div style="display:flex; justify-content:space-between; align-items:flex-end; margin-bottom:48px; flex-wrap:wrap; gap:20px;">
      <div>
        <span class="eyebrow">Practical Learning</span>
        <h2 class="section-title">Learn Technology by Building It</h2>
        <p class="section-subtitle" style="margin-bottom:0;">Real codebases, architecture reviews, pull requests, and production deployments.</p>
      </div>
      <div style="display:flex; gap:12px;">
        <a href="{{ route('education') }}" class="btn btn-secondary">All Courses</a>
        <a href="{{ route('internships') }}" class="btn btn-primary">Apply for Internship</a>
      </div>
    </div>

    <div class="grid grid-2">
      @forelse($programs as $program)
        <div class="card" style="display:flex; flex-direction:column; justify-content:space-between;">
          <div>
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:14px;">
              <span class="badge badge-purple">{{ $program->duration }}</span>
              <span style="font-size:0.85rem; color:#64748B; font-weight:600;">{{ $program->level }}</span>
            </div>
            <h3 style="font-size:1.35rem; margin-bottom:12px;">{{ $program->title }}</h3>
            <p style="color:var(--cts-text-muted); font-size:0.95rem; margin-bottom:18px; line-height:1.55;">
              {{ $program->description }}
            </p>

            @if(!empty($program->skills))
              <div style="display:flex; flex-wrap:wrap; gap:6px; margin-bottom:20px;">
                @foreach($program->skills as $skill)
                  <span style="font-size:0.75rem; background:#F1F5F9; color:#334155; padding:3px 9px; border-radius:4px; font-weight:600;">{{ $skill }}</span>
                @endforeach
              </div>
            @endif
          </div>

          <div style="display:flex; justify-content:space-between; align-items:center; border-top:1px solid var(--cts-border); padding-top:16px;">
            <span style="font-weight:700; color:var(--cts-navy); font-size:1.05rem;">{{ $program->fee ?? 'Scholarships Open' }}</span>
            <a href="{{ route('education.show', $program->slug) }}" class="btn btn-secondary btn-sm">Program Details &rarr;</a>
          </div>
        </div>
      @empty
        <p>No programs available currently.</p>
      @endforelse
    </div>
  </div>
</section>

<!-- Section 09: Engineering Process -->
<section class="section">
  <div class="container text-center">
    <span class="eyebrow">Methodology</span>
    <h2 class="section-title">How We Deliver Results</h2>
    <p class="section-subtitle mx-auto">From initial problem discovery to continuous cloud refinement.</p>

    <div class="grid grid-4" style="margin-top:50px;">
      <div class="card card-glass" style="text-align:left;">
        <div class="step-number">01</div>
        <h3 style="font-size:1.25rem; margin-bottom:10px;">Discover</h3>
        <p style="color:var(--cts-text-muted); font-size:0.92rem;">
          Deep domain analysis, stakeholder workflows, database models, and clear ROI definition.
        </p>
      </div>

      <div class="card card-glass" style="text-align:left;">
        <div class="step-number">02</div>
        <h3 style="font-size:1.25rem; margin-bottom:10px;">Design</h3>
        <p style="color:var(--cts-text-muted); font-size:0.92rem;">
          Apple-inspired minimal user experience, responsive wireframes, schema diagrams, and API contracts.
        </p>
      </div>

      <div class="card card-glass" style="text-align:left;">
        <div class="step-number">03</div>
        <h3 style="font-size:1.25rem; margin-bottom:10px;">Build</h3>
        <p style="color:var(--cts-text-muted); font-size:0.92rem;">
          Clean modular engineering in Laravel / Spring Boot / Angular with automated tests and CI/CD pipelines.
        </p>
      </div>

      <div class="card card-glass" style="text-align:left;">
        <div class="step-number">04</div>
        <h3 style="font-size:1.25rem; margin-bottom:10px;">Improve</h3>
        <p style="color:var(--cts-text-muted); font-size:0.92rem;">
          Production deployment, real-time performance telemetry, automated backups, and version updates.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- Section 10: Testimonials & Final CTA -->
<section class="section" style="background:var(--cts-white);">
  <div class="container">
    <div class="text-center" style="margin-bottom:50px;">
      <span class="eyebrow">Client Feedback</span>
      <h2 class="section-title">Trusted by Leaders & Learners</h2>
    </div>

    <div class="grid grid-3" style="margin-bottom:80px;">
      @foreach($testimonials as $test)
        <div class="card" style="display:flex; flex-direction:column; justify-content:space-between;">
          <p style="font-size:0.95rem; color:#475569; font-style:italic; line-height:1.6; margin-bottom:20px;">
            “{{ $test->message }}”
          </p>
          <div style="display:flex; align-items:center; gap:12px; border-top:1px solid var(--cts-border); padding-top:14px;">
            <div style="width:40px; height:40px; border-radius:50%; background:var(--cts-navy); color:white; display:flex; align-items:center; justify-content:center; font-weight:bold;">
              {{ substr($test->name, 0, 1) }}
            </div>
            <div>
              <div style="font-weight:700; color:var(--cts-navy); font-size:0.95rem;">{{ $test->name }}</div>
              <div style="font-size:0.8rem; color:#64748B;">{{ $test->designation }} • {{ $test->company }}</div>
            </div>
          </div>
        </div>
      @endforeach
    </div>

    <!-- Final Call to Action -->
    <div class="card card-dark text-center" style="padding:60px 30px; border-radius:var(--cts-radius-xl);">
      <h2 style="font-size:clamp(2rem, 4vw, 3.2rem); color:white; margin-bottom:16px;">
        Have an idea or business challenge?<br>
        <span class="gradient-accent">Let's build it together.</span>
      </h2>
      <p style="color:#94A3B8; font-size:1.15rem; max-width:620px; margin:0 auto 36px;">
        Talk directly with our software architects to build custom ERPs, scalable client products, or join our hands-on engineering programs.
      </p>
      <div style="display:flex; justify-content:center; gap:16px; flex-wrap:wrap;">
        <button onclick="openModal('projectInquiryModal')" class="btn btn-gradient btn-lg">
          Start a Project
        </button>
        <a href="{{ route('internships') }}" class="btn btn-outline-white btn-lg">
          Join Internship Program
        </a>
      </div>
    </div>
  </div>
</section>

@endsection
