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
    <div class="preloader__logo" id="preloader-logo" style="display: flex; align-items: center; gap: 0.5rem;">
      <img src="{{ asset('images/logo.png') }}" alt="Setisan Logo" style="height: 1.2em; width: auto; object-fit: contain;">
      <span>SETISAN<span style="color: var(--accent);">.</span></span>
    </div>
  </div>
  @endif

  <nav class="nav-glass{{ $isHome ? '' : ' nav--inner' }}">
    <div class="container nav-glass__inner">
      <a href="{{ url(app()->getLocale() === 'tr' ? 'tr' : 'en') }}" class="nav-glass__logo" style="display: flex; align-items: center; gap: 0.5rem; z-index: 1002;">
        <img src="{{ asset('images/logo.png') }}" alt="Setisan Logo" style="height: 1.2em; width: auto; object-fit: contain;">
        <span>SETISAN<span style="color: var(--accent);">.</span></span>
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
            $path = request()->path();
            $pathTr = preg_replace('/^en/', 'tr', $path);
            if (!str_starts_with($pathTr, 'tr')) $pathTr = 'tr/' . ltrim($pathTr, '/');

            $pathEn = preg_replace('/^tr/', 'en', $path);
            if (!str_starts_with($pathEn, 'en')) $pathEn = 'en/' . ltrim($pathEn, '/');
          @endphp
          <div class="nav-glass__lang" style="display:flex; gap:0.5rem; align-items:center;">
            <a href="{{ url($pathTr) }}" class="lang-link {{ app()->getLocale() === 'tr' ? 'active' : '' }}">TR</a>
            <span class="lang-separator">/</span>
            <a href="{{ url($pathEn) }}" class="lang-link {{ app()->getLocale() === 'en' ? 'active' : '' }}">EN</a>
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
      <div class="f-logo" style="display: flex; align-items: center; gap: 0.5rem;">
        <img src="{{ asset('images/logo.png') }}" alt="Setisan Logo" style="height: 1.2em; width: auto; object-fit: contain;">
        <span>SETISAN<span style="color: var(--accent);">.</span></span>
      </div>

      <p class="f-desc">
        {{ app()->getLocale() === 'tr' ? 'Endüstriyel tesisler ve kurumsal projeler için elektromekanik altyapıları, minimum hata anlayışıyla hayata geçiriyoruz. Setisan Elektromekanik olarak her projede; teknik mükemmellik, sürdürülebilirlik ve uzun vadeli verimliliği esas alıyor, güvenilir çözümler sunuyoruz.' : 'We bring electromechanical infrastructures for industrial facilities and corporate projects to life with a minimum-error approach. As Setisan Electromechanical, we base every project on technical excellence, sustainability, and long-term efficiency, providing reliable solutions.' }}
      </p>

      <div class="f-contact-main">
        <span>{{ app()->getLocale() === 'tr' ? 'Merkez Satış Ofisi' : 'Headquarters' }}</span>
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
      </div>

      <div class="f-right-bot">
        @php $footerAddress = \App\Models\Setting::get('contact_address'); @endphp
        @if(!empty($footerAddress))
        <div class="f-info">
          <h4>{{ app()->getLocale() === 'tr' ? 'Lokasyon' : 'Location' }}</h4>
          <p>{{ $footerAddress }}</p>
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
  </div>

  <div class="floating-video-trigger" id="floatingVideoTrigger" aria-label="Open Video" style="display: flex;">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
      <polygon points="5 3 19 12 5 21 5 3"></polygon>
    </svg>
  </div>

  <style>
    .floating-video-widget {
      position: fixed;
      bottom: 2rem;
      right: 2rem;
      width: 280px;
      height: 158px;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0,0,0,0.5);
      z-index: 9999;
      background: #000;
      border: 2px solid rgba(255,255,255,0.1);
      transition: transform 0.3s ease, width 0.3s ease, height 0.3s ease;
    }

    .promo-video {
      width: 100%;
      height: 100%;
      object-fit: cover;
      pointer-events: none;
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
      width: 56px;
      height: 56px;
      background: var(--accent);
      color: #fff;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 4px 12px rgba(0,0,0,0.3);
      cursor: pointer;
      z-index: 9999;
      transition: transform 0.3s ease, background 0.3s ease;
    }

    .floating-video-trigger:hover {
      transform: scale(1.1);
      background: #b04e12;
    }

    @media (max-width: 768px) {
      .floating-video-widget {
        bottom: 1.5rem;
        right: 1.5rem;
        width: 180px;
        height: 101px;
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
        bottom: 1.5rem;
        right: 1.5rem;
        width: 48px;
        height: 48px;
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

      let isVideoStarted = false;

      function closeVideoWidget() {
          if (widget) widget.style.display = 'none';
          if (trigger) trigger.style.display = 'flex';
          if (video) {
              video.pause();
              video.currentTime = 0;
          }
      }

      function openVideoWidget() {
          if (widget) widget.style.display = 'block';
          if (trigger) trigger.style.display = 'none';
          
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