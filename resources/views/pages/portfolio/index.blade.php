@extends('layouts.app')

@section('title', 'Portfolio & Case Studies — Creative Tech Squad')

@section('content')
<section class="hero-section text-center">
  <div class="container container-narrow">
    <span class="eyebrow">Client Case Studies</span>
    <h1 class="hero-title">Proven Engineering Work for <br><span class="gradient-accent">Demanding Enterprises.</span></h1>
    <p class="section-subtitle mx-auto">
      Explore our track record in deploying custom ERP systems, AI automation pipelines, and high-concurrency business platforms.
    </p>

    <!-- Dynamic Category Filter Tabs -->
    <div class="filter-tabs">
      <button class="filter-tab active" data-filter="all">All Case Studies</button>
      @foreach($categories as $cat)
        <button class="filter-tab" data-filter="{{ $cat }}">{{ $cat }}</button>
      @endforeach
    </div>
  </div>
</section>

<section class="section" style="padding-bottom:100px;">
  <div class="container">
    <div class="grid grid-2">
      @forelse($projects as $prj)
        <div class="card filterable-item" data-category="{{ $prj->category }}" style="display:flex; flex-direction:column; justify-content:space-between;">
          <div>
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:14px;">
              <span class="badge badge-blue">{{ $prj->category }}</span>
              <span style="font-size:0.85rem; color:var(--apple-text-muted); font-weight:600;">Client: {{ $prj->client_name ?? 'Confidential' }}</span>
            </div>

            <h3 style="font-size:1.4rem; font-weight:700; margin-bottom:12px; color:var(--apple-text-primary);">{{ $prj->title }}</h3>
            <p style="color:var(--apple-text-secondary); font-size:0.95rem; line-height:1.6; margin-bottom:20px;">
              {{ $prj->description }}
            </p>

            @if(!empty($prj->technology_stack))
              <div style="display:flex; flex-wrap:wrap; gap:6px; margin-bottom:24px;">
                @foreach($prj->technology_stack as $t)
                  <span style="font-size:0.75rem; background:#f0f0f2; padding:4px 10px; border-radius:980px; color:var(--apple-text-primary); font-weight:600;">{{ $t }}</span>
                @endforeach
              </div>
            @endif
          </div>

          <div style="margin-top:auto;">
            <a href="{{ route('portfolio.show', $prj->slug) }}" class="btn btn-primary btn-sm" style="width:100%;">
              Read Case Study &rarr;
            </a>
          </div>
        </div>
      @empty
        <div class="card text-center" style="grid-column:1/-1; padding:50px;">
          <p style="color:var(--apple-text-secondary);">No projects found in portfolio.</p>
        </div>
      @endforelse
    </div>
  </div>
</section>
@endsection
