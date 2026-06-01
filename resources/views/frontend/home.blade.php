@extends('layouts.app')

@php
  $locale = app()->getLocale();
  $isTr = $locale === 'tr';
@endphp

@section('meta_title', $isTr
  ? 'Setisan Elektromekanik — Mekanik Tesisat, HVAC ve Elektrik Sistemleri'
  : 'Setisan Elektromekanik — Mechanical Installation, HVAC & Electrical Systems')

@section('meta_desc', $isTr
  ? 'Setisan Elektromekanik; mekanik tesisat, HVAC, ısıtma-soğutma ve elektrik sistemlerinde kurumsal projeler için uçtan uca mühendislik ve uygulama çözümleri sunar.'
  : 'Setisan Elektromekanik provides end-to-end engineering solutions for institutional projects in mechanical installation, HVAC, heating-cooling, and electrical systems.')

@section('content')

  <style>
    .hero-ref-badge {
      position: absolute;
      bottom: 4.8rem;
      left: 4rem;
      z-index: 10;
      display: flex;
      align-items: center;
      gap: 0.4rem;
      background: rgba(17, 17, 17, 0.6);
      backdrop-filter: blur(8px);
      -webkit-backdrop-filter: blur(8px);
      padding: 0.35rem 0.8rem;
      border-radius: 50px;
      border: 1px solid rgba(255, 255, 255, 0.1);
      pointer-events: none;
      transition: all 0.3s ease;
      animation: fadeInUp 1s ease both 1.5s;
    }

    .ref-badge-dot {
      display: inline-block;
      width: 5px;
      height: 5px;
      background: var(--accent);
      border-radius: 50%;
      flex-shrink: 0;
      box-shadow: 0 0 6px var(--accent);
      animation: badgePulse 2s infinite;
    }

    .ref-badge-text {
      font-size: 0.62rem;
      font-weight: 600;
      letter-spacing: 0.06em;
      color: rgba(255, 255, 255, 0.85);
      text-transform: uppercase;
      white-space: nowrap;
    }

    @keyframes badgePulse {
      0% {
        transform: scale(0.95);
        box-shadow: 0 0 0 0 rgba(23, 97, 155, 0.7);
      }
      70% {
        transform: scale(1);
        box-shadow: 0 0 0 6px rgba(23, 97, 155, 0);
      }
      100% {
        transform: scale(0.95);
        box-shadow: 0 0 0 0 rgba(23, 97, 155, 0);
      }
    }

    @media (max-width: 991px) {
      .hero-ref-badge {
        left: 2rem;
        bottom: 5rem;
      }
    }

    @media (max-width: 576px) {
      .hero-ref-badge {
        left: 1rem;
        bottom: 5rem;
        padding: 0.3rem 0.6rem;
        max-width: calc(100% - 2rem);
      }
      .ref-badge-text {
        font-size: 0.54rem;
        letter-spacing: 0.04em;
        white-space: normal;
        line-height: 1.3;
      }
    }

    .stat-card {
      transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1) !important;
    }
    .stat-card:hover {
      transform: translateY(-5px);
      background: rgba(255, 255, 255, 0.08) !important;
      border-color: var(--accent) !important;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }
    .stat-card:hover .stat-label {
      color: var(--accent) !important;
    }
  </style>

  <section class="hero-full">
    <div class="hero-full__bg">
      <img src="{{ asset('images/bridge_hero.jpg') }}" alt="1915 Çanakkale Köprüsü - Setisan Elektromekanik" loading="eager"
        fetchpriority="high" class="parallax-img">
    </div>
    <div class="hero-full__overlay"></div>

    <div class="hero-ref-badge">
      <span class="ref-badge-dot"></span>
      <span class="ref-badge-text">
        {{ $isTr ? 'Referans Projemiz: 1915 Çanakkale Köprüsü – Elektrik & Mekanik İşleri' : 'Reference Project: 1915 Çanakkale Bridge – Electrical & Mechanical Works' }}
      </span>
    </div>

    <div class="container hero-full__content">
      <div style="max-width: 900px;" class="reveal reveal-delay-1">
        <div class="hero-subtitle">
          {{ $isTr ? 'Güçlü Altyapılar, Güvenilir Sistemler' : 'Strong Infrastructures, Reliable Systems' }}
        </div>
        <h1 class="hero-title">
          <span>{{ $isTr ? 'Projelerinize Değer Katan' : 'Engineering That Adds' }}</span><br>
          <span>{{ $isTr ? 'Mühendislik' : 'Value To Your Projects' }}</span>
        </h1>

        <div style="display: flex; gap: 1.25rem; flex-wrap: wrap; margin-top: 2.5rem;">
          <a href="#iletisim" class="btn-glass" style="background: var(--accent); border-color: var(--accent); color: #ffffff;">
            {{ $isTr ? 'Bize Ulaşın' : 'Contact Us' }}
          </a>
          <a href="{{ url($isTr ? 'tr/projeler' : 'en/projects') }}" class="btn-glass">
            {{ $isTr ? 'Projelerimizi İnceleyin' : 'View Our Projects' }}
          </a>
        </div>
      </div>
    </div>

    <div class="hero-full__bottom-slant">
      <div class="hero-full__slant-text">
        <span id="tw-text"
          data-text="{{ $isTr ? 'Elektromekanik Sistemlerde Entegre Mühendislik Çözümleri' : 'Integrated Engineering Solutions in Electromechanical Systems' }}"></span><span
          class="typewriter-cursor">|</span>
      </div>
    </div>
  </section>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const twEl = document.getElementById('tw-text');
      if (!twEl) return;

      const text = twEl.getAttribute('data-text');
      twEl.innerText = '';

      let i = 0;
      setTimeout(() => {
        function typeWriter() {
          if (i < text.length) {
            twEl.innerHTML += text.charAt(i);
            i++;
            setTimeout(typeWriter, 40);
          } else {
          }
        }
        typeWriter();
      }, 2000);
    });
  </script>

  <hr class="divider">

  <section class="section">
    <div class="container">
      <div style="max-width: 1100px;">
        <h2 class="reveal" style="font-size: var(--h1); line-height: 1.1; margin-bottom: 4rem;">
          {{ $isTr ? 'Altyapının görünmeyen gücünü tasarlıyoruz' : 'We design the invisible power of infrastructure' }}
        </h2>

        <div class="grid-strict grid-strict--2 reveal reveal-delay-1">
          <div>
            <span class="label">{{ $isTr ? 'Tarihçe ve Vizyonumuz' : 'History & Our Vision' }}</span>
            <p>
              {{ $isTr ? '2017 yılında elektromekanik projeleri hayata geçirmek üzere kurulan SETİSAN\'ın arkasında, aslında 30 yıllık köklü bir tecrübe ve mühendislik birikimi yer almaktadır. Sektördeki başarının tesadüf olmadığı inancıyla; teknolojik gelişmeleri yakından takip ederek, kendi ihtisas alanlarında üst düzey profesyonellerden oluşan kadromuzla müşterilerimize en yüksek katma değerli ve rekabetçi çözümleri sunuyoruz. Vizyonumuz; dünya genelinde hizmet veren mühendislik ve inşaat firmaları arasında en iyi, en yenilikçi ve en güvenilir elektromekanik çözüm ortaklarından biri olmaktır.' : 'Founded in 2017 to bring key electromechanical projects to life, SETİSAN is backed by over 30 years of deep industry experience and engineering expertise. Believing that success in the sector is never a coincidence, we closely track technological developments to deliver high-value-added, competitive solutions through our elite team of senior professionals. Our vision is to be recognized globally as one of the best, most innovative, and reliable electromechanical partners in the industry.' }}
            </p>
            <a href="{{ url($isTr ? 'tr/hakkimizda' : 'en/about') }}" class="link-arrow" style="margin-top: 2rem; display: inline-flex; align-items: center;">
              {{ $isTr ? 'Kurumsal Detayları İnceleyin' : 'Explore Corporate Details' }} &rarr;
            </a>
          </div>
          <div>
            <span class="label">{{ $isTr ? 'Misyonumuz ve Değerlerimiz' : 'Our Mission & Values' }}</span>
            <p>
              {{ $isTr ? 'Güvenli, yüksek kaliteli, enerji verimliliği odaklı ve uygun maliyetli mekanik-elektrik projeleri tasarlayıp eksiksiz olarak tamamlamak; iş ortaklarımızla anlaştığımız takvime ve kaliteli-zamanında iş üretme sözümüze her koşulda sadık kalmaktır. Bu süreçleri yönetirken, insana, topluma ve çevreye saygı, dürüstlük ve verimlilik ilkelerinden asla taviz vermiyor, ekibimizin mesleki ve kariyer gelişimini en üst düzeyde destekliyoruz.' : 'To design, build, and deliver safe, high-quality, energy-efficient, and cost-effective mechanical and electrical projects while strictly adhering to agreed schedules and our core promise of quality, on-time delivery. Throughout these processes, we never compromise on our fundamental values of honesty, efficiency, and respect for humanity, society, and the environment, while fully supporting the career development of SETİSAN professionals.' }}
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  @if(count($stats) > 0)
  <hr class="divider">
  <section class="section" style="background: var(--dark); color: var(--white); padding: 5rem 0;">
    <div class="container">
      <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:1.5rem;" class="reveal">
        @foreach(array_slice($stats, 0, 3) as $stat)
          @php
            $statText = strtoupper($isTr ? $stat['label_tr'] : $stat['label_en']);
            $targetUrl = url($isTr ? 'tr/projeler' : 'en/projects');

            if (str_contains($statText, 'TECRÜBE') || str_contains($statText, 'YIL') || str_contains($statText, 'ABOUT') || str_contains($statText, 'EXPERIENCE')) {
                $targetUrl = url($isTr ? 'tr/hakkimizda' : 'en/about');
            } elseif (str_contains($statText, 'HİZMET') || str_contains($statText, 'SERVICE') || str_contains($statText, 'ALAN')) {
                $targetUrl = url($isTr ? 'tr/hizmetler' : 'en/services');
            }
          @endphp
          <a href="{{ $targetUrl }}" class="stat-card"
            style="display:block;padding:2.5rem 1.5rem;background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.1);border-radius:12px;text-align:center;text-decoration:none;">
            <div style="font-size:3.5rem;font-weight:700;color:var(--white);margin-bottom:0.5rem;line-height:1;">
              {{ $isTr ? $stat['number_tr'] : $stat['number_en'] }}
            </div>
            <div class="stat-label"
              style="font-size:0.95rem;font-weight:700;text-transform:uppercase;letter-spacing:0.08em;color:rgba(255,255,255,0.95);transition:color 0.3s ease;">
              {{ $isTr ? $stat['label_tr'] : $stat['label_en'] }}
            </div>
          </a>
        @endforeach
      </div>
    </div>
  </section>
  @endif


  <hr class="divider">

  <section class="section" style="background: var(--surface);">
    <div class="container">
      <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 2rem;">
        <h2 class="reveal" style="font-size: var(--h1);">
          {{ $isTr ? 'Uzmanlık Alanlarımız' : 'Our Expertise' }}
        </h2>
      </div>

      <div class="services-carousel" id="services-grid">
        @foreach($services as $i => $service)
          <div class="service-card reveal">
            <div class="service-card__img-wrapper">
              <img src="{{ $service->cover_image ? asset('storage/' . $service->cover_image) : asset('images/extracted/stitched_hvac.jpg') }}" alt="{{ $service->title }}">
            </div>
            <div class="service-card__left">
              <div class="service-card__num">0{{ $i + 1 }}</div>
              <h3 class="service-card__title">{{ $service->title }}</h3>
              <p class="service-card__desc">{{ $service->excerpt ?? ($isTr ? 'Projenizin ihtiyaçlarına özel tasarlanmış, uluslararası standartlara uygun çözümler.' : 'Customized solutions meeting international standards for your project.') }}</p>
              <a href="{{ url(($isTr ? 'tr/hizmetler' : 'en/services') . '/' . $service->slug) }}"
                class="btn-glass--dark" style="margin-top: auto; padding: 0.8rem 1.5rem;">
                {{ $isTr ? 'Daha Fazla' : 'Learn More' }}
              </a>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <hr class="divider">

  <section class="section projeler-interactive">

    <div class="container" style="position: relative; z-index: 2;">
      <div class="projeler-grid">
        <div class="projeler-left reveal">
                    <div class="projeler-categories d-none d-lg-flex">
            <a href="javascript:void(0)" class="cat-link active" data-filter="all">{{ $isTr ? 'Tümü' : 'All' }}</a>
            @foreach($projectSectors as $sector)
              <a href="javascript:void(0)" class="cat-link" data-filter="{{ $sector->id }}">{{ $sector->name }}</a>
            @endforeach
          </div>

                    <div class="projeler-categories-mobile d-block d-lg-none" style="margin-bottom: 2rem;">
            <select class="cat-select" style="width:100%; padding: 1rem; border-radius: 8px; background: rgba(255,255,255,0.05); color: var(--white); border: 1px solid rgba(255,255,255,0.2); font-size: 1rem; outline: none; appearance: none; background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23FFFFFF%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E'); background-repeat: no-repeat; background-position: right 1rem top 50%; background-size: 0.8rem auto;">
              <option value="all" style="background:var(--dark)">{{ $isTr ? 'Tümü (Tüm Projeler)' : 'All Projects' }}</option>
              @foreach($projectSectors as $sector)
                <option value="{{ $sector->id }}" style="background:var(--dark)">{{ $sector->name }}</option>
              @endforeach
            </select>
          </div>

          <ul class="projeler-list">
            @foreach($featuredProjects as $project)
              <li class="projeler-item" data-category="{{ $project->sector_id }}" data-image="{{ $project->cover_image ? asset('storage/' . $project->cover_image) : asset('images/extracted/stitched_page_19.jpg') }}">
                <a href="{{ url(($isTr ? 'tr/projeler' : 'en/projects') . '/' . $project->slug) }}">
                  <img src="{{ $project->cover_image ? asset('storage/' . $project->cover_image) : asset('images/extracted/stitched_page_19.jpg') }}" class="projeler-img-mobile" alt="{{ $project->title }}">
                  <div class="projeler-item-text">
                    <span class="num">0{{ $loop->iteration }}</span>
                    <span class="name">{{ $project->title }}</span>
                  </div>
                </a>
              </li>
            @endforeach
          </ul>

          <a href="{{ url($isTr ? 'tr/projeler' : 'en/projects') }}" class="btn-glass" style="margin-top: 3rem; width: fit-content;">
            {{ $isTr ? 'Tüm Projeleri Görüntüle' : 'View All Projects' }} &rarr;
          </a>
        </div>

        <div class="projeler-right reveal reveal-delay-1">
          <img id="projeler-preview-img" src="{{ asset('images/extracted/stitched_page_19.jpg') }}" alt="Project Preview">
        </div>
      </div>
    </div>
  </section>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const items = document.querySelectorAll('.projeler-item');
      const previewImg = document.getElementById('projeler-preview-img');
      const catLinks = document.querySelectorAll('.cat-link');

      function activateFirstVisible() {
        if (!previewImg) return;
        const visibleItems = Array.from(items).filter(item => item.style.display !== 'none');
        if (visibleItems.length > 0) {
          items.forEach(i => i.classList.remove('active'));
          visibleItems[0].classList.add('active');
          const newSrc = visibleItems[0].getAttribute('data-image');
          if(previewImg.src !== newSrc) {
            previewImg.style.opacity = 0;
            setTimeout(() => {
              previewImg.src = newSrc;
              previewImg.style.opacity = 1;
            }, 300);
          }
        }
      }

      if(items.length > 0 && previewImg) {
        activateFirstVisible();

        items.forEach(item => {
          item.addEventListener('mouseenter', () => {
            if (item.style.display === 'none') return;
            items.forEach(i => i.classList.remove('active'));
            item.classList.add('active');
            const newSrc = item.getAttribute('data-image');
            if(previewImg.src !== newSrc) {
              previewImg.style.opacity = 0;
              setTimeout(() => {
                previewImg.src = newSrc;
                previewImg.style.opacity = 1;
              }, 300);
            }
          });
        });
      }

      function applyFilter(filter) {
        let visibleCount = 0;
        items.forEach(item => {
          if (filter === 'all' || item.getAttribute('data-category') === filter) {
            item.style.display = ''; 
            visibleCount++;
          } else {
            item.style.display = 'none';
          }
        });
        
        if(visibleCount > 0) {
          activateFirstVisible();
        }
      }

      catLinks.forEach(link => {
        link.addEventListener('click', (e) => {
          e.preventDefault();
          catLinks.forEach(l => l.classList.remove('active'));
          link.classList.add('active');
          
          const filter = link.getAttribute('data-filter');

          const select = document.querySelector('.cat-select');
          if (select) select.value = filter;

          applyFilter(filter);
        });
      });

      const catSelect = document.querySelector('.cat-select');
      if (catSelect) {
        catSelect.addEventListener('change', (e) => {
          const filter = e.target.value;

          catLinks.forEach(l => {
            l.classList.toggle('active', l.getAttribute('data-filter') === filter);
          });

          applyFilter(filter);
        });
      }
    });
  </script>


  @php
  $homeClients = [
    'İstanbul Aydın Üni.', 'İSÜ', 'Dorak Holding', 'Medical Park', 'Vatan Bilgisayar',
    'Media Markt', 'HSBC', 'Şekerbank', 'Massimo Dutti', 'ING Bank', 'Deutsche Bank'
  ];
  @endphp
  <section class="home-refs-strip">
    <div class="container">

      {{-- ── Referanslarımız ── --}}
      <div style="margin-top: 4rem;">
        <h3 style="font-size: 1.5rem; color: var(--primary); margin-bottom: 1.5rem;">{{ $isTr ? 'Referanslarımız' : 'Our References' }}</h3>
        <div class="ref-marquee-wrap" style="padding: 1rem 0; overflow: hidden;">
          <div class="ref-marquee-track ref-marquee-track--left" style="display: flex; gap: 4rem; align-items: center; width: max-content;">
            @if($partners->count() > 0)
              @php $repeatCount = max(3, ceil(15 / $partners->count())); @endphp
              @for ($i = 0; $i < $repeatCount; $i++)
                @foreach($partners as $partner)
                  <img src="{{ asset($partner->logo) }}" alt="{{ $partner->name ?? 'Solution Partner' }}"
                    style="height: 65px; width: auto; object-fit: contain; flex-shrink: 0; filter: grayscale(100%); opacity: 0.6; transition: 0.4s ease;"
                    onmouseover="this.style.filter='none'; this.style.opacity='1'"
                    onmouseout="this.style.filter='grayscale(100%)'; this.style.opacity='0.6'">
                @endforeach
              @endfor
            @endif
          </div>
        </div>
      </div>

      {{-- ── Çözüm Ortaklarımız (Ekipman Markaları) ── --}}
      @if($solutionPartners->count() > 0)
      <div style="margin-top: 3.5rem; padding-top: 3rem; border-top: 1px solid var(--border);">
        <h3 style="font-size: 1.5rem; color: var(--primary); margin-bottom: 1.5rem;">
          {{ $isTr ? 'Çözüm Ortaklarımız' : 'Our Solution Partners' }}
        </h3>

        {{-- Infinite marquee — pure CSS. Repeat must be EVEN so -50% loops seamlessly --}}
        <div class="sp-marquee-outer">
          <div class="sp-marquee-track">
            @php $spRepeat = 2; @endphp
            @for($r = 0; $r < $spRepeat; $r++)
              @foreach($solutionPartners as $sp)
                <div class="sp-logo-item">
                  @if($sp->logo)
                    <img src="{{ asset('storage/' . $sp->logo) }}" alt="{{ $sp->name }}"
                      title="{{ $sp->name }}"
                      @if($sp->website) onclick="window.open('{{ $sp->website }}','_blank')" style="cursor:pointer" @endif>
                  @else
                    <span class="sp-logo-text">{{ $sp->name }}</span>
                  @endif
                </div>
              @endforeach
            @endfor
          </div>
        </div>
      </div>
      @endif

    </div>
  </section>

  <style>
    /* ── Çözüm Ortakları infinite marquee ── */
    .sp-marquee-outer {
      overflow: hidden;
      -webkit-mask-image: linear-gradient(to right, transparent 0%, black 8%, black 92%, transparent 100%);
      mask-image: linear-gradient(to right, transparent 0%, black 8%, black 92%, transparent 100%);
      padding: .5rem 0;
    }
    .sp-marquee-track {
      display: flex;
      align-items: center;
      gap: 3rem;
      width: max-content;
      animation: spScroll 80s linear infinite;
    }
    .sp-marquee-outer:hover .sp-marquee-track { animation-play-state: paused; }

    @keyframes spScroll {
      from { transform: translateX(0); }
      to   { transform: translateX(-50%); }
    }

    .sp-logo-item {
      flex: 0 0 auto;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 56px;
      padding: 0 .5rem;
    }
    .sp-logo-item img {
      height: 48px;
      max-width: 130px;
      object-fit: contain;
      filter: grayscale(100%);
      opacity: .55;
      transition: filter .35s, opacity .35s, transform .25s;
    }
    .sp-logo-item img:hover {
      filter: none;
      opacity: 1;
      transform: scale(1.08);
    }
    .sp-logo-text {
      font-size: .85rem;
      font-weight: 700;
      color: var(--muted);
      white-space: nowrap;
      letter-spacing: .04em;
      text-transform: uppercase;
    }
  </style>

@endsection