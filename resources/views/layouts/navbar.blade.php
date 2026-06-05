@php $locale = app()->getLocale(); @endphp
<nav class="navbar" role="navigation" aria-label="Ana navigasyon">
  <div class="container">
    <div class="navbar__inner">

      <a href="{{ url($locale) }}" class="navbar__logo" aria-label="Setisan Elektromekanik Ana Sayfa">
        <img src="{{ asset('images/logo.png') }}" alt="Setisan Elektromekanik" height="44" loading="eager" style="width: auto; object-fit: contain;">
      </a>

      <div class="navbar__nav" id="main-nav" role="menubar">
        @if($locale === 'tr')
          <a href="{{ url('tr/hizmetler') }}" class="navbar__link {{ request()->is('tr/hizmetler*') ? 'active' : '' }}" role="menuitem">Hizmetler</a>
          <a href="{{ url('tr/projeler') }}"  class="navbar__link {{ request()->is('tr/projeler*') ? 'active' : '' }}" role="menuitem">Projeler</a>
          <a href="{{ url('tr/hakkimizda') }}"class="navbar__link {{ request()->is('tr/hakkimizda*') ? 'active' : '' }}" role="menuitem">Hakkımızda</a>
        @else
          <a href="{{ url('en/services') }}"  class="navbar__link {{ request()->is('en/services*') ? 'active' : '' }}" role="menuitem">Services</a>
          <a href="{{ url('en/projects') }}"  class="navbar__link {{ request()->is('en/projects*') ? 'active' : '' }}" role="menuitem">Projects</a>
          <a href="{{ url('en/about') }}"     class="navbar__link {{ request()->is('en/about*') ? 'active' : '' }}" role="menuitem">About</a>
        @endif

        <div class="navbar__lang" aria-label="Dil seçimi">
          <a href="{{ url('tr/' . ltrim(request()->path(), 'tr/en/')) }}" class="{{ $locale === 'tr' ? 'active' : '' }}" hreflang="tr">TR</a>
          <span style="color:var(--border)">|</span>
          <a href="{{ url('en/' . ltrim(request()->path(), 'tr/en/')) }}" class="{{ $locale === 'en' ? 'active' : '' }}" hreflang="en">EN</a>
        </div>

        @if($locale === 'tr')
          <a href="{{ url('tr/iletisim') }}" class="btn-nav">İletişim</a>
        @else
          <a href="{{ url('en/contact') }}"  class="btn-nav">Contact</a>
        @endif
      </div>

      <button class="navbar__toggle" aria-label="Menüyü aç/kapat" aria-expanded="false" aria-controls="main-nav">
        <span></span><span></span><span></span>
      </button>

    </div>
  </div>
</nav>
