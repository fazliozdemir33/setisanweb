@extends('layouts.app')
@php $locale = app()->getLocale(); $isTr = $locale === 'tr'; @endphp

@section('meta_title', ($service->meta_title ?? $service->title) . ' — Setisan Elektromekanik')
@section('meta_desc', $service->meta_desc ?? $service->excerpt)

@section('content')

<div class="page-header">
  <div class="container">

    <h1>{{ $service->title }}</h1>
    <p>{{ $service->excerpt }}</p>
  </div>
</div>

<section class="section">
  <div class="container">
    <div class="grid-2" style="gap:clamp(3rem,6vw,8rem);align-items:start">
      <div class="reveal">
        @if($service->cover_image)
          <img src="{{ asset('storage/' . $service->cover_image) }}" alt="{{ $service->title }}" style="width:100%;border-radius:var(--radius);aspect-ratio:4/3;object-fit:cover" loading="lazy">
        @endif
      </div>
      <div>
        <div class="eyebrow reveal">{{ $isTr ? 'Hizmet Detayı' : 'Service Detail' }}</div>
        <div class="reveal reveal--delay-1 prose" style="margin-top:1.5rem;color:var(--text-light);line-height:1.85">
          {!! $service->content !!}
        </div>
        <a href="{{ url($isTr ? 'tr/iletisim' : 'en/contact') }}" class="btn btn--primary btn--arrow" style="margin-top:2.5rem">
          {{ $isTr ? 'Bu Hizmet İçin Teklif Alın' : 'Request a Quote' }}
        </a>
      </div>
    </div>
  </div>
</section>

@if($relatedProjects->count())
<section class="section section--surface">
  <div class="container">
    <div class="section-header reveal">
      <div class="eyebrow">{{ $isTr ? 'İlgili Projeler' : 'Related Projects' }}</div>
      <h2>{{ $isTr ? 'Bu Hizmete Ait Projeler' : 'Projects in This Service' }}</h2>
    </div>
    <div class="project-grid">
      @foreach($relatedProjects as $i => $project)
      <a href="{{ url(($isTr ? 'tr/projeler' : 'en/projects') . '/' . $project->slug) }}" class="project-card reveal" style="transition-delay:{{ $i * 0.1 }}s">
        <img src="{{ $project->cover_image ? asset('storage/' . $project->cover_image) : asset('images/extracted/stitched_page_13.jpg') }}" alt="{{ $project->title }}" loading="lazy">
        <div class="project-card__overlay">
          <div class="project-card__meta">{{ $project->location }} · {{ $project->year }}</div>
          <h3 class="project-card__title">{{ $project->title }}</h3>
        </div>
      </a>
      @endforeach
    </div>
  </div>
</section>
@endif

@if($otherServices->count())
<section class="section section--surface2">
  <div class="container">
    <div class="section-header reveal">
      <div class="eyebrow">{{ $isTr ? 'Diğer Hizmetler' : 'Other Services' }}</div>
    </div>
    <div class="service-grid">
      @foreach($otherServices as $i => $s)
      <a href="{{ url(($isTr ? 'tr/hizmetler' : 'en/services') . '/' . $s->slug) }}" class="service-card reveal" style="transition-delay:{{ $i * 0.08 }}s; text-decoration:none;">
        <div class="service-card__img-wrapper">
          <img src="{{ $s->cover_image ? asset('storage/' . $s->cover_image) : asset('images/extracted/stitched_hvac.jpg') }}" alt="{{ $s->title }}">
        </div>
        <div class="service-card__left">
          <div class="service-card__num">0{{ $i + 1 }}</div>
          <h3 class="service-card__title" style="margin-top:0.5rem; font-size: 1.25rem;">{{ $s->title }}</h3>
          <p class="service-card__desc" style="color:var(--text-light); margin-bottom:1.5rem;">{{ $s->excerpt }}</p>
          <span class="service-card__btn" style="display:inline-block; margin-top:auto; font-size: 0.85rem; font-weight: 600; color: var(--accent); text-transform: uppercase;">{{ $isTr ? 'Detay' : 'Detail' }} →</span>
        </div>
      </a>
      @endforeach
    </div>
  </div>
</section>
@endif
@endsection
