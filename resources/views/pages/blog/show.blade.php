@extends('layouts.app')

@section('title', $post->title . ' — Creative Tech Squad Blog')

@section('content')
<section class="hero-section" style="padding-bottom:30px;">
  <div class="hero-glow"></div>
  <div class="container text-center hero-content container-narrow">
    <a href="{{ route('blog.index') }}" style="font-size:0.9rem; color:var(--cts-blue); font-weight:600; display:inline-flex; align-items:center; gap:6px; margin-bottom:16px;">
      &larr; Back to all articles
    </a>
    <div style="margin-bottom:14px;">
      <span class="badge badge-purple">{{ $post->category->name ?? 'Tech' }}</span>
      <span style="font-size:0.85rem; color:#64748B; margin-left:10px;">{{ $post->published_at ? $post->published_at->format('M d, Y') : 'Published' }} • {{ $post->read_time }}</span>
    </div>
    <h1 class="hero-title" style="font-size:clamp(2rem, 4.2vw, 3.4rem); line-height:1.2;">{{ $post->title }}</h1>
    <p class="section-subtitle mx-auto" style="font-size:1.15rem;">
      {{ $post->excerpt }}
    </p>
  </div>
</section>

<section class="section" style="background:#ffffff; padding-top:40px;">
  <div class="container container-narrow">
    <article class="card detail-card" style="margin-bottom:48px;">
      
      <div style="font-size:1.05rem; line-height:1.8; color:var(--apple-text-primary);" class="blog-body-content">
        {!! $post->content !!}
      </div>

      <div style="border-top:1px solid var(--cts-border); padding-top:32px; margin-top:48px; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:20px;">
        <div style="display:flex; align-items:center; gap:14px;">
          <div style="width:48px; height:48px; border-radius:50%; background:var(--cts-navy); color:white; display:flex; align-items:center; justify-content:center; font-weight:bold; font-size:1.1rem;">
            CTS
          </div>
          <div>
            <div style="font-weight:700; color:var(--cts-navy);">Creative Tech Squad Engineering</div>
            <div style="font-size:0.85rem; color:#64748B;">Core Architecture & Systems Team</div>
          </div>
        </div>

        <button onclick="openModal('projectInquiryModal')" class="btn btn-primary btn-sm">
          Discuss Your Project
        </button>
      </div>
    </article>
  </div>
</section>

@if($relatedPosts->count() > 0)
<section class="section">
  <div class="container">
    <h3 style="font-size:1.5rem; margin-bottom:30px; text-align:center;">Related Articles</h3>
    <div class="grid grid-3">
      @foreach($relatedPosts as $rel)
        <div class="card">
          <span class="badge badge-purple" style="margin-bottom:10px;">{{ $rel->category->name ?? 'Technology' }}</span>
          <h4 style="font-size:1.2rem; margin-bottom:8px;">{{ $rel->title }}</h4>
          <p style="color:var(--cts-text-muted); font-size:0.9rem; margin-bottom:16px;">{{ Str::limit($rel->excerpt, 100) }}</p>
          <a href="{{ route('blog.show', $rel->slug) }}" style="color:var(--cts-blue); font-weight:600; font-size:0.88rem;">Read article &rarr;</a>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endif
@endsection
