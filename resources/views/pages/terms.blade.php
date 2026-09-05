@extends('layouts.app')

@section('title', 'Terms of Service — Creative Tech Squad')

@section('content')
<section class="hero-section text-center">
  <div class="container container-narrow">
    <span class="eyebrow">Legal & Agreements</span>
    <h1 class="hero-title">Terms of Service</h1>
    <p class="section-subtitle mx-auto">Last updated: {{ date('F Y') }}</p>
  </div>
</section>

<section class="section" style="padding-bottom:100px;">
  <div class="container container-narrow">
    <div class="card" style="padding:48px 40px; border-radius:var(--apple-radius-xl); box-shadow:var(--apple-shadow-subtle);">
      <div style="font-size:1.05rem; line-height:1.8; color:var(--apple-text-secondary); display:flex; flex-direction:column; gap:24px;">
        <p>
          Welcome to Creative Tech Squad. By accessing or using our websites, ERP platforms, products, or educational portals, you agree to be bound by these Terms of Service.
        </p>

        <h3 style="color:var(--apple-text-primary); font-size:1.4rem; font-weight:700;">1. Software Deliverables & Licensing</h3>
        <p>
          All custom software products, enterprise ERP platforms, and digital applications engineered by Creative Tech Squad are governed by their respective client master service agreements (MSA) and licensing statements.
        </p>

        <h3 style="color:var(--apple-text-primary); font-size:1.4rem; font-weight:700;">2. Education & Internship Programs</h3>
        <p>
          Participants in CTS educational cohorts and internships must adhere to intellectual property guidelines, code of conduct, and confidentiality standards regarding client projects.
        </p>

        <h3 style="color:var(--apple-text-primary); font-size:1.4rem; font-weight:700;">3. Limitation of Liability</h3>
        <p>
          Creative Tech Squad strives for high availability and top engineering standards. Except as explicitly outlined in service level agreements (SLA), our platforms and free resources are provided "as is".
        </p>
      </div>
    </div>
  </div>
</section>
@endsection
