@extends('layouts.app')
@php $locale = app()->getLocale(); $isTr = $locale === 'tr'; @endphp

@section('meta_title', ($service->meta_title ?? $service->title) . ' — Setisan Elektromekanik')
@section('meta_desc', $service->meta_desc ?? $service->excerpt)

@section('content')

<div class="page-header">
  <div class="container">
    {{-- Breadcrumb removed --}}
    <h1>{{ $service->title }}</h1>
    <p>{{ $service->excerpt }}</p>
  </div>
</div>

<section class="section">
  <div class="container">
    <div class="grid-2" style="gap:clamp(3rem,6vw,8rem);align-items:start">
      <div class="reveal">
        @if($service->cover_image)
          <img src="{{ asset('storage/' . $service->cover_image) }}" alt="{{ $service->title }}"
               style="width:100%;border-radius:var(--radius);aspect-ratio:4/3;object-fit:cover" loading="lazy">
        @else
          <img src="{{ asset('images/extracted/stitched_hvac.jpg') }}" alt="{{ $service->title }}"
               style="width:100%;border-radius:var(--radius);aspect-ratio:4/3;object-fit:cover;filter:brightness(0.85)" loading="lazy">
        @endif
      </div>
      <div>
        <div class="eyebrow reveal">{{ $parent->title }}</div>
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

{{-- Related Projects --}}
@if($relatedProjects->count())
<section class="section section--surface">
  <div class="container">
    <div class="section-header reveal">
      <div class="eyebrow">{{ $isTr ? 'İlgili Projeler' : 'Related Projects' }}</div>
      <h2>{{ $isTr ? 'Bu Hizmete Ait Projeler' : 'Projects in This Service' }}</h2>
    </div>
    <div class="project-grid">
      @foreach($relatedProjects as $i => $project)
      <div class="flip-card-wrapper reveal"
           style="transition-delay:{{ $i * 0.1 }}s"
           data-href="{{ url(($isTr ? 'tr/projeler' : 'en/projects') . '/' . $project->slug) }}">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="{{ $project->cover_image ? asset('storage/' . $project->cover_image) : asset('images/extracted/stitched_page_13.jpg') }}" alt="{{ $project->title }}" loading="lazy">
            <div class="project-card__overlay">
              <div class="project-card__meta">{{ $project->location }} · {{ $project->year }}</div>
              <h3 class="project-card__title">{{ $project->title }}</h3>
            </div>
          </div>
          <div class="flip-card-back">
            @if($project->service)
              <span class="flip-card-back__tag">{{ $project->service->title }}</span>
            @endif
            <div class="flip-card-back__title">{{ $project->title }}</div>
            <div class="flip-card-back__divider"></div>
            <div class="flip-card-back__info">
              @if($project->client)
              <div class="flip-card-back__row">
                <span class="flip-card-back__label">{{ $isTr ? 'İşveren' : 'Client' }}</span>
                <span class="flip-card-back__value">{{ $project->client }}</span>
              </div>
              @endif
              @if($project->scope)
              <div class="flip-card-back__row">
                <span class="flip-card-back__label">{{ $isTr ? 'Kapsam' : 'Scope' }}</span>
                <span class="flip-card-back__value">{{ $project->scope }}</span>
              </div>
              @endif
              @if($project->duration)
              <div class="flip-card-back__row">
                <span class="flip-card-back__label">{{ $isTr ? 'Süre' : 'Duration' }}</span>
                <span class="flip-card-back__value">{{ $project->duration }}</span>
              </div>
              @elseif($project->year)
              <div class="flip-card-back__row">
                <span class="flip-card-back__label">{{ $isTr ? 'Yıl' : 'Year' }}</span>
                <span class="flip-card-back__value">{{ $project->year }}</span>
              </div>
              @endif
            </div>
            @if($project->description)
              <div class="flip-card-back__desc">{{ $project->description }}</div>
            @endif
            <a href="{{ url(($isTr ? 'tr/projeler' : 'en/projects') . '/' . $project->slug) }}"
               class="flip-card-back__btn">
              {{ $isTr ? 'Detayları Gör' : 'View Details' }} →
            </a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endif

{{-- Sibling Sub-Services --}}
@if($siblingServices->count())
<section class="section section--surface2">
  <div class="container">
    <div class="section-header reveal">
      <div class="eyebrow">{{ $isTr ? 'Diğer Alt Hizmetler' : 'Other Sub-Services' }}</div>
      <h2>{{ $parent->title }}</h2>
    </div>
    <div class="sub-service-grid">
      @foreach($siblingServices as $i => $sibling)
      <a href="{{ url(($isTr ? 'tr/hizmetler' : 'en/services') . '/' . $parent->slug . '/' . $sibling->slug) }}"
         class="sub-service-card reveal" style="transition-delay: {{ $i * 0.07 }}s; text-decoration: none;">
        @if($sibling->cover_image)
        <div class="sub-service-card__img">
          <img src="{{ asset('storage/' . $sibling->cover_image) }}" alt="{{ $sibling->title }}" loading="lazy">
        </div>
        @else
        <div class="sub-service-card__img sub-service-card__img--placeholder">
          <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/>
          </svg>
        </div>
        @endif
        <div class="sub-service-card__body">
          <div class="sub-service-card__num">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</div>
          <h3 class="sub-service-card__title">{{ $sibling->title }}</h3>
          @if($sibling->excerpt)
          <p class="sub-service-card__desc">{{ $sibling->excerpt }}</p>
          @endif
          <span class="sub-service-card__arrow">{{ $isTr ? 'Detayı İncele' : 'View Detail' }} →</span>
        </div>
      </a>
      @endforeach
    </div>
  </div>
</section>
@endif

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
  const isMobile = () => window.matchMedia('(hover: none)').matches;
  document.querySelectorAll('.flip-card-wrapper').forEach(card => {
    card.addEventListener('click', (e) => {
      if (!isMobile()) return;
      if (e.target.closest('.flip-card-back__btn')) return;
      if (!card.classList.contains('flipped')) {
        e.preventDefault();
        document.querySelectorAll('.flip-card-wrapper.flipped').forEach(other => {
          if (other !== card) other.classList.remove('flipped');
        });
        card.classList.add('flipped');
      } else {
        card.classList.remove('flipped');
      }
    });
  });
});
</script>
@endpush
