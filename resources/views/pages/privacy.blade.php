@extends('layouts.app')

@section('title', 'Privacy Policy — Creative Tech Squad')

@section('content')
<section class="hero-section text-center">
  <div class="container container-narrow">
    <span class="eyebrow">Legal & Compliance</span>
    <h1 class="hero-title">Privacy Policy</h1>
    <p class="section-subtitle mx-auto">Last updated: {{ date('F Y') }}</p>
  </div>
</section>

<section class="section" style="padding-bottom:100px;">
  <div class="container container-narrow">
    <div class="card" style="padding:48px 40px; border-radius:var(--apple-radius-xl); box-shadow:var(--apple-shadow-subtle);">
      <div style="font-size:1.05rem; line-height:1.8; color:var(--apple-text-secondary); display:flex; flex-direction:column; gap:24px;">
        <p>
          Creative Tech Squad ("we", "our", or "us") respects your privacy and is committed to protecting the personal information you share with us through our website (<strong>creativetechsquad.in</strong>) and software services.
        </p>

        <h3 style="color:var(--apple-text-primary); font-size:1.4rem; font-weight:700;">1. Information We Collect</h3>
        <p>
          When you submit inquiries, apply for internship programs, or request enterprise product demos, we collect details including your name, email address, phone number, organization, college, and submitted resume documents.
        </p>

        <h3 style="color:var(--apple-text-primary); font-size:1.4rem; font-weight:700;">2. Use of Information</h3>
        <p>
          We use collected data solely to deliver software solutions, evaluate engineering applications, provide customer support, and communicate project updates. We do not sell or rent your data to third-party marketers.
        </p>

        <h3 style="color:var(--apple-text-primary); font-size:1.4rem; font-weight:700;">3. Data Security</h3>
        <p>
          We employ industry-standard encryption, strict access control policies, and secure database practices to ensure that your business and personal information remains confidential.
        </p>

        <h3 style="color:var(--apple-text-primary); font-size:1.4rem; font-weight:700;">4. Contact Privacy Officer</h3>
        <p>
          If you have questions regarding our privacy practices, please contact us at <strong>creativetechsquad.official@gmail.com</strong>.
        </p>
      </div>
    </div>
  </div>
</section>
@endsection
