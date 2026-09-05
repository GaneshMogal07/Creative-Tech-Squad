<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Admin Panel') — Creative Tech Squad CMS</title>
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
  <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><rect width='100' height='100' rx='24' fill='%23007EFA'/><text x='50%25' y='64%25' font-size='48' font-weight='bold' fill='white' text-anchor='middle' font-family='sans-serif'>CTS</text></svg>">
  @stack('styles')
</head>
<body class="admin-body">

  <!-- Admin Sidebar -->
  <aside class="admin-sidebar" id="adminSidebar">
    <div class="admin-sidebar-header">
      <a href="{{ route('admin.dashboard') }}" style="display:flex; align-items:center; gap:10px; text-decoration:none;">
        <img src="{{ asset('images/logo.png') }}" alt="Creative Tech Squad" style="height:36px; max-width:170px; object-fit:contain;">
      </a>
    </div>

    <ul class="admin-sidebar-menu">
      <li>
        <a href="{{ route('admin.dashboard') }}" class="admin-sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
          <span>📊</span> Dashboard
        </a>
      </li>

      <li class="admin-sidebar-label">CMS Modules</li>
      <li>
        <a href="{{ route('admin.products.index') }}" class="admin-sidebar-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
          <span>📦</span> Products & ERP
        </a>
      </li>
      <li>
        <a href="{{ route('admin.projects.index') }}" class="admin-sidebar-link {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
          <span>💼</span> Portfolio Projects
        </a>
      </li>
      <li>
        <a href="{{ route('admin.services.index') }}" class="admin-sidebar-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
          <span>🛠️</span> Services & Solutions
        </a>
      </li>
      <li>
        <a href="{{ route('admin.blog.index') }}" class="admin-sidebar-link {{ request()->routeIs('admin.blog.*') ? 'active' : '' }}">
          <span>📝</span> Blog Articles
        </a>
      </li>
      <li>
        <a href="{{ route('admin.programs.index') }}" class="admin-sidebar-link {{ request()->routeIs('admin.programs.*') ? 'active' : '' }}">
          <span>🎓</span> Education Programs
        </a>
      </li>

      <li class="admin-sidebar-label">Inquiries & Recruitment</li>
      <li>
        <a href="{{ route('admin.internships.index') }}" class="admin-sidebar-link {{ request()->routeIs('admin.internships.*') ? 'active' : '' }}">
          <span>👨‍💻</span> Internships
        </a>
      </li>
      <li>
        <a href="{{ route('admin.careers.index') }}" class="admin-sidebar-link {{ request()->routeIs('admin.careers.index') || request()->routeIs('admin.careers.create') || request()->routeIs('admin.careers.edit') ? 'active' : '' }}">
          <span>👔</span> Careers & Jobs
        </a>
      </li>
      <li>
        <a href="{{ route('admin.careers.all_applications') }}" class="admin-sidebar-link {{ request()->routeIs('admin.careers.all_applications') || request()->routeIs('admin.careers.applications') ? 'active' : '' }}">
          <span>👥</span> Job Candidates
        </a>
      </li>
      <li>
        <a href="{{ route('admin.inquiries.index') }}" class="admin-sidebar-link {{ request()->routeIs('admin.inquiries.*') ? 'active' : '' }}">
          <span>💼</span> Project Inquiries
        </a>
      </li>
      <li>
        <a href="{{ route('admin.contact_messages.index') }}" class="admin-sidebar-link {{ request()->routeIs('admin.contact_messages.*') ? 'active' : '' }}">
          <span>📬</span> Contact Messages
        </a>
      </li>

      <li class="admin-sidebar-label">Configuration</li>
      <li>
        <a href="{{ route('admin.testimonials.index') }}" class="admin-sidebar-link {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
          <span>⭐</span> Testimonials
        </a>
      </li>
      <li>
        <a href="{{ route('admin.settings') }}" class="admin-sidebar-link {{ request()->routeIs('admin.settings') ? 'active' : '' }}">
          <span>⚙️</span> Site Settings
        </a>
      </li>
      <li>
        <a href="{{ route('home') }}" target="_blank" class="admin-sidebar-link">
          <span>🌐</span> View Live Website ↗
        </a>
      </li>
    </ul>

    <div class="admin-sidebar-footer">
      <form action="{{ route('admin.logout') }}" method="POST">
        @csrf
        <button type="submit" class="admin-btn admin-btn-danger" style="width:100%; font-size:0.85rem;">
          Sign Out
        </button>
      </form>
    </div>
  </aside>

  <!-- Main Content Wrapper -->
  <div class="admin-main">
    <header class="admin-header">
      <div style="display:flex; align-items:center; gap:16px;">
        <button id="sidebarToggleBtn" style="display:none; background:none; border:none; font-size:1.4rem; cursor:pointer;" onclick="document.getElementById('adminSidebar').classList.toggle('open')">☰</button>
        <div class="admin-header-title">@yield('page_title', 'Dashboard')</div>
      </div>

      <div class="admin-header-user">
        <span style="font-size:0.9rem; font-weight:600; color:#334155;">{{ Auth::user()->name ?? 'Administrator' }}</span>
        <span class="admin-badge admin-badge-purple">{{ ucfirst(str_replace('_', ' ', Auth::user()->role ?? 'Admin')) }}</span>
      </div>
    </header>

    <div class="admin-content">
      <!-- Flash Message Alerts -->
      @if(session('success'))
        <div style="background:#DCFCE7; color:#166534; padding:14px 20px; border-radius:8px; margin-bottom:24px; font-weight:600; border:1px solid #BBF7D0;">
          {{ session('success') }}
        </div>
      @endif
      @if($errors->any())
        <div style="background:#FEE2E2; color:#991B1B; padding:14px 20px; border-radius:8px; margin-bottom:24px; font-weight:600; border:1px solid #FECACA;">
          {{ $errors->first() }}
        </div>
      @endif

      @yield('content')
    </div>
  </div>

  @stack('scripts')
</body>
</html>
