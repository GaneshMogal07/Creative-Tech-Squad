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
      <li><a href="{{ route('home') }}" class="mobile-nav-link {{ request()->routeIs('home') ? 'active' : '' }}"><span class="nav-icon">🏠</span> Home</a></li>
      <li><a href="{{ route('solutions.index') }}" class="mobile-nav-link {{ request()->routeIs('solutions.*') ? 'active' : '' }}"><span class="nav-icon">⚡</span> Solutions</a></li>
      <li><a href="{{ route('products.index') }}" class="mobile-nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}"><span class="nav-icon">📦</span> Products</a></li>
      <li><a href="{{ route('ai') }}" class="mobile-nav-link {{ request()->routeIs('ai') ? 'active' : '' }}"><span class="nav-icon">🤖</span> AI Engine</a></li>
      <li><a href="{{ route('education') }}" class="mobile-nav-link {{ request()->routeIs('education*') ? 'active' : '' }}"><span class="nav-icon">🎓</span> Education</a></li>
      <li><a href="{{ route('internships') }}" class="mobile-nav-link {{ request()->routeIs('internships*') ? 'active' : '' }}"><span class="nav-icon">💼</span> Internships</a></li>
      <li><a href="{{ route('portfolio') }}" class="mobile-nav-link {{ request()->routeIs('portfolio*') ? 'active' : '' }}"><span class="nav-icon">✨</span> Portfolio</a></li>
      <li><a href="{{ route('careers') }}" class="mobile-nav-link {{ request()->routeIs('careers*') ? 'active' : '' }}"><span class="nav-icon">🚀</span> Careers</a></li>
      <li><a href="{{ route('blog.index') }}" class="mobile-nav-link {{ request()->routeIs('blog.*') ? 'active' : '' }}"><span class="nav-icon">📝</span> Blog</a></li>
      <li><a href="{{ route('about') }}" class="mobile-nav-link {{ request()->routeIs('about') ? 'active' : '' }}"><span class="nav-icon">👥</span> About</a></li>
      <li><a href="{{ route('contact') }}" class="mobile-nav-link {{ request()->routeIs('contact') ? 'active' : '' }}"><span class="nav-icon">📬</span> Contact</a></li>
    </ul>

    <div class="mobile-drawer-footer">
      <button onclick="closeMobileDrawer(); openModal('projectInquiryModal');" class="apple-btn apple-btn-primary" style="width:100%; padding:12px; margin-bottom:12px; font-size:14px;">
        Start a Project &rarr;
      </button>
      <div class="drawer-contact-info">
        <a href="tel:+919511951568">📞 +91 95119 51568</a>
        <a href="mailto:creativetechsquad.official@gmail.com">📧 creativetechsquad.official@gmail.com</a>
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

        <div class="form-group" style="display:grid; grid-template-columns:1fr 1fr; gap:14px;">
          <div>
            <label class="form-label">Work Email *</label>
            <input type="email" name="email" class="form-control" placeholder="john@company.com" required>
          </div>
          <div>
            <label class="form-label">Phone Number</label>
            <input type="text" name="phone" class="form-control" placeholder="+91 98765 43210">
          </div>
        </div>

        <div class="form-group" style="display:grid; grid-template-columns:1fr 1fr; gap:14px;">
          <div>
            <label class="form-label">Company / Institution</label>
            <input type="text" name="company" class="form-control" placeholder="Company Name">
          </div>
          <div>
            <label class="form-label">Solution Area *</label>
            <select name="inquiry_type" class="form-control" required>
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
