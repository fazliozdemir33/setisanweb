@extends('layouts.app')
@php $locale = app()->getLocale(); $isTr = $locale === 'tr'; @endphp

@section('meta_title', ($post->meta_title ?? $post->title) . ' — Setisan Elektromekanik')
@section('meta_desc', $post->meta_desc ?? $post->excerpt)

@section('content')

<div class="page-header">
  <div class="container">

    @if($post->category)
      <div class="eyebrow" style="color:rgba(255,255,255,.5);margin-bottom:.75rem">{{ $post->category }}</div>
    @endif
    <h1>{{ $post->title }}</h1>
    <p style="margin-top:.75rem;font-size:var(--small);color:rgba(255,255,255,.45)">
      {{ $post->author }} · {{ $post->published_at?->format('d M Y') }}
    </p>
  </div>
</div>

<section class="section">
  <div class="container">
    <div style="max-width:780px;margin:0 auto">
      @if($post->cover_image)
        <img src="{{ asset($post->cover_image) }}" alt="{{ $post->title }}" style="width:100%;border-radius:var(--radius);aspect-ratio:16/9;object-fit:cover;margin-bottom:3rem" loading="lazy">
      @endif

      @if($post->excerpt)
        <p style="font-size:var(--body-lg);font-weight:500;color:var(--dark);margin-bottom:2.5rem;line-height:1.7;border-left:3px solid var(--accent);padding-left:1.5rem">
          {{ $post->excerpt }}
        </p>
      @endif

      <div style="color:var(--text-light);line-height:1.9;font-size:var(--body)">
        {!! $post->content !!}
      </div>
    </div>
  </div>
</section>

@if($relatedPosts->count())
<section class="section section--surface">
  <div class="container">
    <div class="section-header reveal">
      <div class="eyebrow">{{ $isTr ? 'İlgili Yazılar' : 'Related Posts' }}</div>
    </div>
    <div class="blog-grid">
      @foreach($relatedPosts as $i => $rp)
      <a href="{{ url(($isTr ? 'tr/blog' : 'en/blog') . '/' . $rp->slug) }}" class="blog-card reveal" style="transition-delay:{{ $i * 0.1 }}s">
        <div class="blog-card__img">
          <img src="{{ $rp->cover_image ? asset($rp->cover_image) : asset('images/extracted/stitched_page_18.jpg') }}" alt="{{ $rp->title }}" loading="lazy">
        </div>
        <div class="blog-card__cat">{{ $rp->category ?? 'Blog' }}</div>
        <h3 class="blog-card__title">{{ $rp->title }}</h3>
        <div class="blog-card__date">{{ $rp->published_at?->format('d M Y') }}</div>
      </a>
      @endforeach
    </div>
  </div>
</section>
@endif

@endsection
