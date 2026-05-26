@extends('layouts.app')
@php $locale = app()->getLocale(); $isTr = $locale === 'tr'; @endphp

@section('meta_title', $isTr ? 'Hizmetlerimiz — Setisan Elektromekanik' : 'Our Services — Setisan Elektromekanik')
@section('meta_desc', $isTr ? 'Mekanik tesisat, HVAC, ısıtma-soğutma, elektrik ve taahhüt hizmetlerimizi keşfedin.' : 'Explore our mechanical installation, HVAC, heating-cooling, electrical and contracting services.')

@section('content')

<div class="page-header">
  <div class="container">

    <h1>{{ $isTr ? 'Hizmetlerimiz' : 'Our Services' }}</h1>
    <p>{{ $isTr ? 'Elektromekanik mühendisliğin her dalında kapsamlı çözümler.' : 'Comprehensive solutions across every discipline of electromechanical engineering.' }}</p>
  </div>
</div>

<section class="section">
  <div class="container">
    <div class="service-grid">
      @foreach($services as $i => $service)
      <a href="{{ url(($isTr ? 'tr/hizmetler' : 'en/services') . '/' . $service->slug) }}" class="service-card reveal" style="transition-delay:{{ $i * 0.08 }}s; text-decoration:none;">
        <div class="service-card__img-wrapper">
          <img src="{{ $service->cover_image ? asset('storage/' . $service->cover_image) : asset('images/extracted/stitched_hvac.jpg') }}" alt="{{ $service->title }}">
        </div>
        <div class="service-card__left">
          <div class="service-card__num">0{{ $i + 1 }}</div>
          <h2 class="service-card__title" style="margin-top:0.5rem; font-size: 1.25rem;">{{ $service->title }}</h2>
          <p class="service-card__desc" style="color:var(--text-light); margin-bottom:1.5rem;">{{ $service->excerpt }}</p>
          <span class="service-card__btn" style="display:inline-block; margin-top:auto; font-size: 0.85rem; font-weight: 600; color: var(--accent); text-transform: uppercase;">{{ $isTr ? 'Detay' : 'Detail' }} →</span>
        </div>
      </a>
      @endforeach
    </div>
  </div>
</section>

<section class="cta-banner">
  <div class="container">
    <h2>{{ $isTr ? 'Projeniz için hizmet alın' : 'Get services for your project' }}</h2>
    <p>{{ $isTr ? 'Teknik ekibimiz ihtiyaçlarınızı değerlendirerek size özel çözüm sunar.' : 'Our technical team evaluates your needs and offers you a tailored solution.' }}</p>
    <a href="{{ url($isTr ? 'tr/iletisim' : 'en/contact') }}" class="btn btn--outline">{{ $isTr ? 'İletişime Geçin' : 'Contact Us' }} →</a>
  </div>
</section>

@endsection
