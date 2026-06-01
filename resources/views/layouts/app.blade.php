<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('meta_title', 'Setisan Elektromekanik — Mekanik Tesisat, HVAC ve Elektrik Sistemleri')</title>
  <meta name="description"
    content="@yield('meta_desc', 'Setisan Elektromekanik; mekanik tesisat, HVAC, ısıtma-soğutma ve elektrik sistemlerinde kurumsal ve endüstriyel projeler için uçtan uca mühendislik ve uygulama çözümleri sunar.')">
  <meta name="robots" content="index, follow">

  <meta property="og:title" content="@yield('meta_title', 'Setisan Elektromekanik — Mekanik Tesisat, HVAC ve Elektrik Sistemleri')">
  <meta property="og:description" content="@yield('meta_desc', 'Setisan Elektromekanik; mekanik tesisat, HVAC, ısıtma-soğutma ve elektrik sistemlerinde kurumsal ve endüstriyel projeler için uçtan uca mühendislik çözümleri sunar.')">
  <meta property="og:image" content="@yield('og_image', asset('images/og-default.jpg'))">
  <meta property="og:type" content="website">
  <meta property="og:url" content="{{ request()->url() }}">

  <link rel="alternate" hreflang="tr" href="{{ url('tr/' . request()->path()) }}">
  <link rel="alternate" hreflang="en" href="{{ url('en/' . request()->path()) }}">

  <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">
  <link rel="apple-touch-icon" href="{{ asset('favicon.png') }}">

  <link rel="stylesheet" href="{{ asset('css/app.css') }}?v=3.5">
</head>

@php
  $isHome = request()->routeIs('tr.home') || request()->routeIs('en.home');
