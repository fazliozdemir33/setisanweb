@php $locale = app()->getLocale(); @endphp
<footer class="footer" role="contentinfo">
  <div class="container">
    <div class="footer__grid">

      <div>
        <div class="footer__brand-name">Setisan</div>
        <div class="footer__brand-sub">Elektromekanik</div>
        <p class="footer__desc">
          @if($locale === 'tr')
            Mekanik tesisat, HVAC, ısıtma-soğutma ve elektrik sistemlerinde kurumsal projeler için mühendislik ve uygulama çözümleri.
          @else
            Engineering and implementation solutions for institutional projects in mechanical installation, HVAC, heating-cooling, and electrical systems.
          @endif
        </p>
      </div>

      <div>
        <div class="footer__heading">{{ $locale === 'tr' ? 'Hizmetler' : 'Services' }}</div>
        <ul class="footer__links">
          @if($locale === 'tr')
            <li><a href="{{ url('tr/hizmetler/proje-tasarim-hizmetleri') }}">Proje & Tasarım Hizmetleri</a></li>
            <li><a href="{{ url('tr/hizmetler/mekanik-tesisat-uygulama') }}">Mekanik Tesisat ve Uygulama</a></li>
            <li><a href="{{ url('tr/hizmetler/elektrik-tesisat-uygulama') }}">Elektrik Tesisat ve Uygulama</a></li>
          @else
            <li><a href="{{ url('en/services/project-design-services') }}">Project & Design Services</a></li>
            <li><a href="{{ url('en/services/mechanical-installation-and-application-services') }}">Mechanical Installation</a></li>
            <li><a href="{{ url('en/services/electrical-installation-and-application-services') }}">Electrical Installation</a></li>
          @endif
        </ul>
      </div>

      <div>
        <div class="footer__heading">{{ $locale === 'tr' ? 'Kurumsal' : 'Company' }}</div>
        <ul class="footer__links">
          @if($locale === 'tr')
            <li><a href="{{ url('tr/hizmetler') }}">Hizmetler</a></li>
            <li><a href="{{ url('tr/projeler') }}">Projeler</a></li>
            <li><a href="{{ url('tr/hakkimizda') }}">Hakkımızda</a></li>
            <li><a href="{{ url('tr/blog') }}">Blog</a></li>
            <li><a href="{{ url('tr/iletisim') }}">İletişim</a></li>
            <li><a href="{{ url('tr/kvkk') }}">KVKK</a></li>
          @else
            <li><a href="{{ url('en/services') }}">Services</a></li>
            <li><a href="{{ url('en/projects') }}">Projects</a></li>
            <li><a href="{{ url('en/about') }}">About Us</a></li>
            <li><a href="{{ url('en/blog') }}">Blog</a></li>
            <li><a href="{{ url('en/contact') }}">Contact</a></li>
            <li><a href="{{ url('en/privacy-policy') }}">Privacy Policy</a></li>
          @endif
        </ul>
      </div>

      <div>
        <div class="footer__heading">{{ $locale === 'tr' ? 'İletişim' : 'Contact' }}</div>
        <ul class="footer__links" style="gap:.9rem">
          <li style="color:rgba(255,255,255,.55);font-size:.875rem;line-height:1.6">
            Çobançeşme Mah. Sanayi Cad. Nish İstanbul B Blok Rezidans No: 44 İç Kapı No: 60 Bahçelievler / İstanbul
          </li>
          <li>
            <a href="tel:+902126036518">0212 603 65 18</a>
          </li>
          <li>
            <a href="mailto:info@setisan.com">info@setisan.com</a>
          </li>
        </ul>
      </div>

    </div>

    <div class="footer__bottom">
      <p class="footer__copy">&copy; {{ date('Y') }} Setisan Elektromekanik. {{ $locale === 'tr' ? 'Tüm hakları saklıdır.' : 'All rights reserved.' }}</p>
      <div class="footer__copy">
        <a href="{{ url($locale === 'tr' ? 'tr/kvkk' : 'en/privacy-policy') }}" style="color:rgba(255,255,255,.3);transition:.3s" onmouseover="this.style.color='rgba(255,255,255,.7)'" onmouseout="this.style.color='rgba(255,255,255,.3)'">
          {{ $locale === 'tr' ? 'KVKK / Gizlilik' : 'Privacy Policy' }}
        </a>
      </div>
    </div>
  </div>
</footer>
