@extends('layouts.app')

@section('title', $product->name . ' — Product Specifications | Creative Tech Squad')

@section('content')
<section class="hero-section text-center">
  <div class="container text-center hero-content container-narrow">
    <a href="{{ route('products.index') }}" style="font-size:0.9rem; color:var(--apple-blue); font-weight:600; display:inline-flex; align-items:center; gap:6px; margin-bottom:16px;">
      &larr; Back to product catalog
    </a>
    <div style="margin-bottom:12px;">
      <span class="badge badge-blue">{{ $product->category }}</span>
      @if($product->is_featured)
        <span class="badge badge-purple">Enterprise Edition</span>
      @endif
    </div>
    <h1 class="hero-title" style="font-size:clamp(2.2rem, 4.5vw, 3.8rem);">{{ $product->name }}</h1>
    <p class="section-subtitle mx-auto" style="font-size:1.15rem;">
      {{ $product->short_description }}
    </p>

    <div style="display:flex; justify-content:center; gap:16px; flex-wrap:wrap;">
      <button onclick="openModal('projectInquiryModal')" class="btn btn-primary btn-lg">
        Deploy This Product
      </button>
      <button onclick="openModal('projectInquiryModal')" class="btn btn-secondary btn-lg">
        Schedule Live Demo
      </button>
    </div>
  </div>
</section>

<section class="section" style="background:#ffffff; border-top:1px solid var(--apple-border-light); border-bottom:1px solid var(--apple-border-light);">
  <div class="container container-narrow">
    <div class="card" style="padding:48px 40px; border-radius:var(--apple-radius-xl); box-shadow:var(--apple-shadow-subtle);">
      <h2 style="font-size:1.8rem; font-weight:700; margin-bottom:20px; color:var(--apple-text-primary);">Product Architecture & Capabilities</h2>
      <div style="font-size:1.05rem; line-height:1.8; color:var(--apple-text-secondary); margin-bottom:36px;">
        {{ $product->description }}
      </div>

      @if(!empty($product->features))
        <div style="margin-bottom:36px;">
          <h3 style="font-size:1.3rem; font-weight:700; margin-bottom:16px; color:var(--apple-text-primary);">Key Enterprise Features</h3>
          <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
            @foreach($product->features as $f)
              <div style="display:flex; align-items:flex-start; gap:10px; background:var(--apple-bg); padding:16px; border-radius:12px; border:1px solid var(--apple-border-light);">
                <span style="color:#34c759; font-weight:bold; font-size:1.1rem;">✔</span>
                <span style="font-size:0.95rem; color:var(--apple-text-primary); font-weight:500;">{{ $f }}</span>
              </div>
            @endforeach
          </div>
        </div>
      @endif

      @if(!empty($product->technology_stack))
        <div style="border-top:1px solid var(--apple-border-light); padding-top:24px;">
          <h4 style="font-size:1.05rem; font-weight:700; color:var(--apple-text-primary); margin-bottom:12px;">Underlying Technology Stack</h4>
          <div style="display:flex; flex-wrap:wrap; gap:8px;">
            @foreach($product->technology_stack as $tech)
              <span class="tech-pill">{{ $tech }}</span>
            @endforeach
          </div>
        </div>
      @endif
    </div>
  </div>
</section>

@if($relatedProducts->count() > 0)
<section class="section" style="padding-bottom:100px;">
  <div class="container">
    <h3 style="font-size:1.6rem; font-weight:700; margin-bottom:32px; text-align:center; color:var(--apple-text-primary);">Related Products & Platforms</h3>
    <div class="grid grid-3">
      @foreach($relatedProducts as $rel)
        <div class="card" style="display:flex; flex-direction:column; justify-content:space-between; height:100%;">
          <div>
            <span class="badge badge-blue" style="margin-bottom:10px;">{{ $rel->category }}</span>
            <h4 style="font-size:1.2rem; font-weight:700; margin-bottom:8px; color:var(--apple-text-primary);">{{ $rel->name }}</h4>
            <p style="color:var(--apple-text-secondary); font-size:0.9rem; line-height:1.5; margin-bottom:16px;">{{ Str::limit($rel->short_description, 110) }}</p>
          </div>
          <a href="{{ route('products.show', $rel->slug) }}" style="color:var(--apple-blue); font-weight:600; font-size:0.88rem; margin-top:auto; display:inline-block;">Specifications &rarr;</a>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endif
@endsection
