@extends('layouts.app')
@php $locale = app()->getLocale(); $isTr = $locale === 'tr'; @endphp

@section('meta_title', $isTr ? 'İletişim — Setisan Elektromekanik' : 'Contact — Setisan Elektromekanik')
@section('meta_desc', $isTr
  ? 'Projeleriniz için bizimle iletişime geçin. Teknik ekibimiz size özel çözüm sunar.'
  : 'Contact us for your projects. Our technical team offers you tailored solutions.')

@section('content')

<div class="page-header">
  <div class="container">

    <h1>{{ $isTr ? ($contactSettings['page_title_tr'] ?? 'İletişime Geçin') : ($contactSettings['page_title_en'] ?? 'Get in Touch') }}</h1>
    <p>{{ $isTr ? ($contactSettings['page_desc_tr'] ?? '') : ($contactSettings['page_desc_en'] ?? '') }}</p>
  </div>
</div>

<section class="section">
  <div class="container">
    <div class="contact-grid">

            <div class="reveal">

        <span class="label">{{ $isTr ? 'İletişim Bilgileri' : 'Contact Information' }}</span>

        @if(!empty($contactSettings['address']))
        <div class="contact-item" style="margin-top: 1.5rem;">
          <div class="contact-item__icon">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
          </div>
          <div>
            <div class="contact-item__label">{{ $isTr ? 'Adres' : 'Address' }}</div>
            <div class="contact-item__val">{{ $contactSettings['address'] }}</div>
          </div>
        </div>
        @endif

        @if(!empty($contactSettings['phone']))
        <div class="contact-item">
          <div class="contact-item__icon">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 1.35h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 9a16 16 0 0 0 6 6l1.27-.95a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7a2 2 0 0 1 1.72 2.02z"/></svg>
          </div>
          <div>
            <div class="contact-item__label">{{ $isTr ? 'Telefon' : 'Phone' }}</div>
            <div class="contact-item__val">
              <a href="tel:{{ preg_replace('/\D/', '', $contactSettings['phone']) }}">{{ $contactSettings['phone'] }}</a>
            </div>
          </div>
        </div>
        @endif

        @if(!empty($contactSettings['email']))
        <div class="contact-item">
          <div class="contact-item__icon">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
          </div>
          <div>
            <div class="contact-item__label">E-posta</div>
            <div class="contact-item__val">
              <a href="mailto:{{ $contactSettings['email'] }}">{{ $contactSettings['email'] }}</a>
            </div>
          </div>
        </div>
        @endif

        @if(!empty($contactSettings['web']))
        <div class="contact-item">
          <div class="contact-item__icon">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
          </div>
          <div>
            <div class="contact-item__label">Web</div>
            <div class="contact-item__val">
              <a href="https://{{ ltrim($contactSettings['web'], 'https://') }}" target="_blank" rel="noopener">{{ $contactSettings['web'] }}</a>
            </div>
          </div>
        </div>
        @endif

        @if(!empty($contactSettings['working_hours']))
        <div class="contact-item">
          <div class="contact-item__icon">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
          </div>
          <div>
            <div class="contact-item__label">{{ $isTr ? 'Çalışma Saatleri' : 'Working Hours' }}</div>
            <div class="contact-item__val">{{ $contactSettings['working_hours'] }}</div>
          </div>
        </div>
        @endif

        @if(!empty($contactSettings['map_embed']))
        <div class="contact-item" style="padding: 0; overflow: hidden;">
          <iframe
            src="{{ $contactSettings['map_embed'] }}"
            width="100%"
            height="280"
            style="border: 0; display: block;"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            title="{{ $isTr ? 'Konum Haritası' : 'Location Map' }}">
          </iframe>
        </div>
        @endif

      </div>

            <div class="reveal reveal-delay-1">

        @if(session('success'))
          <div class="alert alert--success" style="margin-bottom: 2rem;">
            {{ session('success') }}
          </div>
        @endif

        <span class="label">{{ $isTr ? 'Mesaj Gönderin' : 'Send a Message' }}</span>

        <form method="POST" action="{{ url($isTr ? 'tr/iletisim' : 'en/contact') }}" class="contact-form" style="margin-top: 1.5rem;">
          @csrf
          <div class="form-honeypot" aria-hidden="true">
            <input type="text" name="website" tabindex="-1" autocomplete="off">
          </div>

          <div class="form-row">
            <div class="form-group">
              <label class="form-label" for="name">{{ $isTr ? 'Ad Soyad' : 'Full Name' }} *</label>
              <input type="text" id="name" name="name" class="form-control" required value="{{ old('name') }}" placeholder="{{ $isTr ? 'Adınız Soyadınız' : 'Your full name' }}">
              @error('name')
                <span class="alert alert--error" style="padding:.4rem .75rem; margin:.25rem 0; display:block; font-size:.8rem;">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group">
              <label class="form-label" for="company">{{ $isTr ? 'Firma / Kurum' : 'Company' }}</label>
              <input type="text" id="company" name="company" class="form-control" value="{{ old('company') }}" placeholder="{{ $isTr ? 'Firma adı' : 'Company name' }}">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label class="form-label" for="email">E-posta *</label>
              <input type="email" id="email" name="email" class="form-control" required value="{{ old('email') }}" placeholder="{{ $isTr ? 'ornek@firma.com' : 'your@email.com' }}">
              @error('email')
                <span class="alert alert--error" style="padding:.4rem .75rem; margin:.25rem 0; display:block; font-size:.8rem;">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group">
              <label class="form-label" for="phone">{{ $isTr ? 'Telefon' : 'Phone' }}</label>
              <input type="tel" id="phone" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="05xx xxx xx xx">
            </div>
          </div>

          <div class="form-group">
            <label class="form-label" for="subject">{{ $isTr ? 'Konu' : 'Subject' }}</label>
            <input type="text" id="subject" name="subject" class="form-control" value="{{ old('subject') }}" placeholder="{{ $isTr ? 'Projeniz hakkında kısa bilgi' : 'Brief info about your project' }}">
          </div>

          <div class="form-group">
            <label class="form-label" for="message">{{ $isTr ? 'Mesajınız' : 'Your Message' }} *</label>
            <textarea id="message" name="message" class="form-control" required placeholder="{{ $isTr ? 'Projenizin teknik gereksinimlerini paylaşın…' : 'Share your project technical requirements…' }}">{{ old('message') }}</textarea>
            @error('message')
              <span class="alert alert--error" style="padding:.4rem .75rem; margin:.25rem 0; display:block; font-size:.8rem;">{{ $message }}</span>
            @enderror
          </div>

          <button type="submit" class="btn btn--primary" style="width: 100%;">
            {{ $isTr ? 'Mesajı Gönder' : 'Send Message' }} →
          </button>
        </form>
      </div>

    </div>
  </div>
</section>

<section class="cta-banner">
  <div class="container">
    <h2>{{ $isTr ? 'Projeniz için görüşelim' : "Let's discuss your project" }}</h2>
    <p>{{ $isTr ? 'Teknik ekibimiz ihtiyaçlarınızı değerlendirerek size özel çözüm sunar.' : 'Our technical team evaluates your needs and offers you a tailored solution.' }}</p>
    @if(!empty($contactSettings['phone']))
      <a href="tel:{{ preg_replace('/\D/', '', $contactSettings['phone']) }}" class="btn btn--outline">{{ $contactSettings['phone'] }} →</a>
    @endif
  </div>
</section>

@endsection
