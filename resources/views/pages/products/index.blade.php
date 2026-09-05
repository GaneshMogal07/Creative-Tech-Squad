@extends('layouts.app')

@section('title', 'Software Products & ERP — Creative Tech Squad')

@section('content')
<section class="hero-section" style="padding-bottom:40px;">
  <div class="hero-glow"></div>
  <div class="container text-center hero-content">
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

<section class="section" style="padding-top:10px;">
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

            <h3 style="font-size:1.35rem; margin-bottom:10px;">{{ $prod->name }}</h3>
            <p style="color:var(--cts-text-muted); font-size:0.95rem; line-height:1.6; margin-bottom:20px;">
              {{ $prod->short_description }}
            </p>

            @if(!empty($prod->features))
              <div style="background:var(--cts-bg); padding:14px; border-radius:8px; margin-bottom:20px;">
                <div style="font-size:0.8rem; font-weight:700; text-transform:uppercase; color:#64748B; margin-bottom:6px;">Highlights</div>
                <ul style="list-style:none; font-size:0.85rem; color:#334155; display:flex; flex-direction:column; gap:4px;">
                  @foreach(array_slice($prod->features, 0, 3) as $feat)
                    <li style="display:flex; align-items:center; gap:6px;">
                      <span style="color:#007EFA;">•</span> {{ $feat }}
                    </li>
                  @endforeach
                </ul>
              </div>
            @endif

            @if(!empty($prod->technology_stack))
              <div style="display:flex; flex-wrap:wrap; gap:6px; margin-bottom:24px;">
                @foreach($prod->technology_stack as $t)
                  <span style="font-size:0.75rem; background:var(--cts-bg-alt); padding:3px 8px; border-radius:4px; color:#475569; font-weight:600;">{{ $t }}</span>
                @endforeach
              </div>
            @endif
          </div>

          <div style="display:flex; gap:10px;">
            <a href="{{ route('products.show', $prod->slug) }}" class="btn btn-primary btn-sm" style="flex:1;">
              Product Specs
            </a>
            @if($prod->demo_url)
              <button onclick="openModal('projectInquiryModal')" class="btn btn-secondary btn-sm">
                Demo
              </button>
            @endif
          </div>
        </div>
      @empty
        <p>No products found in catalog.</p>
      @endforelse
    </div>
  </div>
</section>
@endsection
