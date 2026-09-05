@extends('layouts.app')

@section('title', 'Privacy Policy — Creative Tech Squad')

@section('content')
<section class="section" style="padding-top:140px; background:var(--cts-white);">
  <div class="container container-narrow">
    <span class="eyebrow">Legal & Compliance</span>
    <h1 class="hero-title" style="font-size:2.6rem;">Privacy Policy</h1>
    <p style="color:#64748B; margin-bottom:30px;">Last updated: {{ date('F Y') }}</p>

    <div style="font-size:1.05rem; line-height:1.8; color:#334155; display:flex; flex-direction:column; gap:24px;">
      <p>
        Creative Tech Squad ("we", "our", or "us") respects your privacy and is committed to protecting the personal information you share with us through our website (<strong>creativetechsquad.in</strong>) and software services.
      </p>

      <h3 style="color:var(--cts-navy); font-size:1.4rem;">1. Information We Collect</h3>
      <p>
        When you submit inquiries, apply for internship programs, or request enterprise product demos, we collect details including your name, email address, phone number, organization, college, and submitted resume documents.
      </p>

      <h3 style="color:var(--cts-navy); font-size:1.4rem;">2. Use of Information</h3>
      <p>
        We use collected data solely to deliver software solutions, evaluate engineering applications, provide customer support, and communicate project updates. We do not sell or rent your data to third-party marketers.
      </p>

      <h3 style="color:var(--cts-navy); font-size:1.4rem;">3. Data Security</h3>
      <p>
        We employ industry-standard encryption, strict access control policies, and secure database practices to ensure that your business and personal information remains confidential.
      </p>

      <h3 style="color:var(--cts-navy); font-size:1.4rem;">4. Contact Privacy Officer</h3>
      <p>
        If you have questions regarding our privacy practices, please contact us at <strong>creativetechsquad.official@gmail.com</strong>.
      </p>
    </div>
  </div>
</section>
@endsection
