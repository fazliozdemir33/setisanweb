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

    {{-- ── HERO COVER (cover_image) ── --}}
    @if($project->cover_image)
    <div class="proj-hero reveal">
      <img id="proj-hero-img"
        src="{{ asset('storage/' . $project->cover_image) }}"
        alt="{{ $project->title }}"
        data-full="{{ asset('storage/' . $project->cover_image) }}">
    </div>
    @endif

    {{-- ── META STRIP ── --}}
    <div class="project-detail__meta reveal">
      @if($project->location)
      <div class="project-detail__meta-item">
        <strong>{{ $isTr ? 'Lokasyon' : 'Location' }}</strong>
        <span>{{ $project->location }}</span>
      </div>
      @endif
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
      @if($project->sector)
      <div class="project-detail__meta-item">
        <strong>{{ $isTr ? 'Sektör' : 'Sector' }}</strong>
        <span>{{ $project->sector->name }}</span>
      </div>
      @endif
      @if($project->categories->count())
      <div class="project-detail__meta-item">
        <strong>{{ $isTr ? 'Kategoriler' : 'Categories' }}</strong>
        <span>
          @foreach($project->categories as $cat)
            {{ $isTr ? $cat->name_tr : ($cat->name_en ?? $cat->name_tr) }}@if(!$loop->last), @endif
          @endforeach
        </span>
      </div>
      @endif
    </div>

    {{-- ── SCOPE + INFO TABLE ── --}}
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
          @if($project->sector)
          <tr style="border-bottom:1px solid var(--border)">
            <td style="padding:.75rem 0;color:var(--muted);font-weight:500">{{ $isTr ? 'Sektör' : 'Sector' }}</td>
            <td style="padding:.75rem 0;font-weight:600;text-align:right">{{ $project->sector->name }}</td>
          </tr>
          @endif
          <tr>
            <td style="padding:.75rem 0;color:var(--muted);font-weight:500">{{ $isTr ? 'Durum' : 'Status' }}</td>
            <td style="padding:.75rem 0;font-weight:600;text-align:right">
              {{ $project->status === 'completed' ? ($isTr ? 'Tamamlandı' : 'Completed') : ($isTr ? 'Devam Ediyor' : 'Ongoing') }}
            </td>
          </tr>
        </table>
      </div>
    </div>

    {{-- ══════════════════════════════════════════════
         GALLERY  —  Hero + Thumbnails + Lightbox
    ══════════════════════════════════════════════ --}}
    @php
      // Collect all images: cover first, then gallery
      $allImages = collect();
      if ($project->cover_image) {
          $allImages->push((object)['src' => asset('storage/' . $project->cover_image), 'alt' => $project->title]);
      }
      foreach ($project->gallery as $img) {
          $allImages->push((object)['src' => asset('storage/' . $img->image_path), 'alt' => ($img->alt ?? $project->title)]);
      }
    @endphp

    @if($allImages->count() > 1)
    <div class="proj-gallery reveal" style="margin-top:5rem" id="proj-gallery">
      <div class="eyebrow" style="margin-bottom:1.5rem">{{ $isTr ? 'Proje Galerisi' : 'Project Gallery' }}</div>

      {{-- Big hero viewer --}}
      <div class="proj-gallery__hero" id="gallery-hero">
        <img id="gallery-hero-img"
          src="{{ $allImages->first()->src }}"
          alt="{{ $allImages->first()->alt }}"
          data-index="0">
        {{-- Arrow prev --}}
        <button class="gallery-arrow gallery-arrow--prev" id="gallery-prev" aria-label="Previous">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
        </button>
        {{-- Arrow next --}}
        <button class="gallery-arrow gallery-arrow--next" id="gallery-next" aria-label="Next">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
        </button>
        {{-- Expand button --}}
        <button class="gallery-expand-btn" id="gallery-expand" aria-label="Fullscreen">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 3 21 3 21 9"/><polyline points="9 21 3 21 3 15"/><line x1="21" y1="3" x2="14" y2="10"/><line x1="3" y1="21" x2="10" y2="14"/></svg>
        </button>
        {{-- Counter --}}
        <div class="gallery-counter" id="gallery-counter">1 / {{ $allImages->count() }}</div>
      </div>

      {{-- Thumbnail strip --}}
      <div class="proj-gallery__thumbs" id="gallery-thumbs">
        @foreach($allImages as $idx => $img)
          <button class="gallery-thumb {{ $idx === 0 ? 'active' : '' }}" data-index="{{ $idx }}" data-src="{{ $img->src }}" data-alt="{{ $img->alt }}" aria-label="Görsel {{ $idx + 1 }}">
            <img src="{{ $img->src }}" alt="{{ $img->alt }}" loading="lazy">
          </button>
        @endforeach
      </div>
    </div>

    {{-- ── LIGHTBOX ── --}}
    <div class="proj-lightbox" id="proj-lightbox" role="dialog" aria-modal="true" aria-label="Galeri">
      <button class="proj-lightbox__close" id="lightbox-close" aria-label="Kapat">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
      </button>
      <button class="proj-lightbox__arrow proj-lightbox__arrow--prev" id="lb-prev" aria-label="Önceki">
        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="15 18 9 12 15 6"/></svg>
      </button>
      <div class="proj-lightbox__img-wrap">
        <img id="lightbox-img" src="" alt="">
      </div>
      <button class="proj-lightbox__arrow proj-lightbox__arrow--next" id="lb-next" aria-label="Sonraki">
        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="9 18 15 12 9 6"/></svg>
      </button>
      <div class="proj-lightbox__counter" id="lb-counter"></div>
    </div>

    <style>
      /* ── Hero viewer ── */
      .proj-hero { display: none; } /* hide old hero, gallery has it */

      .proj-gallery__hero {
        position: relative;
        width: 100%;
        aspect-ratio: 16 / 7;
        border-radius: var(--radius, 8px);
        overflow: hidden;
        background: #0a0a0a;
        cursor: zoom-in;
      }
      .proj-gallery__hero img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform 0.4s ease, opacity 0.25s ease;
      }
      .proj-gallery__hero:hover img { transform: scale(1.015); }

      /* ── Arrows ── */
      .gallery-arrow {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(0,0,0,0.55);
        border: 1px solid rgba(255,255,255,0.15);
        color: #fff;
        width: 44px; height: 44px;
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        cursor: pointer;
        transition: background 0.2s, transform 0.2s;
        backdrop-filter: blur(6px);
        z-index: 2;
      }
      .gallery-arrow:hover { background: rgba(0,0,0,0.8); transform: translateY(-50%) scale(1.06); }
      .gallery-arrow--prev { left: 1rem; }
      .gallery-arrow--next { right: 1rem; }

      /* ── Expand + counter ── */
      .gallery-expand-btn {
        position: absolute;
        top: 1rem; right: 1rem;
        background: rgba(0,0,0,0.55);
        border: 1px solid rgba(255,255,255,0.15);
        color: #fff;
        width: 38px; height: 38px;
        border-radius: 8px;
        display: flex; align-items: center; justify-content: center;
        cursor: pointer;
        transition: background 0.2s;
        backdrop-filter: blur(6px);
        z-index: 2;
      }
      .gallery-expand-btn:hover { background: rgba(0,0,0,0.8); }
      .gallery-counter {
        position: absolute;
        bottom: 1rem; left: 1rem;
        background: rgba(0,0,0,0.55);
        color: #fff;
        font-size: 0.75rem;
        font-weight: 600;
        padding: 0.3rem 0.75rem;
        border-radius: 50px;
        backdrop-filter: blur(6px);
        pointer-events: none;
      }

      /* ── Thumbnails ── */
      .proj-gallery__thumbs {
        display: flex;
        gap: 0.5rem;
        margin-top: 0.75rem;
        overflow-x: auto;
        padding-bottom: 0.25rem;
        scrollbar-width: thin;
        scrollbar-color: var(--accent, #d4621a) transparent;
      }
      .proj-gallery__thumbs::-webkit-scrollbar { height: 4px; }
      .proj-gallery__thumbs::-webkit-scrollbar-track { background: transparent; }
      .proj-gallery__thumbs::-webkit-scrollbar-thumb { background: var(--accent, #d4621a); border-radius: 2px; }

      .gallery-thumb {
        flex: 0 0 auto;
        width: 96px; height: 64px;
        border-radius: 6px;
        overflow: hidden;
        padding: 0;
        border: 2px solid transparent;
        cursor: pointer;
        transition: border-color 0.2s, opacity 0.2s, transform 0.2s;
        background: #eee;
        opacity: 0.65;
      }
      .gallery-thumb:hover { opacity: 0.9; transform: translateY(-2px); }
      .gallery-thumb.active { border-color: var(--accent, #d4621a); opacity: 1; }
      .gallery-thumb img { width: 100%; height: 100%; object-fit: cover; display: block; }

      /* ── Lightbox ── */
      .proj-lightbox {
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,0.95);
        z-index: 99999;
        display: none;
        align-items: center;
        justify-content: center;
        padding: 2rem;
      }
      .proj-lightbox.open { display: flex; }
      .proj-lightbox__img-wrap {
        max-width: min(90vw, 1200px);
        max-height: 85vh;
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .proj-lightbox__img-wrap img {
        max-width: 100%;
        max-height: 85vh;
        object-fit: contain;
        border-radius: 6px;
        box-shadow: 0 32px 80px rgba(0,0,0,0.7);
      }
      .proj-lightbox__close {
        position: fixed;
        top: 1.25rem; right: 1.5rem;
        background: rgba(255,255,255,0.1);
        border: 1px solid rgba(255,255,255,0.2);
        color: #fff;
        width: 44px; height: 44px;
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        cursor: pointer;
        transition: background 0.2s;
        z-index: 2;
      }
      .proj-lightbox__close:hover { background: rgba(255,255,255,0.2); }
      .proj-lightbox__arrow {
        position: fixed;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(255,255,255,0.1);
        border: 1px solid rgba(255,255,255,0.2);
        color: #fff;
        width: 52px; height: 52px;
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        cursor: pointer;
        transition: background 0.2s, transform 0.2s;
        z-index: 2;
      }
      .proj-lightbox__arrow:hover { background: rgba(255,255,255,0.2); transform: translateY(-50%) scale(1.06); }
      .proj-lightbox__arrow--prev { left: 1.5rem; }
      .proj-lightbox__arrow--next { right: 1.5rem; }
      .proj-lightbox__counter {
        position: fixed;
        bottom: 1.5rem; left: 50%;
        transform: translateX(-50%);
        color: rgba(255,255,255,0.6);
        font-size: 0.8rem;
        font-weight: 500;
      }

      @media (max-width: 640px) {
        .proj-gallery__hero { aspect-ratio: 4 / 3; }
        .gallery-arrow { width: 36px; height: 36px; }
        .gallery-thumb { width: 72px; height: 48px; }
        .proj-lightbox__arrow { width: 40px; height: 40px; }
        .proj-lightbox__arrow--prev { left: 0.5rem; }
        .proj-lightbox__arrow--next { right: 0.5rem; }
      }
    </style>

    <script>
    (function () {
      const images = @json($allImages->map(fn($i) => ['src' => $i->src, 'alt' => $i->alt])->values());
      let current = 0;

      // — Gallery elements —
      const heroImg   = document.getElementById('gallery-hero-img');
      const thumbs    = document.querySelectorAll('.gallery-thumb');
      const counter   = document.getElementById('gallery-counter');
      const prevBtn   = document.getElementById('gallery-prev');
      const nextBtn   = document.getElementById('gallery-next');
      const expandBtn = document.getElementById('gallery-expand');

      // — Lightbox elements —
      const lb       = document.getElementById('proj-lightbox');
      const lbImg    = document.getElementById('lightbox-img');
      const lbPrev   = document.getElementById('lb-prev');
      const lbNext   = document.getElementById('lb-next');
      const lbClose  = document.getElementById('lightbox-close');
      const lbCounter= document.getElementById('lb-counter');

      function setActive(idx, animate = true) {
        current = (idx + images.length) % images.length;
        if (animate) heroImg.style.opacity = '0.4';
        setTimeout(() => {
          heroImg.src = images[current].src;
          heroImg.alt = images[current].alt;
          heroImg.style.opacity = '1';
        }, animate ? 150 : 0);
        counter.textContent = (current + 1) + ' / ' + images.length;
        thumbs.forEach((t, i) => t.classList.toggle('active', i === current));
        // scroll thumb into view
        if (thumbs[current]) thumbs[current].scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
      }

      thumbs.forEach(t => {
        t.addEventListener('click', () => setActive(+t.dataset.index));
      });
      prevBtn.addEventListener('click', () => setActive(current - 1));
      nextBtn.addEventListener('click', () => setActive(current + 1));

      // open lightbox
      function openLightbox(idx) {
        current = idx;
        lbImg.src = images[current].src;
        lbImg.alt = images[current].alt;
        lbCounter.textContent = (current + 1) + ' / ' + images.length;
        lb.classList.add('open');
        document.body.style.overflow = 'hidden';
      }
      function closeLightbox() {
        lb.classList.remove('open');
        document.body.style.overflow = '';
      }
      function lbNav(dir) {
        current = (current + dir + images.length) % images.length;
        lbImg.style.opacity = '0.3';
        setTimeout(() => {
          lbImg.src = images[current].src;
          lbImg.alt = images[current].alt;
          lbImg.style.opacity = '1';
          lbCounter.textContent = (current + 1) + ' / ' + images.length;
        }, 120);
        setActive(current, false);
      }

      document.getElementById('gallery-hero').addEventListener('click', (e) => {
        if (!e.target.closest('button')) openLightbox(current);
      });
      expandBtn.addEventListener('click', (e) => { e.stopPropagation(); openLightbox(current); });
      lbClose.addEventListener('click', closeLightbox);
      lbPrev.addEventListener('click', () => lbNav(-1));
      lbNext.addEventListener('click', () => lbNav(1));
      lb.addEventListener('click', (e) => { if (e.target === lb) closeLightbox(); });

      document.addEventListener('keydown', (e) => {
        if (!lb.classList.contains('open')) return;
        if (e.key === 'ArrowLeft')  lbNav(-1);
        if (e.key === 'ArrowRight') lbNav(1);
        if (e.key === 'Escape')     closeLightbox();
      });
    })();
    </script>
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
