@extends('layouts.app')

@section('title', 'Terms of Service — Creative Tech Squad')

@section('content')
<section class="section" style="padding-top:140px; background:var(--cts-white);">
  <div class="container container-narrow">
    <span class="eyebrow">Legal & Agreements</span>
    <h1 class="hero-title" style="font-size:2.6rem;">Terms of Service</h1>
    <p style="color:#64748B; margin-bottom:30px;">Last updated: {{ date('F Y') }}</p>

    <div style="font-size:1.05rem; line-height:1.8; color:#334155; display:flex; flex-direction:column; gap:24px;">
      <p>
        Welcome to Creative Tech Squad. By accessing or using our websites, ERP platforms, products, or educational portals, you agree to be bound by these Terms of Service.
      </p>

      <h3 style="color:var(--cts-navy); font-size:1.4rem;">1. Software Deliverables & Licensing</h3>
      <p>
        All custom software products, enterprise ERP platforms, and digital applications engineered by Creative Tech Squad are governed by their respective client master service agreements (MSA) and licensing statements.
      </p>

      <h3 style="color:var(--cts-navy); font-size:1.4rem;">2. Education & Internship Programs</h3>
      <p>
        Participants in CTS educational cohorts and internships must adhere to intellectual property guidelines, code of conduct, and confidentiality standards regarding client projects.
      </p>

      <h3 style="color:var(--cts-navy); font-size:1.4rem;">3. Limitation of Liability</h3>
      <p>
        Creative Tech Squad strives for high availability and top engineering standards. Except as explicitly outlined in service level agreements (SLA), our platforms and free resources are provided "as is".
      </p>
    </div>
  </div>
</section>
@endsection
