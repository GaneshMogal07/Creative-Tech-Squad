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

<section class="section" style="padding-bottom:100px;">
  <div class="container">
    <div class="grid grid-2" style="gap:40px; align-items:flex-start;">
      
      <!-- Contact Information Card -->
      <div style="display:flex; flex-direction:column; gap:24px;">
        <div class="card" style="padding:36px;">
          <h3 style="font-size:1.5rem; font-weight:700; margin-bottom:20px; color:var(--apple-text-primary);">Direct Channels</h3>
          
          <div style="display:flex; flex-direction:column; gap:20px;">
            <div style="display:flex; align-items:flex-start; gap:16px;">
              <div style="width:44px; height:44px; border-radius:12px; background:#e8f4fd; color:#0071e3; display:flex; align-items:center; justify-content:center; font-size:1.2rem; flex-shrink:0;">
                📧
              </div>
              <div>
                <div style="font-size:0.8rem; color:var(--apple-text-muted); font-weight:600; text-transform:uppercase; letter-spacing:0.04em;">Email Us</div>
                <a href="mailto:{{ \App\Models\Setting::get('contact_email', 'creativetechsquad.official@gmail.com') }}" style="font-size:1rem; font-weight:700; color:var(--apple-text-primary);">
                  {{ \App\Models\Setting::get('contact_email', 'creativetechsquad.official@gmail.com') }}
                </a>
              </div>
            </div>

            <div style="display:flex; align-items:flex-start; gap:16px;">
              <div style="width:44px; height:44px; border-radius:12px; background:#f3e8ff; color:#7b2cff; display:flex; align-items:center; justify-content:center; font-size:1.2rem; flex-shrink:0;">
                📞
              </div>
              <div>
                <div style="font-size:0.8rem; color:var(--apple-text-muted); font-weight:600; text-transform:uppercase; letter-spacing:0.04em;">Call / WhatsApp</div>
                <a href="tel:{{ \App\Models\Setting::get('contact_phone', '+919511951568') }}" style="font-size:1rem; font-weight:700; color:var(--apple-text-primary);">
                  {{ \App\Models\Setting::get('contact_phone', '+91 95119 51568') }}
                </a>
              </div>
            </div>

            <div style="display:flex; align-items:flex-start; gap:16px;">
              <div style="width:44px; height:44px; border-radius:12px; background:#e6f9ed; color:#34c759; display:flex; align-items:center; justify-content:center; font-size:1.2rem; flex-shrink:0;">
                📍
              </div>
              <div>
                <div style="font-size:0.8rem; color:var(--apple-text-muted); font-weight:600; text-transform:uppercase; letter-spacing:0.04em;">Innovation Hubs</div>
                <div style="font-size:0.95rem; font-weight:600; color:var(--apple-text-primary);">
                  {{ \App\Models\Setting::get('contact_address', 'Pune & Nashik, Maharashtra, India') }}
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="card card-dark" style="padding:32px;">
          <h4 style="font-size:1.2rem; font-weight:700; color:white; margin-bottom:10px;">Looking for Internship Opportunities?</h4>
          <p style="color:#a1a1a6; font-size:0.92rem; line-height:1.5; margin-bottom:18px;">
            Students and fresh graduates can apply directly to our hands-on engineering programs.
          </p>
          <a href="{{ route('internships') }}" class="btn btn-secondary btn-sm" style="background:#ffffff; color:#000000;">
            View Internship Tracks &rarr;
          </a>
        </div>
      </div>

      <!-- Main Project & Inquiry Form -->
      <div>
        <div class="card" style="padding:36px; box-shadow:var(--apple-shadow-card);">
          <h3 style="font-size:1.6rem; font-weight:700; margin-bottom:8px; color:var(--apple-text-primary);">Send a Message</h3>
          <p style="color:var(--apple-text-secondary); font-size:0.92rem; margin-bottom:24px;">
            Fill out the form below and an engineering consultant will follow up with you.
          </p>

          <form action="{{ route('contact.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label class="form-label">Full Name *</label>
              <input type="text" name="name" class="form-control" placeholder="e.g. Anand Deshpande" required>
            </div>

            <div class="form-group" style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
              <div>
                <label class="form-label">Email Address *</label>
                <input type="email" name="email" class="form-control" placeholder="anand@company.com" required>
              </div>
              <div>
                <label class="form-label">Phone / WhatsApp</label>
                <input type="text" name="phone" class="form-control" placeholder="+91 98765 43210">
              </div>
            </div>

            <div class="form-group" style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
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

            <button type="submit" class="apple-btn apple-btn-primary" style="width:100%; padding:14px; font-size:15px; border-radius:14px;">
              Send Project Inquiry
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
