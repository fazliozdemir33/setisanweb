@extends('layouts.app')
@php $locale = app()->getLocale(); $isTr = $locale === 'tr'; @endphp

@section('meta_title', $isTr ? 'Blog & Haberler — Setisan Elektromekanik' : 'Blog & News — Setisan Elektromekanik')
@section('meta_desc', $isTr ? 'Elektromekanik sektörüne dair son haberler, teknik içerikler ve sektör analizleri.' : 'Latest news, technical content and industry analysis on electromechanical engineering.')

@section('content')

<div class="page-header">
  <div class="container">

    <h1>{{ $isTr ? 'Blog & Haberler' : 'Blog & News' }}</h1>
    <p>{{ $isTr ? 'Elektromekanik sektörüne dair içerikler, teknik yazılar ve sektör haberleri.' : 'Content, technical articles and industry news on electromechanical engineering.' }}</p>
  </div>
</div>

<section class="section">
  <div class="container">
    <div class="blog-grid">
      @forelse($posts as $i => $post)
      <a href="{{ url(($isTr ? 'tr/blog' : 'en/blog') . '/' . $post->slug) }}" class="blog-card reveal" style="transition-delay:{{ ($i % 3) * 0.1 }}s">
        <div class="blog-card__img">
          <img src="{{ $post->cover_image ? asset($post->cover_image) : asset('images/extracted/stitched_page_17.jpg') }}" alt="{{ $post->title }}" loading="lazy">
        </div>
        <div class="blog-card__cat">{{ $post->category ?? ($isTr ? 'Sektör' : 'Industry') }}</div>
        <h2 class="blog-card__title">{{ $post->title }}</h2>
        <p style="font-size:var(--small);color:var(--muted);margin:.5rem 0">{{ Str::limit($post->excerpt, 120) }}</p>
        <div class="blog-card__date">{{ $post->published_at?->format('d M Y') }}</div>
      </a>
      @empty
      <div style="grid-column:1/-1;text-align:center;padding:4rem 0;color:var(--muted)">
        {{ $isTr ? 'Henüz blog yazısı bulunmuyor.' : 'No blog posts yet.' }}
      </div>
      @endforelse
    </div>

    @if($posts->hasPages())
    <div style="margin-top:3rem;display:flex;justify-content:center">
      {{ $posts->links() }}
    </div>
    @endif
  </div>
</section>

@endsection
