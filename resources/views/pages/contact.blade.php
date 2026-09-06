@extends('layouts.app')

@section('title', 'Contact Us — Creative Tech Squad')

@section('content')
<section class="hero-section text-center">
  <div class="container container-narrow">
    <span class="eyebrow">Connect with CTS</span>
    <h1 class="hero-title">Let’s Build Something <br><span class="gradient-accent">Truly Useful Together.</span></h1>
    <p class="section-subtitle mx-auto">
      Have an enterprise ERP requirement, a custom software product idea, or looking to partner with our educational programs? We’d love to hear from you.
    </p>
  </div>
</section>

<section class="section" style="padding-top:20px; padding-bottom:80px;">
  <div class="container">
    <div class="contact-layout-grid">
      
      <!-- Contact Information Cards -->
      <div style="display:flex; flex-direction:column; gap:20px;">
        <div class="card">
          <h3 style="font-size:1.35rem; font-weight:700; margin-bottom:18px; color:var(--apple-text-primary);">Direct Channels</h3>
          
          <div class="contact-channels-list">
            <div class="contact-channel-item">
              <div class="contact-channel-icon" style="background:#e8f4fd; color:#0071e3;">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
              </div>
              <div class="contact-channel-body">
                <div class="contact-channel-label">Official Email</div>
                <a href="mailto:{{ \App\Models\Setting::get('contact_email', 'contact@creativetechsquad.in') }}" class="contact-channel-value">
                  {{ \App\Models\Setting::get('contact_email', 'contact@creativetechsquad.in') }}
                </a>
              </div>
            </div>

            <div class="contact-channel-item">
              <div class="contact-channel-icon" style="background:#f3e8ff; color:#7b2cff;">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
              </div>
              <div class="contact-channel-body">
                <div class="contact-channel-label">Call / WhatsApp Direct</div>
                <a href="tel:{{ \App\Models\Setting::get('contact_phone', '+919511951568') }}" class="contact-channel-value">
                  {{ \App\Models\Setting::get('contact_phone', '+91 95119 51568') }}
                </a>
              </div>
            </div>

            <div class="contact-channel-item">
              <div class="contact-channel-icon" style="background:#e6f9ed; color:#34c759;">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
              </div>
              <div class="contact-channel-body">
                <div class="contact-channel-label">Innovation Hubs</div>
                <div class="contact-channel-value" style="font-weight:600; color:var(--apple-text-primary);">
                  {{ \App\Models\Setting::get('contact_address', 'Pune & Nashik, Maharashtra, India') }}
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="card card-dark">
          <span class="eyebrow" style="color:#ff9f0a; margin-bottom:6px;">Careers &amp; Learning</span>
          <h4 style="font-size:1.15rem; font-weight:700; color:white; margin-bottom:8px;">Looking for Internship Opportunities?</h4>
          <p style="color:#a1a1a6; font-size:0.88rem; line-height:1.5; margin-bottom:16px;">
            Students and fresh graduates can apply directly to our hands-on engineering programs.
          </p>
          <a href="{{ route('internships') }}" class="apple-btn apple-btn-secondary" style="background:#ffffff; color:#000000; width:100%; justify-content:center; padding:10px 16px; font-size:13.5px;">
            View Internship Tracks &rarr;
          </a>
        </div>
      </div>

      <!-- Main Project & Inquiry Form -->
      <div>
        <div class="card" style="box-shadow:var(--apple-shadow-card);">
          <span class="eyebrow" style="margin-bottom:4px;">Inquiry Form</span>
          <h3 style="font-size:1.45rem; font-weight:700; margin-bottom:6px; color:var(--apple-text-primary);">Send a Message</h3>
          <p style="color:var(--apple-text-secondary); font-size:0.9rem; margin-bottom:20px; line-height:1.4;">
            Fill out the form below and our engineering team will follow up with you promptly.
          </p>

          <form action="{{ route('contact.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label class="form-label">Full Name *</label>
              <input type="text" name="name" class="form-control" placeholder="e.g. Anand Deshpande" required>
            </div>

            <div class="form-row-2 form-group">
              <div>
                <label class="form-label">Email Address *</label>
                <input type="email" name="email" class="form-control" placeholder="anand@company.com" required>
              </div>
              <div>
                <label class="form-label">Phone / WhatsApp</label>
                <input type="text" name="phone" class="form-control" placeholder="+91 98765 43210">
              </div>
            </div>

            <div class="form-row-2 form-group">
              <div>
                <label class="form-label">Company / Organization</label>
                <input type="text" name="company" class="form-control" placeholder="Company / College Name">
              </div>
              <div>
                <label class="form-label">Inquiry Focus *</label>
                <select name="inquiry_type" class="form-control form-select" required>
                  <option value="ERP Solutions">ERP Solutions</option>
                  <option value="Custom Software">Custom Software Products</option>
                  <option value="AI Solutions">AI Solutions & RAG</option>
                  <option value="Education & Internships">Education & Training</option>
                  <option value="General Inquiry">General Inquiries</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="form-label">Budget Range (Optional)</label>
              <select name="budget_range" class="form-control form-select">
                <option value="Under ₹2,00,000">Under ₹2,00,000</option>
                <option value="₹2,00,000 - ₹5,00,000" selected>₹2,00,000 - ₹5,00,000</option>
                <option value="₹5,00,000 - ₹15,00,000">₹5,00,000 - ₹15,00,000</option>
                <option value="₹15,00,000+">Enterprise Tier (₹15,00,000+)</option>
              </select>
            </div>

            <div class="form-group">
              <label class="form-label">Requirement Details *</label>
              <textarea name="message" class="form-control" rows="4" placeholder="Describe your business problem, project scope, or questions..." required></textarea>
            </div>

            <button type="submit" class="apple-btn apple-btn-primary" style="width:100%; padding:14px; font-size:15px; border-radius:14px; margin-top:6px;">
              Send Project Inquiry
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
