@extends('layouts.app')

@section('title', 'Engineering & Technology Blog — Creative Tech Squad')

@section('content')
<section class="hero-section" style="padding-bottom:40px;">
  <div class="hero-glow"></div>
  <div class="container text-center hero-content">
    <span class="eyebrow">Insights & Architecture</span>
    <h1 class="hero-title">Engineering Notes from the <br><span class="gradient-accent">Creative Tech Squad Lab.</span></h1>
    <p class="section-subtitle mx-auto">
      Deep dives into ERP engineering, Laravel architectural patterns, Java Spring Boot microservices, and practical AI implementations.
    </p>

    <!-- Category Filters -->
    <div class="filter-tabs">
      <a href="{{ route('blog.index') }}" class="filter-tab {{ empty($categorySlug) || $categorySlug === 'all' ? 'active' : '' }}">All Articles</a>
      @foreach($categories as $c)
        <a href="{{ route('blog.index', ['category' => $c->slug]) }}" class="filter-tab {{ $categorySlug === $c->slug ? 'active' : '' }}">{{ $c->name }}</a>
      @endforeach
    </div>
  </div>
</section>

<section class="section" style="padding-top:10px;">
  <div class="container">
    <div class="grid grid-3">
      @forelse($posts as $post)
        <article class="card" style="display:flex; flex-direction:column; justify-content:space-between;">
          <div>
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:14px;">
              <span class="badge badge-purple">{{ $post->category->name ?? 'Technology' }}</span>
              <span style="font-size:0.8rem; color:#64748B;">{{ $post->read_time }}</span>
            </div>

            <h3 style="font-size:1.35rem; margin-bottom:12px; line-height:1.35;">
              <a href="{{ route('blog.show', $post->slug) }}" style="color:var(--cts-navy);">{{ $post->title }}</a>
            </h3>

            <p style="color:var(--cts-text-muted); font-size:0.95rem; line-height:1.6; margin-bottom:20px;">
              {{ $post->excerpt }}
            </p>
          </div>

          <div style="border-top:1px solid var(--cts-border); padding-top:16px; display:flex; justify-content:space-between; align-items:center;">
            <span style="font-size:0.82rem; color:#64748B;">{{ $post->published_at ? $post->published_at->format('M d, Y') : 'Published' }}</span>
            <a href="{{ route('blog.show', $post->slug) }}" style="color:var(--cts-blue); font-weight:600; font-size:0.88rem;">Read Article &rarr;</a>
          </div>
        </article>
      @empty
        <div class="card text-center" style="grid-column:span 3; padding:40px;">
          <p style="color:var(--cts-text-muted);">No articles found in this category.</p>
        </div>
      @endforelse
    </div>

    <!-- Pagination -->
    <div style="margin-top:40px; display:flex; justify-content:center;">
      {{ $posts->links() }}
    </div>
  </div>
</section>
@endsection
