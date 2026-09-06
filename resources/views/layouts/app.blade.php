<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="@yield('meta_description', \App\Models\Setting::get('meta_description', 'Creative Tech Squad builds ERP solutions, custom software products, AI-powered applications, and practical technology programs.'))">
  <meta name="keywords" content="@yield('meta_keywords', \App\Models\Setting::get('meta_keywords', 'Creative Tech Squad, ERP Solutions, Custom Software, AI, Web Development'))">
  <meta property="og:title" content="@yield('title', 'Creative Tech Squad') | Enterprise ERP & Custom Software">
  <meta property="og:description" content="@yield('meta_description', 'Building smart digital solutions with teamwork, creativity, and technology.')">
  <meta property="og:type" content="website">
  <meta property="og:url" content="{{ url()->current() }}">
  
  <title>@yield('title', 'Creative Tech Squad') — Technology That Moves Business Forward</title>

  <!-- Google Fonts & Styles -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  <!-- Favicon SVG -->
  <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><rect width='100' height='100' rx='22' fill='%231d1d1f'/><text x='50%25' y='64%25' font-size='44' font-weight='bold' fill='white' text-anchor='middle' font-family='sans-serif'>CTS</text></svg>">

  @stack('styles')
</head>
<body>

  <!-- Toast Flash Alerts -->
  <div class="toast-container">
    @if(session('success'))
      <div class="toast" style="border-left: 4px solid #34c759;">
        <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="#34c759"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
        <div>
          <strong style="font-size:13px; color:#1d1d1f;">Success</strong>
          <p style="font-size:12px; color:#6e6e73;">{{ session('success') }}</p>
        </div>
      </div>
    @endif
    @if($errors->any())
      <div class="toast" style="border-left: 4px solid #ff3b30;">
        <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="#ff3b30"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
        <div>
          <strong style="font-size:13px; color:#1d1d1f;">Please check errors</strong>
          <p style="font-size:12px; color:#6e6e73;">{{ $errors->first() }}</p>
        </div>
      </div>
    @endif
  </div>

  <!-- Apple Announcement Ribbon -->
  <div class="apple-announcement-ribbon">
    <span>Get enterprise deployment support plus AI integration on selected software platforms.</span>
    <a href="{{ route('solutions.index') }}">See solutions &gt;</a>
  </div>

  <!-- Mobile Navigation Backdrop Overlay -->
  <div class="nav-backdrop" id="navBackdrop"></div>

  <!-- Mobile Navigation Drawer (Sliding from Left) -->
  <aside class="mobile-drawer" id="mobileDrawer">
    <div class="mobile-drawer-header">
      <a href="{{ route('home') }}" class="apple-nav-logo" onclick="closeMobileDrawer()">
        <img src="{{ asset('images/logo.png') }}" alt="Creative Tech Squad" style="height:32px; max-width:160px; object-fit:contain;">
      </a>
      <button class="drawer-close-btn" id="drawerCloseBtn" aria-label="Close Menu" type="button">
        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
      </button>
    </div>

    <ul class="mobile-nav-list">
      <li><a href="{{ route('home') }}" class="mobile-nav-link {{ request()->routeIs('home') ? 'active' : '' }}"><span class="nav-icon"><svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg></span> Home</a></li>
      <li><a href="{{ route('solutions.index') }}" class="mobile-nav-link {{ request()->routeIs('solutions.*') ? 'active' : '' }}"><span class="nav-icon"><svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg></span> Solutions</a></li>
      <li><a href="{{ route('products.index') }}" class="mobile-nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}"><span class="nav-icon"><svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg></span> Products</a></li>
      <li><a href="{{ route('ai') }}" class="mobile-nav-link {{ request()->routeIs('ai') ? 'active' : '' }}"><span class="nav-icon"><svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg></span> AI Engine</a></li>
      <li><a href="{{ route('education') }}" class="mobile-nav-link {{ request()->routeIs('education*') ? 'active' : '' }}"><span class="nav-icon"><svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5"/></svg></span> Education</a></li>
      <li><a href="{{ route('internships') }}" class="mobile-nav-link {{ request()->routeIs('internships*') ? 'active' : '' }}"><span class="nav-icon"><svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg></span> Internships</a></li>
      <li><a href="{{ route('portfolio') }}" class="mobile-nav-link {{ request()->routeIs('portfolio*') ? 'active' : '' }}"><span class="nav-icon"><svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg></span> Portfolio</a></li>
      <li><a href="{{ route('careers') }}" class="mobile-nav-link {{ request()->routeIs('careers*') ? 'active' : '' }}"><span class="nav-icon"><svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/></svg></span> Careers</a></li>
      <li><a href="{{ route('blog.index') }}" class="mobile-nav-link {{ request()->routeIs('blog.*') ? 'active' : '' }}"><span class="nav-icon"><svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg></span> Blog</a></li>
      <li><a href="{{ route('about') }}" class="mobile-nav-link {{ request()->routeIs('about') ? 'active' : '' }}"><span class="nav-icon"><svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg></span> About</a></li>
      <li><a href="{{ route('contact') }}" class="mobile-nav-link {{ request()->routeIs('contact') ? 'active' : '' }}"><span class="nav-icon"><svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg></span> Contact</a></li>
    </ul>

    <div class="mobile-drawer-footer">
      <button onclick="closeMobileDrawer(); openModal('projectInquiryModal');" class="apple-btn apple-btn-primary" style="width:100%; padding:12px; margin-bottom:12px; font-size:14px;">
        Start a Project &rarr;
      </button>
      <div class="drawer-contact-info">
        <a href="tel:+919511951568" style="display:flex; align-items:center; gap:6px;">
          <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
          +91 95119 51568
        </a>
        <a href="mailto:{{ \App\Models\Setting::get('contact_email', 'contact@creativetechsquad.in') }}" style="display:flex; align-items:center; gap:6px;">
          <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
          {{ \App\Models\Setting::get('contact_email', 'contact@creativetechsquad.in') }}
        </a>
      </div>
    </div>
  </aside>

  <!-- Apple Global Header Navigation -->
  <header class="apple-header">
    <div class="apple-nav-container">
      <a href="{{ route('home') }}" class="apple-nav-logo">
        <img src="{{ asset('images/logo.png') }}" alt="Creative Tech Squad" style="height:28px; max-width:140px; object-fit:contain;">
      </a>

      <nav>
        <ul class="apple-nav-list">
          <li><a href="{{ route('home') }}" class="apple-nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
          <li><a href="{{ route('solutions.index') }}" class="apple-nav-link {{ request()->routeIs('solutions.*') ? 'active' : '' }}">Solutions</a></li>
          <li><a href="{{ route('products.index') }}" class="apple-nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}">Products</a></li>
          <li><a href="{{ route('ai') }}" class="apple-nav-link {{ request()->routeIs('ai') ? 'active' : '' }}">AI</a></li>
          <li><a href="{{ route('education') }}" class="apple-nav-link {{ request()->routeIs('education*') ? 'active' : '' }}">Education</a></li>
          <li><a href="{{ route('internships') }}" class="apple-nav-link {{ request()->routeIs('internships*') ? 'active' : '' }}">Internships</a></li>
          <li><a href="{{ route('portfolio') }}" class="apple-nav-link {{ request()->routeIs('portfolio*') ? 'active' : '' }}">Portfolio</a></li>
          <li><a href="{{ route('careers') }}" class="apple-nav-link {{ request()->routeIs('careers*') ? 'active' : '' }}">Careers</a></li>
          <li><a href="{{ route('blog.index') }}" class="apple-nav-link {{ request()->routeIs('blog.*') ? 'active' : '' }}">Blog</a></li>
          <li><a href="{{ route('about') }}" class="apple-nav-link {{ request()->routeIs('about') ? 'active' : '' }}">About</a></li>
          <li><a href="{{ route('contact') }}" class="apple-nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a></li>
        </ul>
      </nav>

      <div class="apple-nav-actions">
        <button onclick="openModal('projectInquiryModal')" class="apple-btn apple-btn-primary apple-nav-cta-btn" title="Start a Project">
          Start a Project
        </button>
        <button class="apple-mobile-toggle" aria-label="Toggle Menu" id="mobileMenuBtn" type="button">
          <svg class="apple-menu-icon" width="18" height="18" viewBox="0 0 18 18" fill="none">
            <line x1="2" y1="5.5" x2="16" y2="5.5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/>
            <line x1="2" y1="12.5" x2="16" y2="12.5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/>
          </svg>
        </button>
      </div>
    </div>
  </header>

  <!-- Main Body Content -->
  <main>
    @yield('content')
  </main>

  <!-- Apple Multi-Column Directory Footer (Accordion on Mobile) -->
  <footer class="apple-footer">
    <div class="container">
      <div class="apple-footer-disclaimer">
        <p>1. Enterprise support and cloud maintenance agreements are subject to terms outlined in CTS project service agreements. 2. Creative Tech Squad AI neural assistants operate on verified enterprise data pipelines. 3. Internship and career tracks are available for qualified candidates across Maharashtra and Remote India.</p>
      </div>

      <div class="apple-footer-breadcrumbs">
        <a href="{{ route('home') }}">CTS</a>
        <span>&rsaquo;</span>
        <span>Innovation Hub</span>
        <span>&rsaquo;</span>
        <span>{{ \App\Models\Setting::get('site_name', 'Creative Tech Squad') }}</span>
      </div>

      <div class="apple-footer-directory">
        <!-- Col 1: Solutions & Products -->
        <div class="apple-footer-col">
          <button class="apple-footer-accordion-btn" type="button" aria-expanded="false">
            <span>Solutions &amp; Products</span>
            <svg class="apple-footer-chevron" width="12" height="12" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 5 7 9 11 5"></polyline></svg>
          </button>
          <ul class="apple-footer-col-list">
            <li><a href="{{ route('solutions.show', 'erp-solutions') }}">Enterprise ERP Suite</a></li>
            <li><a href="{{ route('solutions.show', 'custom-software') }}">Custom SaaS Products</a></li>
            <li><a href="{{ route('ai') }}">Neural AI &amp; RAG</a></li>
            <li><a href="{{ route('education') }}">Education Lab</a></li>
            <li><a href="{{ route('internships') }}">Internship Tracks</a></li>
            <li><a href="{{ route('products.index') }}">Product Catalog</a></li>
            <li><a href="{{ route('portfolio') }}">Client Case Studies</a></li>
          </ul>
        </div>

        <!-- Col 2: Client Portals -->
        <div class="apple-footer-col">
          <button class="apple-footer-accordion-btn" type="button" aria-expanded="false">
            <span>Client Portals</span>
            <svg class="apple-footer-chevron" width="12" height="12" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 5 7 9 11 5"></polyline></svg>
          </button>
          <ul class="apple-footer-col-list">
            <li><a href="{{ route('admin.login') }}">Staff Admin Portal</a></li>
            <li><a href="javascript:void(0)" onclick="openModal('projectInquiryModal')">Start a Project</a></li>
            <li><a href="{{ route('contact') }}">Submit Inquiry</a></li>
            <li><a href="{{ route('careers') }}">Job Applications</a></li>
            <li><a href="{{ route('internships') }}">Internship Apply</a></li>
          </ul>
        </div>

        <!-- Col 3: Creative Tech Squad -->
        <div class="apple-footer-col">
          <button class="apple-footer-accordion-btn" type="button" aria-expanded="false">
            <span>Creative Tech Squad</span>
            <svg class="apple-footer-chevron" width="12" height="12" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 5 7 9 11 5"></polyline></svg>
          </button>
          <ul class="apple-footer-col-list">
            <li><a href="{{ route('about') }}">About Company</a></li>
            <li><a href="{{ route('careers') }}">Career Opportunities</a></li>
            <li><a href="{{ route('blog.index') }}">Engineering Blog</a></li>
            <li><a href="{{ route('contact') }}">Contact Leadership</a></li>
            <li><a href="tel:+919511951568">+91 95119 51568</a></li>
          </ul>
        </div>

        <!-- Col 4: For Business -->
        <div class="apple-footer-col">
          <button class="apple-footer-accordion-btn" type="button" aria-expanded="false">
            <span>For Business</span>
            <svg class="apple-footer-chevron" width="12" height="12" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 5 7 9 11 5"></polyline></svg>
          </button>
          <ul class="apple-footer-col-list">
            <li><a href="{{ route('solutions.show', 'erp-solutions') }}">Multi-Branch Attendance</a></li>
            <li><a href="{{ route('solutions.show', 'erp-solutions') }}">Biometric HRMS Sync</a></li>
            <li><a href="{{ route('solutions.show', 'custom-software') }}">Manufacturing ERP</a></li>
            <li><a href="{{ route('solutions.show', 'api-integrations') }}">Cloud API Integrations</a></li>
            <li><a href="{{ route('ai') }}">Invoice OCR Parsing</a></li>
          </ul>
        </div>

        <!-- Col 5: CTS Values -->
        <div class="apple-footer-col">
          <button class="apple-footer-accordion-btn" type="button" aria-expanded="false">
            <span>CTS Values</span>
            <svg class="apple-footer-chevron" width="12" height="12" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 5 7 9 11 5"></polyline></svg>
          </button>
          <ul class="apple-footer-col-list">
            <li><a href="{{ route('about') }}">Engineering Excellence</a></li>
            <li><a href="{{ route('privacy') }}">Privacy &amp; Security</a></li>
            <li><a href="{{ route('terms') }}">Transparent Agreements</a></li>
            <li><a href="{{ route('education') }}">Student Mentorship</a></li>
            <li><a href="{{ route('home') }}">Customer First</a></li>
          </ul>
        </div>
      </div>

      <div class="apple-footer-help">
        <p>More ways to connect: <a href="javascript:void(0)" onclick="openSpecialistWidget()">Connect with an Architect</a> or call <a href="tel:+919511951568">+91 95119 51568</a>.</p>
      </div>

      <div class="apple-footer-legal">
        <div class="apple-footer-country">
          <strong>India</strong>
        </div>
        <div class="apple-footer-copy">
          Copyright &copy; {{ date('Y') }} Creative Tech Squad Inc. All rights reserved.
        </div>
        <div class="apple-footer-legal-links">
          <a href="{{ route('privacy') }}">Privacy Policy</a>
          <span class="sep">|</span>
          <a href="{{ route('terms') }}">Terms of Use</a>
          <span class="sep">|</span>
          <a href="{{ route('contact') }}">Service Agreements</a>
          <span class="sep">|</span>
          <a href="{{ route('terms') }}">Legal</a>
          <span class="sep">|</span>
          <a href="{{ route('home') }}">Site Map</a>
        </div>
      </div>
    </div>
  </footer>

  <!-- Apple-Style Project Inquiry Modal -->
  <div class="modal-backdrop" id="projectInquiryModal">
    <div class="modal-dialog">
      <button class="modal-close-btn" onclick="closeModal('projectInquiryModal')">&times;</button>
      <div style="margin-bottom:24px;">
        <span style="font-size:12px; font-weight:700; text-transform:uppercase; color:#b64400; letter-spacing:0.08em;">Creative Tech Squad</span>
        <h3 style="font-size:24px; font-weight:700; color:#1d1d1f; margin-top:4px;">Connect with an Architect</h3>
        <p style="color:#6e6e73; font-size:14px; margin-top:4px;">Tell us about your project. We'll evaluate your workflow and schedule an architecture consultation.</p>
      </div>

      <form action="{{ route('contact.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label class="form-label">Full Name *</label>
          <input type="text" name="name" class="form-control" placeholder="e.g. John Doe" required>
        </div>

        <div class="form-row-2 form-group">
          <div>
            <label class="form-label">Work Email *</label>
            <input type="email" name="email" class="form-control" placeholder="john@company.com" required>
          </div>
          <div>
            <label class="form-label">Phone Number</label>
            <input type="text" name="phone" class="form-control" placeholder="+91 98765 43210">
          </div>
        </div>

        <div class="form-row-2 form-group">
          <div>
            <label class="form-label">Company / Institution</label>
            <input type="text" name="company" class="form-control" placeholder="Company Name">
          </div>
          <div>
            <label class="form-label">Solution Area *</label>
            <select name="inquiry_type" class="form-control form-select" required>
              <option value="ERP Solutions">Enterprise ERP Suite</option>
              <option value="Custom Software">Custom SaaS Product</option>
              <option value="AI Solutions">Neural AI & Automation</option>
              <option value="Education & Training">Education / College Lab</option>
              <option value="Other">General Consulting</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="form-label">Estimated Budget</label>
          <select name="budget_range" class="form-control">
            <option value="Under ₹2,00,000">Under ₹2,00,000</option>
            <option value="₹2,00,000 - ₹5,00,000" selected>₹2,00,000 - ₹5,00,000</option>
            <option value="₹5,00,000 - ₹15,00,000">₹5,00,000 - ₹15,00,000</option>
            <option value="₹15,00,000+">Enterprise (₹15,00,000+)</option>
          </select>
        </div>

        <div class="form-group">
          <label class="form-label">Project Details *</label>
          <textarea name="message" class="form-control" placeholder="Describe the software, ERP modules, or workflows you need..." rows="4" required></textarea>
        </div>

        <button type="submit" class="apple-btn apple-btn-primary" style="width:100%; padding:14px; font-size:15px; border-radius:14px;">Submit Details</button>
      </form>
    </div>
  </div>

  <!-- Floating Specialist Help Button (Bottom Right) -->
  <div class="cts-specialist-widget" id="ctsSpecialistWidget">
    <button class="cts-specialist-trigger" id="ctsSpecialistTrigger" aria-label="Need Help? Chat with a Specialist" type="button">
      <div class="cts-specialist-avatar-wrapper">
        <img src="{{ asset('images/specialist-avatar.jpg') }}" alt="Specialist" class="cts-specialist-avatar-img">
        <span class="cts-online-dot"></span>
      </div>
      <span class="cts-specialist-trigger-label">Ask an Architect</span>
    </button>
  </div>

  <!-- Specialist Help Popover Window (Apple Style) -->
  <div class="cts-specialist-popover" id="ctsSpecialistPopover" role="dialog" aria-modal="true" aria-labelledby="specialistHeading">
    <div class="cts-specialist-popover-header">
      <button class="cts-specialist-close-btn" id="ctsSpecialistCloseBtn" aria-label="Close Help Window" type="button">
        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
      </button>
    </div>

    <div class="cts-specialist-banner-box">
      <img src="{{ asset('images/specialists-banner.jpg') }}" alt="Creative Tech Squad Specialists" class="cts-specialist-banner-img">
    </div>

    <div class="cts-specialist-body">
      <h3 class="cts-specialist-title" id="specialistHeading">We're here to help.</h3>

      <!-- Card 1: Existing Product / ERP Support -->
      <div class="cts-specialist-item">
        <h4 class="cts-specialist-item-title">Support for a product I have.</h4>
        <p class="cts-specialist-item-desc">Do you need technical assistance with a CTS ERP platform, software module, or ongoing SLA support?</p>
        <a href="{{ route('contact') }}" class="apple-blue-pill-btn">
          Visit CTS Support
        </a>
      </div>

      <!-- Card 2: Help with a project or custom build -->
      <div class="cts-specialist-item">
        <h4 class="cts-specialist-item-title">Help with a project or build.</h4>
        <p class="cts-specialist-item-desc">Need to check the status of your software build or discuss new custom modules?</p>
        <button onclick="closeSpecialistWidget(); openModal('projectInquiryModal');" class="apple-blue-pill-btn">
          Project Inquiry
        </button>
      </div>

      <!-- Card 3: Help scoping / purchasing software -->
      <div class="cts-specialist-item">
        <h4 class="cts-specialist-item-title">Help purchasing software.</h4>
        <p class="cts-specialist-item-desc">Would you like more information about an ERP solution, or schedule a live architecture demo?</p>
        <a href="https://wa.me/919511951568?text=Hi%20Creative%20Tech%20Squad%2C%20I%20would%20like%20to%20connect%20with%20a%20Specialist" target="_blank" class="apple-blue-pill-btn">
          Connect With A Specialist
        </a>
      </div>
    </div>

    <div class="cts-specialist-footer">
      <span>India &bull; English</span>
      <a href="tel:+919511951568">📞 +91 95119 51568</a>
    </div>
  </div>

  <!-- App Script -->
  <script src="{{ asset('js/app.js') }}"></script>
  @stack('scripts')
</body>
</html>
