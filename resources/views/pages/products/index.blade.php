@extends('layouts.app')

@section('title', 'Software Products & ERP — Creative Tech Squad')

@section('content')
<section class="hero-section text-center">
  <div class="container container-narrow">
    <span class="eyebrow">Product Catalog</span>
    <h1 class="hero-title">From Concept to <br><span class="gradient-accent">Enterprise Software Products.</span></h1>
    <p class="section-subtitle mx-auto">
      Explore our suite of modular ERP platforms, document intelligence engines, learning systems, and business suites.
    </p>

    <!-- Dynamic Category Filter Tabs -->
    <div class="filter-tabs">
      <button class="filter-tab active" data-filter="all">All Products</button>
      @foreach($categories as $cat)
        <button class="filter-tab" data-filter="{{ $cat }}">{{ $cat }}</button>
      @endforeach
    </div>
  </div>
</section>

<section class="section" style="padding-bottom:100px;">
  <div class="container">
    <div class="grid grid-3">
      @forelse($products as $prod)
        <div class="card filterable-item" data-category="{{ $prod->category }}" style="display:flex; flex-direction:column; justify-content:space-between;">
          <div>
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px;">
              <span class="badge badge-blue">{{ $prod->category }}</span>
              @if($prod->is_featured)
                <span class="badge badge-purple">Featured</span>
              @endif
            </div>

            <h3 style="font-size:1.35rem; font-weight:700; margin-bottom:10px; color:var(--apple-text-primary);">{{ $prod->name }}</h3>
            <p style="color:var(--apple-text-secondary); font-size:0.95rem; line-height:1.6; margin-bottom:20px;">
              {{ $prod->short_description }}
            </p>

            @if(!empty($prod->features))
              <div style="background:var(--apple-bg); padding:14px 16px; border-radius:12px; margin-bottom:20px; border:1px solid var(--apple-border-light);">
                <div style="font-size:0.75rem; font-weight:700; text-transform:uppercase; color:var(--apple-text-muted); margin-bottom:6px; letter-spacing:0.04em;">Highlights</div>
                <ul style="list-style:none; font-size:0.85rem; color:var(--apple-text-secondary); display:flex; flex-direction:column; gap:6px;">
                  @foreach(array_slice($prod->features, 0, 3) as $feat)
                    <li style="display:flex; align-items:center; gap:6px;">
                      <span style="color:#0071e3; font-weight:bold;">•</span> {{ $feat }}
                    </li>
                  @endforeach
                </ul>
              </div>
            @endif

            @if(!empty($prod->technology_stack))
              <div style="display:flex; flex-wrap:wrap; gap:6px; margin-bottom:24px;">
                @foreach($prod->technology_stack as $t)
                  <span style="font-size:0.75rem; background:#f0f0f2; padding:4px 10px; border-radius:980px; color:var(--apple-text-primary); font-weight:600;">{{ $t }}</span>
                @endforeach
              </div>
            @endif
          </div>

          <div style="display:flex; gap:10px; margin-top:auto; flex-wrap:wrap;">
            <a href="{{ route('products.show', $prod->slug) }}" class="btn btn-primary btn-sm" style="flex:1; min-width:120px; text-align:center;">
              Product Specs
            </a>
            @if($prod->demo_url)
              <button onclick="openModal('projectInquiryModal')" class="btn btn-secondary btn-sm" style="flex:1; min-width:80px;">
                Demo
              </button>
            @endif
          </div>
        </div>
      @empty
        <div class="card" style="grid-column: 1/-1; text-align:center; padding:50px;">
          <p style="color:var(--apple-text-secondary);">No products found in catalog.</p>
        </div>
      @endforelse
    </div>
  </div>
</section>
@endsection
