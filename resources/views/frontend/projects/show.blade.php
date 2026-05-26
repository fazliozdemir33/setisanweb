@extends('layouts.app')
@php $locale = app()->getLocale(); $isTr = $locale === 'tr'; @endphp

@section('meta_title', ($project->meta_title ?? $project->title) . ' — Setisan Elektromekanik')
@section('meta_desc', $project->meta_desc ?? $project->scope)

@section('content')

<div class="page-header">
  <div class="container">

    <h1>{{ $project->title }}</h1>
  </div>
</div>

<section class="section">
  <div class="container">

    @if($project->cover_image)
    <img src="{{ asset('storage/' . $project->cover_image) }}" alt="{{ $project->title }}" class="project-detail__cover reveal">
    @endif

    <div class="project-detail__meta reveal">
      <div class="project-detail__meta-item">
        <strong>{{ $isTr ? 'Lokasyon' : 'Location' }}</strong>
        <span>{{ $project->location ?? '—' }}</span>
      </div>
      @if($project->size)
      <div class="project-detail__meta-item">
        <strong>{{ $isTr ? 'Büyüklük' : 'Size' }}</strong>
        <span>{{ $project->size }}</span>
      </div>
      @endif
      <div class="project-detail__meta-item">
        <strong>{{ $isTr ? 'Süre/Tarih' : 'Duration/Date' }}</strong>
        <span>{{ $project->duration ?? ($project->year ?? '—') }}</span>
      </div>
      @if($project->client)
      <div class="project-detail__meta-item">
        <strong>{{ $isTr ? 'İşveren' : 'Client' }}</strong>
        <span>{{ $project->client }}</span>
      </div>
      @endif
      @if($project->service)
      <div class="project-detail__meta-item">
        <strong>{{ $isTr ? 'Hizmet' : 'Service' }}</strong>
        <span>{{ $project->service->title }}</span>
      </div>
      @endif
    </div>

    <div class="grid-2" style="gap:clamp(3rem,6vw,8rem);align-items:start">
      <div>
        <div class="eyebrow reveal">{{ $isTr ? 'Proje Kapsamı' : 'Project Scope' }}</div>
        <p class="reveal reveal--delay-1" style="margin-top:1rem;font-size:var(--body-lg);font-weight:500;color:var(--dark)">{{ $project->scope }}</p>
        @if($project->description)
        <div class="reveal reveal--delay-2" style="margin-top:2rem;color:var(--text-light);line-height:1.85">
          {!! $project->description !!}
        </div>
        @endif
      </div>
      <div class="reveal reveal--delay-1" style="background:var(--surface);padding:2.5rem;border-radius:var(--radius)">
        <div class="eyebrow" style="margin-bottom:1.5rem">{{ $isTr ? 'Proje Bilgileri' : 'Project Info' }}</div>
        <table style="width:100%;font-size:var(--small);border-collapse:collapse">
          @if($project->location)
          <tr style="border-bottom:1px solid var(--border)">
            <td style="padding:.75rem 0;color:var(--muted);font-weight:500">{{ $isTr ? 'Lokasyon' : 'Location' }}</td>
            <td style="padding:.75rem 0;font-weight:600;text-align:right">{{ $project->location }}</td>
          </tr>
          @endif
          @if($project->size)
          <tr style="border-bottom:1px solid var(--border)">
            <td style="padding:.75rem 0;color:var(--muted);font-weight:500">{{ $isTr ? 'Büyüklük' : 'Size' }}</td>
            <td style="padding:.75rem 0;font-weight:600;text-align:right">{{ $project->size }}</td>
          </tr>
          @endif
          @if($project->client)
          <tr style="border-bottom:1px solid var(--border)">
            <td style="padding:.75rem 0;color:var(--muted);font-weight:500">{{ $isTr ? 'İşveren' : 'Client' }}</td>
            <td style="padding:.75rem 0;font-weight:600;text-align:right">{{ $project->client }}</td>
          </tr>
          @endif
          @if($project->duration || $project->year)
          <tr style="border-bottom:1px solid var(--border)">
            <td style="padding:.75rem 0;color:var(--muted);font-weight:500">{{ $isTr ? 'Süre/Tarih' : 'Duration/Date' }}</td>
            <td style="padding:.75rem 0;font-weight:600;text-align:right">{{ $project->duration ?? $project->year }}</td>
          </tr>
          @endif
          @if($project->service)
          <tr style="border-bottom:1px solid var(--border)">
            <td style="padding:.75rem 0;color:var(--muted);font-weight:500">{{ $isTr ? 'Hizmet Türü' : 'Service Type' }}</td>
            <td style="padding:.75rem 0;font-weight:600;text-align:right">{{ $project->service->title }}</td>
          </tr>
          @endif
          <tr>
            <td style="padding:.75rem 0;color:var(--muted);font-weight:500">{{ $isTr ? 'Durum' : 'Status' }}</td>
            <td style="padding:.75rem 0;font-weight:600;text-align:right">{{ $project->status === 'completed' ? ($isTr ? 'Tamamlandı' : 'Completed') : ($isTr ? 'Devam Ediyor' : 'Ongoing') }}</td>
          </tr>
        </table>
      </div>
    </div>

    @if($project->gallery->count())
    <div style="margin-top:5rem">
      <div class="eyebrow reveal">{{ $isTr ? 'Proje Galerisi' : 'Project Gallery' }}</div>
      
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
      
      <div class="swiper project-gallery-slider" style="margin-top:2rem; border-radius:var(--radius); overflow:hidden;">
        <div class="swiper-wrapper">
          @foreach($project->gallery as $img)
          <div class="swiper-slide">
            <img src="{{ asset('storage/' . $img->image_path) }}" alt="{{ $img->alt }}" loading="lazy" style="width:100%; height:600px; object-fit:cover; display:block;">
          </div>
          @endforeach
        </div>
        <div class="swiper-button-next" style="color:var(--accent);"></div>
        <div class="swiper-button-prev" style="color:var(--accent);"></div>
        <div class="swiper-pagination"></div>
      </div>

            <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
      <script>
        document.addEventListener('DOMContentLoaded', function () {
          new Swiper('.project-gallery-slider', {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            autoplay: {
              delay: 3500,
              disableOnInteraction: false,
            },
            navigation: {
              nextEl: '.swiper-button-next',
              prevEl: '.swiper-button-prev',
            },
            pagination: {
              el: '.swiper-pagination',
              clickable: true,
            },
            breakpoints: {
              768: {
                slidesPerView: 2,
              },
              1024: {
                slidesPerView: 3,
              }
            }
          });
        });
      </script>
    </div>
    @endif

  </div>
</section>

@if($relatedProjects->count())
<section class="section section--surface">
  <div class="container">
    <div class="section-header reveal">
      <div class="eyebrow">{{ $isTr ? 'İlgili Projeler' : 'Related Projects' }}</div>
    </div>
    <div class="project-grid">
      @foreach($relatedProjects as $i => $rp)
      <a href="{{ url(($isTr ? 'tr/projeler' : 'en/projects') . '/' . $rp->slug) }}" class="project-card reveal" style="transition-delay:{{ $i * 0.1 }}s">
        <img src="{{ $rp->cover_image ? asset('storage/' . $rp->cover_image) : asset('images/extracted/stitched_page_14.jpg') }}" alt="{{ $rp->title }}" loading="lazy">
        <div class="project-card__overlay">
          <div class="project-card__meta">
            {{ $rp->location }}
            @if($rp->size) · {{ $rp->size }} @endif
          </div>
          <h3 class="project-card__title">{{ $rp->title }}</h3>
        </div>
      </a>
      @endforeach
    </div>
  </div>
</section>
@endif
@endsection