@endphp
<body class="{{ $isHome ? 'is-home' : 'is-inner' }}">

  @if($isHome)
  <div id="app-preloader" class="preloader">
    <div class="preloader__logo" id="preloader-logo" style="display: flex; align-items: center; gap: 0.6rem;">
      <img src="{{ asset('images/logo.png') }}" alt="Setisan Logo" style="height: 2.2rem; width: auto; object-fit: contain;">
      <div style="display: flex; flex-direction: column; text-align: left; line-height: 1.1;">
        <span style="font-size: 1.5rem; font-weight: 800; letter-spacing: -0.04em; color: var(--white);">SETISAN<span style="color: var(--accent);">.</span></span>
        <span style="font-size: 0.52rem; font-weight: 600; letter-spacing: 0.16em; text-transform: uppercase; color: inherit; opacity: 0.85; margin-top: 0.15rem; white-space: nowrap;">ELEKTROMEKANİK – PROJE VE TAAHHÜT</span>
      </div>
    </div>
  </div>
  @endif

  <nav class="nav-glass{{ $isHome ? '' : ' nav--inner' }}">
    <div class="container nav-glass__inner">
      <a href="{{ url(app()->getLocale() === 'tr' ? 'tr' : 'en') }}" class="nav-glass__logo" style="display: flex; align-items: center; gap: 0.6rem; z-index: 1002; text-decoration: none;">
        <img src="{{ asset('images/logo.png') }}" alt="Setisan Logo" style="height: 2.2rem; width: auto; object-fit: contain;">
        <div style="display: flex; flex-direction: column; text-align: left; line-height: 1.1;">
          <span style="font-size: 1.5rem; font-weight: 800; letter-spacing: -0.04em; color: inherit;">SETISAN<span style="color: var(--accent);">.</span></span>
          <span style="font-size: 0.52rem; font-weight: 600; letter-spacing: 0.16em; text-transform: uppercase; color: inherit; opacity: 0.85; margin-top: 0.15rem; white-space: nowrap;">ELEKTROMEKANİK – PROJE VE TAAHHÜT</span>
        </div>
      </a>

      <button class="mobile-toggle" aria-label="Toggle Menu">
        <span></span><span></span><span></span>
      </button>

      <div class="nav-glass__menu-wrapper">
        <div class="nav-glass__links">
          <a href="{{ url(app()->getLocale() === 'tr' ? 'tr' : 'en') }}" class="nav-glass__link">
            {{ app()->getLocale() === 'tr' ? 'Anasayfa' : 'Home' }}
          </a>
          <a href="{{ url(app()->getLocale() === 'tr' ? 'tr/hakkimizda' : 'en/about') }}" class="nav-glass__link">
            {{ app()->getLocale() === 'tr' ? 'Hakkımızda' : 'About Us' }}
          </a>
          <a href="{{ url(app()->getLocale() === 'tr' ? 'tr/hizmetler' : 'en/services') }}" class="nav-glass__link">
            {{ app()->getLocale() === 'tr' ? 'Hizmetler' : 'Services' }}
          </a>
          <a href="{{ url(app()->getLocale() === 'tr' ? 'tr/projeler' : 'en/projects') }}" class="nav-glass__link">
            {{ app()->getLocale() === 'tr' ? 'Projeler/Referanslar' : 'Projects/References' }}
          </a>
        </div>
        <div class="nav-glass__actions" style="display: flex; align-items: center; gap: 1.5rem;">
          @php
            $routeName = Route::currentRouteName();
            $routeParams = Route::current() ? Route::current()->parameters() : [];
            
            $urlTr = url('tr');
            $urlEn = url('en');

            if ($routeName) {
                $nameTr = preg_replace('/^en\./', 'tr.', $routeName);
                $nameEn = preg_replace('/^tr\./', 'en.', $routeName);
                
                if (Route::has($nameTr)) $urlTr = route($nameTr, $routeParams);
                if (Route::has($nameEn)) $urlEn = route($nameEn, $routeParams);
            }
          @endphp
          <div class="nav-glass__lang" style="display:flex; gap:0.5rem; align-items:center;">
            <a href="{{ $urlTr }}" class="lang-link {{ app()->getLocale() === 'tr' ? 'active' : '' }}">TR</a>
            <span class="lang-separator">/</span>
            <a href="{{ $urlEn }}" class="lang-link {{ app()->getLocale() === 'en' ? 'active' : '' }}">EN</a>
          </div>
          <a href="{{ url(app()->getLocale() === 'tr' ? 'tr/iletisim' : 'en/contact') }}" class="nav-glass__cta">
            {{ app()->getLocale() === 'tr' ? 'Bize Ulaşın' : 'Contact Us' }}
          </a>
        </div>
      </div>
    </div>
  </nav>

  <main class="{{ $isHome ? '' : 'main--inner' }}">
    @yield('content')
  </main>

  <footer class="footer-reveal">
    <div class="f-left">
      <div class="f-logo" style="display: flex; align-items: center; gap: 0.6rem;">
        <img src="{{ asset('images/logo.png') }}" alt="Setisan Logo" style="height: 2.2rem; width: auto; object-fit: contain;">
        <div style="display: flex; flex-direction: column; text-align: left; line-height: 1.1;">
          <span style="font-size: 1.5rem; font-weight: 800; letter-spacing: -0.04em; color: var(--white);">SETISAN<span style="color: var(--accent);">.</span></span>
          <span style="font-size: 0.52rem; font-weight: 600; letter-spacing: 0.16em; text-transform: uppercase; color: inherit; opacity: 0.85; margin-top: 0.15rem; white-space: nowrap;">ELEKTROMEKANİK – PROJE VE TAAHHÜT</span>
        </div>
      </div>

      <p class="f-desc">
        {{ app()->getLocale() === 'tr' ? 'Endüstriyel tesisler ve kurumsal projeler için elektromekanik altyapıları, minimum hata anlayışıyla hayata geçiriyoruz. Setisan Elektromekanik olarak her projede; teknik mükemmellik, sürdürülebilirlik ve uzun vadeli verimliliği esas alıyor, güvenilir çözümler sunuyoruz.' : 'We bring electromechanical infrastructures for industrial facilities and corporate projects to life with a minimum-error approach. As Setisan Electromechanical, we base every project on technical excellence, sustainability, and long-term efficiency, providing reliable solutions.' }}
      </p>

      <div class="f-contact-main">
        <span>{{ app()->getLocale() === 'tr' ? 'Merkez Ofis' : 'Headquarters' }}</span>
        <strong><a href="tel:+902126036518" style="color: inherit; text-decoration: none;">+90 (212) 603 65 18</a></strong>
      </div>
    </div>

    <div class="f-right">
      <div class="f-right-top" style="display: flex; justify-content: flex-end; align-items: center;">
        <div class="f-social-icons" style="display: flex; gap: 1.5rem;">

          @php
            $socialInstagram = \App\Models\Setting::get('social_instagram');
            $socialLinkedin  = \App\Models\Setting::get('social_linkedin');
            $socialFacebook  = \App\Models\Setting::get('social_facebook');
            $socialYoutube   = \App\Models\Setting::get('social_youtube');
            $socialTwitter   = \App\Models\Setting::get('social_twitter');
          @endphp

          @if(!empty($socialInstagram))
          <a href="{{ $socialInstagram }}" target="_blank" rel="noopener" aria-label="Instagram">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
              <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
              <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
            </svg>
          </a>
          @endif

          @if(!empty($socialLinkedin))
          <a href="{{ $socialLinkedin }}" target="_blank" rel="noopener" aria-label="LinkedIn">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
              <rect x="2" y="9" width="4" height="12"></rect>
              <circle cx="4" cy="4" r="2"></circle>
            </svg>
          </a>
          @endif

          @if(!empty($socialFacebook))
          <a href="{{ $socialFacebook }}" target="_blank" rel="noopener" aria-label="Facebook">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
            </svg>
          </a>
          @endif

          @if(!empty($socialYoutube))
          <a href="{{ $socialYoutube }}" target="_blank" rel="noopener" aria-label="YouTube">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33 2.78 2.78 0 0 0 1.94 2c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.33 29 29 0 0 0-.46-5.33z"></path>
              <polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon>
            </svg>
          </a>
          @endif

          @if(!empty($socialTwitter))
          <a href="{{ $socialTwitter }}" target="_blank" rel="noopener" aria-label="Twitter / X">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"></path>
            </svg>
          </a>
          @endif

        </div>
      </div>

      <div class="f-right-mid">
        <div class="f-col">
          <h4>{{ app()->getLocale() === 'tr' ? 'Menü' : 'Menu' }}</h4>
          <a href="{{ url(app()->getLocale() === 'tr' ? 'tr' : 'en') }}">{{ app()->getLocale() === 'tr' ? 'Anasayfa' : 'Home' }}</a>
          <a href="{{ url(app()->getLocale() === 'tr' ? 'tr/hakkimizda' : 'en/about') }}">{{ app()->getLocale() === 'tr' ? 'Hakkımızda' : 'About Us' }}</a>
          <a href="{{ url(app()->getLocale() === 'tr' ? 'tr/hizmetler' : 'en/services') }}">{{ app()->getLocale() === 'tr' ? 'Hizmetler' : 'Services' }}</a>
          <a href="{{ url(app()->getLocale() === 'tr' ? 'tr/projeler' : 'en/projects') }}">{{ app()->getLocale() === 'tr' ? 'Projeler/Referanslar' : 'Projects/References' }}</a>
          <a href="{{ url(app()->getLocale() === 'tr' ? 'tr/iletisim' : 'en/contact') }}">{{ app()->getLocale() === 'tr' ? 'Bize Ulaşın' : 'Contact Us' }}</a>
        </div>
        <div class="f-col">
          <h4>{{ app()->getLocale() === 'tr' ? 'Kurumsal & Yasal' : 'Corporate & Legal' }}</h4>
          <a href="{{ route(app()->getLocale() . '.kvkk') }}">{{ app()->getLocale() === 'tr' ? 'KVKK Aydınlatma Metni' : 'KVKK Clarification Text' }}</a>
          <a href="{{ route(app()->getLocale() . '.privacy') }}">{{ app()->getLocale() === 'tr' ? 'Gizlilik Politikası' : 'Privacy Policy' }}</a>
          <a href="{{ route(app()->getLocale() . '.cookie') }}">{{ app()->getLocale() === 'tr' ? 'Çerez Politikası' : 'Cookie Policy' }}</a>
        </div>
      </div>

      <div class="f-right-bot">
        @php $footerAddress = \App\Models\Setting::get('contact_address'); @endphp
        @if(!empty($footerAddress))
        <div class="f-info">
          <h4>{{ app()->getLocale() === 'tr' ? 'Lokasyon' : 'Location' }}</h4>
          <p><a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($footerAddress) }}" target="_blank" rel="noopener" style="color: inherit; text-decoration: none;">{{ $footerAddress }}</a></p>
        </div>
        @endif
        @php $footerEmail = \App\Models\Setting::get('contact_email'); @endphp
        @if(!empty($footerEmail))
        <div class="f-info">
          <h4>E-Posta</h4>
          <p><a href="mailto:{{ $footerEmail }}" style="color:inherit">{{ $footerEmail }}</a></p>
        </div>
        @endif
      </div>
    </div>

  </footer>

  <script src="{{ asset('js/app.js') }}"></script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const mobileToggle = document.querySelector('.mobile-toggle');
      const menuWrapper = document.querySelector('.nav-glass__menu-wrapper');
      
      if(mobileToggle && menuWrapper) {
        mobileToggle.addEventListener('click', () => {
          mobileToggle.classList.toggle('active');
          menuWrapper.classList.toggle('active');
          const nav = document.querySelector('.nav-glass');
          if(nav) nav.classList.toggle('menu-open');
        });
      }
    });
  </script>
  <script>
    window.addEventListener('load', () => {
      const preloader = document.getElementById('app-preloader');
      const preloaderLogo = document.getElementById('preloader-logo');
      const realLogo = document.querySelector('.nav-glass__logo');

      if (!preloader || !preloaderLogo || !realLogo) return;

      setTimeout(() => {
        const rect = realLogo.getBoundingClientRect();

        preloader.classList.add('loaded');

        preloaderLogo.style.top = rect.top + 'px';
        preloaderLogo.style.left = rect.left + 'px';
        preloaderLogo.style.transform = 'translate(0, 0) scale(1)';

        setTimeout(() => {
          preloader.style.display = 'none';
          realLogo.style.opacity = '1';
        }, 1200);
      }, 500);
    });
  </script>
  {{-- Floating Video Widget --}}
  <div class="video-backdrop" id="videoBackdrop" style="display: none;"></div>
  <div class="floating-video-widget" id="floatingVideoWidget" style="display: none;">
    <button id="videoCloseBtn" class="video-close-btn" aria-label="Close Video">&times;</button>
    <video id="promoVideo" class="promo-video" loop muted playsinline disablePictureInPicture oncontextmenu="return false;" preload="none">
      <source data-src="{{ asset('videos/setisanvideo-web.mp4') }}" type="video/mp4">
      Your browser does not support the video tag.
    </video>
    <button id="videoMuteToggle" class="video-mute-btn" aria-label="Toggle Sound">
      {{-- Sound Off Icon --}}
      <svg id="icon-sound-off" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon>
        <line x1="23" y1="9" x2="17" y2="15"></line>
        <line x1="17" y1="9" x2="23" y2="15"></line>
      </svg>
      {{-- Sound On Icon --}}
      <svg id="icon-sound-on" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:none;">
        <polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon>
        <path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"></path>
      </svg>
    </button>
    <button id="videoExpandBtn" class="video-expand-btn" aria-label="Expand Video">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/>
      </svg>
    </button>
  </div>

  <div class="floating-video-trigger" id="floatingVideoTrigger" aria-label="Open Video" style="display: flex;">
    <div class="trigger-icon">
      <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <polygon points="5 3 19 12 5 21 5 3"></polygon>
      </svg>
    </div>
    <span class="trigger-text">
      {{ app()->getLocale() === 'tr' ? 'Bizi Tanıyın' : 'Get to Know Us' }}
    </span>
  </div>

  <style>
    .floating-video-widget {
      position: fixed;
      bottom: 2rem;
      right: 2rem;
      width: min(480px, calc(100vw - 4rem));
      height: min(270px, calc((100vw - 4rem) * 9 / 16));
      max-width: 480px;
      max-height: 270px;
      border-radius: 14px;
      overflow: hidden;
      box-shadow: 0 16px 48px rgba(0,0,0,0.55);
      z-index: 9999;
      background: #000;
      border: 2px solid rgba(255,255,255,0.12);
      transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.35s ease;
    }

    .promo-video {
      width: 100%;
      height: 100%;
      object-fit: cover;
      pointer-events: none;
    }
    
    .video-backdrop {
      position: fixed;
      inset: 0;
      background: rgba(0,0,0,0.85);
      backdrop-filter: blur(5px);
      z-index: 9998;
      opacity: 0;
      pointer-events: none;
      transition: opacity 0.35s ease;
    }
    .video-backdrop.active {
      opacity: 1;
      pointer-events: auto;
    }
    
    .floating-video-widget.theater-mode {
      top: 50% !important;
      left: 50% !important;
      right: auto !important;
      bottom: auto !important;
      transform: translate(-50%, -50%) !important;
      width: 90vw !important;
      height: 50.625vw !important;
      max-width: 1200px !important;
      max-height: 675px !important;
      z-index: 9999 !important;
      border-radius: 12px;
    }
    
    .promo-video::-webkit-media-controls {
        display: none !important;
    }

    .video-mute-btn {
      position: absolute;
      bottom: 0.75rem;
      right: 0.75rem;
      background: rgba(0,0,0,0.6);
      border: 1px solid rgba(255,255,255,0.2);
      color: #fff;
      width: 36px;
      height: 36px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      backdrop-filter: blur(4px);
      transition: background 0.2s, transform 0.2s;
      pointer-events: auto;
    }

    .video-mute-btn:hover {
      background: rgba(0,0,0,0.8);
      transform: scale(1.05);
    }

    .video-expand-btn {
      position: absolute;
      bottom: 0.75rem;
      right: 3.5rem;
      background: rgba(0,0,0,0.6);
      border: 1px solid rgba(255,255,255,0.2);
      color: #fff;
      width: 36px;
      height: 36px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      backdrop-filter: blur(4px);
      transition: background 0.2s, transform 0.2s;
      pointer-events: auto;
      z-index: 2;
    }

    .video-expand-btn:hover {
      background: rgba(0,0,0,0.8);
      transform: scale(1.05);
    }

    .video-close-btn {
      position: absolute;
      top: 0.5rem;
      right: 0.5rem;
      background: rgba(0,0,0,0.6);
      border: 1px solid rgba(255,255,255,0.2);
      color: #fff;
      width: 28px;
      height: 28px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      backdrop-filter: blur(4px);
      transition: background 0.2s, transform 0.2s;
      pointer-events: auto;
      z-index: 2;
      font-size: 18px;
      line-height: 1;
      padding: 0;
    }

    .video-close-btn:hover {
      background: rgba(0,0,0,0.8);
      transform: scale(1.05);
    }

    .floating-video-trigger {
      position: fixed;
      bottom: 2rem;
      right: 2rem;
      background: var(--accent);
      color: #fff;
      border-radius: 50px;
      display: flex;
      align-items: center;
      gap: 0.75rem;
      padding: 0.5rem 1.25rem 0.5rem 0.5rem;
      box-shadow: 0 6px 20px rgba(23, 97, 155, 0.3);
      cursor: pointer;
      z-index: 9999;
      transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), background 0.3s ease, box-shadow 0.3s ease, opacity 0.4s ease;
      text-decoration: none;
      border: 1px solid rgba(255,255,255,0.1);
    }

    .floating-video-trigger--hidden {
      opacity: 0 !important;
      transform: translateY(calc(100% + 2.5rem)) !important;
      pointer-events: none !important;
    }

    .floating-video-trigger:hover {
      transform: scale(1.05) translateY(-3px);
      background: #b04e12;
      box-shadow: 0 8px 25px rgba(176, 78, 18, 0.4);
    }
    
    .floating-video-trigger .trigger-icon {
      width: 36px;
      height: 36px;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.15);
      display: flex;
      align-items: center;
      justify-content: center;
      transition: background 0.3s ease;
    }
    
    .floating-video-trigger:hover .trigger-icon {
      background: rgba(255, 255, 255, 0.25);
    }

    .floating-video-trigger .trigger-text {
      font-size: 0.8rem;
      font-weight: 700;
      letter-spacing: 0.08em;
      text-transform: uppercase;
      white-space: nowrap;
      color: #ffffff;
    }

    @media (max-width: 768px) {
      .floating-video-widget {
        bottom: 1rem;
        right: 1rem;
        width: min(300px, calc(100vw - 2rem));
        height: min(169px, calc((100vw - 2rem) * 9 / 16));
        max-width: 300px;
        max-height: 169px;
        border-radius: 10px;
      }
      .video-mute-btn {
        width: 30px;
        height: 30px;
        bottom: 0.5rem;
        right: 0.5rem;
      }
      .video-mute-btn svg {
        width: 16px;
        height: 16px;
      }
      .floating-video-trigger {
        bottom: 1rem;
        right: 1rem;
        width: 42px;
        height: 42px;
        padding: 0;
        gap: 0;
        border-radius: 50%;
        justify-content: center;
      }
      .floating-video-trigger .trigger-icon {
        width: 100%;
        height: 100%;
        background: transparent;
      }
      .floating-video-trigger .trigger-text {
        display: none;
      }
      .video-close-btn {
        width: 24px;
        height: 24px;
        font-size: 16px;
        top: 0.35rem;
        right: 0.35rem;
      }
    }
  </style>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const widget = document.getElementById('floatingVideoWidget');
      const trigger = document.getElementById('floatingVideoTrigger');
      const video = document.getElementById('promoVideo');
      const muteBtn = document.getElementById('videoMuteToggle');
      const closeBtn = document.getElementById('videoCloseBtn');
      const iconSoundOff = document.getElementById('icon-sound-off');
      const iconSoundOn = document.getElementById('icon-sound-on');
      const expandBtn = document.getElementById('videoExpandBtn');
      const backdrop = document.getElementById('videoBackdrop');

      let isVideoStarted = false;
      let isVideoOpen = false;

      // --- Scroll-hide logic ---
      let lastScrollY = window.scrollY;
      const SCROLL_THRESHOLD = 120; // px aşağı kaydırıldığında gizle

      function updateTriggerVisibility() {
        if (isVideoOpen || !trigger) return;
        const currentY = window.scrollY;
        const scrollingDown = currentY > lastScrollY;

        if (scrollingDown && currentY > SCROLL_THRESHOLD) {
          trigger.classList.add('floating-video-trigger--hidden');
        } else {
          trigger.classList.remove('floating-video-trigger--hidden');
        }
        lastScrollY = currentY;
      }

      window.addEventListener('scroll', updateTriggerVisibility, { passive: true });
      // --- End scroll-hide logic ---
      
      let isTheaterMode = false;

      function toggleTheaterMode(e) {
        if(e) e.stopPropagation();
        isTheaterMode = !isTheaterMode;
        if (isTheaterMode) {
          widget.classList.add('theater-mode');
          backdrop.style.display = 'block';
          requestAnimationFrame(() => backdrop.classList.add('active'));
        } else {
          widget.classList.remove('theater-mode');
          backdrop.classList.remove('active');
          setTimeout(() => { if(!isTheaterMode) backdrop.style.display = 'none'; }, 350);
        }
      }

      function closeVideoWidget() {
          if (widget) widget.style.display = 'none';
          if (trigger) {
            trigger.style.display = 'flex';
            // Scroll'a göre yeniden değerlendir
            isVideoOpen = false;
            updateTriggerVisibility();
          }
          if (video) {
              video.pause();
              video.currentTime = 0;
          }
          if (isTheaterMode) {
              toggleTheaterMode();
          }
      }

      function openVideoWidget() {
          isVideoOpen = true;
          if (widget) widget.style.display = 'block';
          if (trigger) {
            trigger.style.display = 'none';
            trigger.classList.remove('floating-video-trigger--hidden');
          }
          
          if (video && !isVideoStarted) {
             const source = video.querySelector('source');
             if (source && source.dataset.src && !source.src) {
                 source.src = source.dataset.src;
                 video.load();
             }
             isVideoStarted = true;
          }
          if (video) {
              video.currentTime = 0;
              video.play().catch(e => console.log('Autoplay prevented:', e));
          }
      }

      if (closeBtn) closeBtn.addEventListener('click', closeVideoWidget);
      if (trigger) trigger.addEventListener('click', openVideoWidget);
      if (expandBtn) expandBtn.addEventListener('click', toggleTheaterMode);
      if (backdrop) backdrop.addEventListener('click', toggleTheaterMode);

      if(video && muteBtn) {
        muteBtn.addEventListener('click', (e) => {
          e.preventDefault();
          e.stopPropagation();
          
          if(video.muted) {
            video.muted = false;
            iconSoundOff.style.display = 'none';
            iconSoundOn.style.display = 'block';
          } else {
            video.muted = true;
            iconSoundOff.style.display = 'block';
            iconSoundOn.style.display = 'none';
          }
        });
      }
    });
  </script>
</body>

</html>