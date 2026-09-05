@extends('layouts.app')

@section('title', 'Engineering & Technology Blog — Creative Tech Squad')

@section('content')
<section class="hero-section text-center">
  <div class="container container-narrow">
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

<section class="section" style="padding-bottom:100px;">
  <div class="container">
    <div class="grid grid-3">
      @forelse($posts as $post)
        <article class="card" style="display:flex; flex-direction:column; justify-content:space-between;">
          <div>
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:14px;">
              <span class="badge badge-purple">{{ $post->category->name ?? 'Technology' }}</span>
              <span style="font-size:0.8rem; color:var(--apple-text-muted);">{{ $post->read_time }}</span>
            </div>

            <h3 style="font-size:1.35rem; font-weight:700; margin-bottom:12px; line-height:1.35;">
              <a href="{{ route('blog.show', $post->slug) }}" style="color:var(--apple-text-primary);">{{ $post->title }}</a>
            </h3>

            <p style="color:var(--apple-text-secondary); font-size:0.95rem; line-height:1.6; margin-bottom:20px;">
              {{ $post->excerpt }}
            </p>
          </div>

          <div style="border-top:1px solid var(--apple-border-light); padding-top:16px; display:flex; justify-content:space-between; align-items:center; margin-top:auto;">
            <span style="font-size:0.82rem; color:var(--apple-text-muted);">{{ $post->published_at ? $post->published_at->format('M d, Y') : 'Published' }}</span>
            <a href="{{ route('blog.show', $post->slug) }}" style="color:var(--apple-blue); font-weight:600; font-size:0.88rem;">Read Article &rarr;</a>
          </div>
        </article>
      @empty
        <div class="card text-center" style="grid-column:1/-1; padding:50px;">
          <p style="color:var(--apple-text-secondary);">No articles found in this category.</p>
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
