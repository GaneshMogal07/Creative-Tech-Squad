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
  <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><defs><linearGradient id='g' x1='0%25' y1='0%25' x2='100%25' y2='100%25'><stop offset='0%25' stop-color='%23007EFA'/><stop offset='100%25' stop-color='%237B2CFF'/></linearGradient></defs><rect width='100' height='100' rx='24' fill='url(%23g)'/><text x='50%25' y='64%25' font-size='48' font-weight='bold' fill='white' text-anchor='middle' font-family='sans-serif'>CTS</text></svg>">

  @stack('styles')
</head>
<body>

  <!-- Toast Flash Alerts -->
  <div class="toast-container">
    @if(session('success'))
      <div class="toast toast-success">
        <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="#10B981"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
        <div>
          <strong>Success</strong>
          <p style="font-size:0.88rem; color:#475569;">{{ session('success') }}</p>
        </div>
      </div>
    @endif
    @if($errors->any())
      <div class="toast toast-error">
        <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="#EF4444"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        <div>
          <strong>Please check errors</strong>
          <p style="font-size:0.88rem; color:#475569;">{{ $errors->first() }}</p>
        </div>
      </div>
    @endif
  </div>

  <!-- Mobile Navigation Backdrop Overlay -->
  <div class="nav-backdrop" id="navBackdrop"></div>

  <!-- Mobile Drawer Menu (Outside header to escape CSS stacking context) -->
  <aside class="mobile-drawer" id="mobileDrawer">
    <!-- Mobile Drawer Header -->
    <div class="mobile-drawer-header">
      <a href="{{ route('home') }}" class="brand-logo" onclick="closeMobileDrawer()">
        <img src="{{ asset('images/logo.png') }}" alt="Creative Tech Squad" style="height:36px; max-width:170px; width:auto; display:block; object-fit:contain;">
      </a>
      <button class="drawer-close-btn" id="drawerCloseBtn" aria-label="Close Menu" type="button">
        <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
      </button>
    </div>

    <ul class="mobile-nav-list">
      <li><a href="{{ route('home') }}" class="mobile-nav-link {{ request()->routeIs('home') ? 'active' : '' }}"><span class="nav-icon">🏠</span> Home</a></li>
      <li><a href="{{ route('about') }}" class="mobile-nav-link {{ request()->routeIs('about') ? 'active' : '' }}"><span class="nav-icon">👥</span> About Us</a></li>
      <li><a href="{{ route('solutions.index') }}" class="mobile-nav-link {{ request()->routeIs('solutions.*') ? 'active' : '' }}"><span class="nav-icon">⚡</span> Solutions</a></li>
      <li><a href="{{ route('products.index') }}" class="mobile-nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}"><span class="nav-icon">📦</span> Products</a></li>
      <li><a href="{{ route('ai') }}" class="mobile-nav-link {{ request()->routeIs('ai') ? 'active' : '' }}"><span class="nav-icon">🤖</span> AI Engine</a></li>
      <li><a href="{{ route('education') }}" class="mobile-nav-link {{ request()->routeIs('education*') ? 'active' : '' }}"><span class="nav-icon">🎓</span> Education</a></li>
      <li><a href="{{ route('internships') }}" class="mobile-nav-link {{ request()->routeIs('internships*') ? 'active' : '' }}"><span class="nav-icon">💼</span> Internships</a></li>
      <li><a href="{{ route('portfolio') }}" class="mobile-nav-link {{ request()->routeIs('portfolio*') ? 'active' : '' }}"><span class="nav-icon">✨</span> Portfolio</a></li>
      <li><a href="{{ route('careers') }}" class="mobile-nav-link {{ request()->routeIs('careers*') ? 'active' : '' }}"><span class="nav-icon">🚀</span> Careers</a></li>
      <li><a href="{{ route('blog.index') }}" class="mobile-nav-link {{ request()->routeIs('blog.*') ? 'active' : '' }}"><span class="nav-icon">📝</span> Blog</a></li>
      <li><a href="{{ route('contact') }}" class="mobile-nav-link {{ request()->routeIs('contact') ? 'active' : '' }}"><span class="nav-icon">📬</span> Contact</a></li>
    </ul>

    <div class="mobile-drawer-footer">
      <button onclick="closeMobileDrawer(); openModal('projectInquiryModal');" class="btn btn-primary" style="width:100%; padding:14px; font-weight:700; border-radius:12px; margin-bottom:14px;">
        Start a Project &rarr;
      </button>
      <div class="drawer-contact-info">
        <a href="tel:+919511951568">📞 +91 95119 51568</a>
        <a href="mailto:creativetechsquad.official@gmail.com">📧 creativetechsquad.official@gmail.com</a>
      </div>
    </div>
  </aside>

  <!-- Header Navigation -->
  <header class="site-header">
    <div class="container nav-container">
      <div style="display:flex; align-items:center; gap:12px;">
        <button class="mobile-toggle" aria-label="Toggle Menu" id="mobileMenuBtn" type="button">
          <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M4 6h16M4 12h16M4 18h16"/></svg>
        </button>
        <a href="{{ route('home') }}" class="brand-logo">
          <img src="{{ asset('images/logo.png') }}" alt="Creative Tech Squad" style="height:42px; max-width:210px; width:auto; display:block; object-fit:contain;">
        </a>
      </div>

      <nav class="desktop-nav">
        <ul class="nav-menu">
          <li><a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
          <li><a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">About</a></li>
          <li><a href="{{ route('solutions.index') }}" class="nav-link {{ request()->routeIs('solutions.*') ? 'active' : '' }}">Solutions</a></li>
          <li><a href="{{ route('products.index') }}" class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}">Products</a></li>
          <li><a href="{{ route('ai') }}" class="nav-link {{ request()->routeIs('ai') ? 'active' : '' }}">AI</a></li>
          <li><a href="{{ route('education') }}" class="nav-link {{ request()->routeIs('education*') ? 'active' : '' }}">Education</a></li>
          <li><a href="{{ route('internships') }}" class="nav-link {{ request()->routeIs('internships*') ? 'active' : '' }}">Internships</a></li>
          <li><a href="{{ route('portfolio') }}" class="nav-link {{ request()->routeIs('portfolio*') ? 'active' : '' }}">Portfolio</a></li>
          <li><a href="{{ route('careers') }}" class="nav-link {{ request()->routeIs('careers*') ? 'active' : '' }}">Careers</a></li>
          <li><a href="{{ route('blog.index') }}" class="nav-link {{ request()->routeIs('blog.*') ? 'active' : '' }}">Blog</a></li>
          <li><a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a></li>
        </ul>
      </nav>

      <div class="nav-actions">
        <button onclick="openModal('projectInquiryModal')" class="btn btn-primary btn-sm" id="headerCtaBtn">
          Start a Project
        </button>
      </div>
    </div>
  </header>

  <!-- Main Body Content -->
  <main>
    @yield('content')
  </main>

  <!-- Global Footer -->
  <footer class="site-footer">
    <div class="container">
      <div class="grid grid-4" style="gap:40px;">
        <div>
          <div class="brand-logo" style="margin-bottom:16px;">
            <img src="{{ asset('images/logo-white.png') }}" alt="Creative Tech Squad" style="height:44px; max-width:220px; width:auto; display:block; object-fit:contain;">
          </div>
          <p style="font-size:0.95rem; line-height:1.6; margin-bottom:20px; color:#94A3B8;">
            {{ \App\Models\Setting::get('site_tagline', 'Building smart digital solutions with teamwork, creativity, and technology.') }}
          </p>
          <div style="font-size:0.9rem; color:#CBD5E1; display:flex; flex-direction:column; gap:8px;">
            <div>📧 {{ \App\Models\Setting::get('contact_email', 'creativetechsquad.official@gmail.com') }}</div>
            <div>📞 {{ \App\Models\Setting::get('contact_phone', '+91 95119 51568') }}</div>
            <div>🌐 {{ \App\Models\Setting::get('site_domain', 'creativetechsquad.in') }}</div>
          </div>
        </div>

        <div>
          <h4>Solutions & Products</h4>
          <ul class="footer-links">
            <li><a href="{{ route('solutions.show', 'erp-solutions') }}">Enterprise ERP Suite</a></li>
            <li><a href="{{ route('solutions.show', 'custom-software') }}">Custom Software Products</a></li>
            <li><a href="{{ route('ai') }}">AI Solutions & RAG</a></li>
            <li><a href="{{ route('solutions.show', 'api-integrations') }}">API & Cloud Integration</a></li>
            <li><a href="{{ route('products.index') }}">Product Catalog</a></li>
            <li><a href="{{ route('portfolio') }}">Client Case Studies</a></li>
          </ul>
        </div>

        <div>
          <h4>Learning & Careers</h4>
          <ul class="footer-links">
            <li><a href="{{ route('education') }}">Engineering Programs</a></li>
            <li><a href="{{ route('internships') }}">Internship Tracks</a></li>
            <li><a href="{{ route('careers') }}">Open Positions</a></li>
            <li><a href="{{ route('blog.index') }}">Engineering Blog</a></li>
            <li><a href="{{ route('about') }}">About Company</a></li>
            <li><a href="{{ route('admin.login') }}">Staff / Admin Portal</a></li>
          </ul>
        </div>

        <div>
          <h4>Start a Conversation</h4>
          <p style="font-size:0.92rem; margin-bottom:16px; color:#94A3B8;">
            Have a project or ERP workflow requirement? Let's engineer the right solution together.
          </p>
          <button onclick="openModal('projectInquiryModal')" class="btn btn-gradient btn-sm" style="width:100%; margin-bottom:12px;">
            Start a Project
          </button>
          <a href="{{ route('contact') }}" class="btn btn-outline-white btn-sm" style="width:100%; text-align:center;">
            Contact Support
          </a>
        </div>
      </div>

      <div class="footer-bottom">
        <div>
          &copy; {{ date('Y') }} Creative Tech Squad. All rights reserved.
        </div>
        <div style="display:flex; gap:20px;">
          <a href="{{ route('privacy') }}" style="color:#94A3B8;">Privacy Policy</a>
          <a href="{{ route('terms') }}" style="color:#94A3B8;">Terms of Service</a>
        </div>
      </div>
    </div>
  </footer>

  <!-- Quick Project Inquiry Modal -->
  <div class="modal-backdrop" id="projectInquiryModal">
    <div class="modal-dialog">
      <button class="modal-close" onclick="closeModal('projectInquiryModal')">&times;</button>
      <div style="margin-bottom:24px;">
        <span class="eyebrow">Creative Tech Squad</span>
        <h3 style="font-size:1.6rem; margin-bottom:8px;">Start a Project</h3>
        <p style="color:#64748B; font-size:0.95rem;">Tell us about your requirement. We'll evaluate your project and schedule an architecture consultation.</p>
      </div>

      <form action="{{ route('contact.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label class="form-label">Your Name *</label>
          <input type="text" name="name" class="form-control" placeholder="e.g. John Doe" required>
        </div>

        <div class="form-group" style="display:grid; grid-template-columns:1fr 1fr; gap:14px;">
          <div>
            <label class="form-label">Business Email *</label>
            <input type="email" name="email" class="form-control" placeholder="john@company.com" required>
          </div>
          <div>
            <label class="form-label">Phone Number</label>
            <input type="text" name="phone" class="form-control" placeholder="+91 98765 43210">
          </div>
        </div>

        <div class="form-group" style="display:grid; grid-template-columns:1fr 1fr; gap:14px;">
          <div>
            <label class="form-label">Company / Organization</label>
            <input type="text" name="company" class="form-control" placeholder="Company Name">
          </div>
          <div>
            <label class="form-label">Inquiry Type *</label>
            <select name="inquiry_type" class="form-control form-select" required>
              <option value="ERP Solutions">ERP Solutions</option>
              <option value="Custom Software">Custom Software Product</option>
              <option value="AI Solutions">AI & Automation</option>
              <option value="Education & Training">Education / College Partnership</option>
              <option value="Other">General Technology Consulting</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="form-label">Estimated Budget (Optional)</label>
          <select name="budget_range" class="form-control form-select">
            <option value="Under ₹2,00,000">Under ₹2,00,000</option>
            <option value="₹2,00,000 - ₹5,00,000" selected>₹2,00,000 - ₹5,00,000</option>
            <option value="₹5,00,000 - ₹15,00,000">₹5,00,000 - ₹15,00,000</option>
            <option value="₹15,00,000+">Enterprise (₹15,00,000+)</option>
          </select>
        </div>

        <div class="form-group">
          <label class="form-label">Project Overview *</label>
          <textarea name="message" class="form-control" placeholder="Briefly describe what you're looking to build or solve..." rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary" style="width:100%; padding:14px;">Submit Project Details</button>
      </form>
    </div>
  </div>

  <!-- App Script -->
  <script src="{{ asset('js/app.js') }}"></script>
  @stack('scripts')
</body>
</html>
