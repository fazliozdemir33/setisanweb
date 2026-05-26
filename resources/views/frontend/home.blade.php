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

  <section class="hero-full">
    <div class="hero-full__bg">
      <img src="{{ asset('images/bridge_hero.jpg') }}" alt="1915 Çanakkale Köprüsü - Setisan Elektromekanik" loading="eager"
        fetchpriority="high" class="parallax-img">
    </div>
    <div class="hero-full__overlay"></div>

    <div class="container hero-full__content">
      <div style="max-width: 900px;" class="reveal reveal-delay-1">
        <div class="hero-subtitle">
          {{ $isTr ? 'Güçlü Altyapılar, Güvenilir Sistemler' : 'Strong Infrastructures, Reliable Systems' }}
        </div>
        <h1 class="hero-title">
          <span>{{ $isTr ? 'Projelerinize Değer Katan' : 'Engineering That Adds' }}</span><br>
          <span>{{ $isTr ? 'Mühendislik' : 'Value To Your Projects' }}</span>
        </h1>

        <a href="#iletisim" class="btn-glass">
          {{ $isTr ? 'Bize Ulaşın' : 'Contact Us' }}
        </a>
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
            <span class="label">{{ $isTr ? 'Mühendislik Vizyonu' : 'Engineering Vision' }}</span>
            <p>
              {{ $isTr ? 'Setisan Elektromekanik olarak; mekanik tesisat, elektrik altyapısı ve HVAC sistemlerinde projeye özel, uygulanabilir ve sürdürülebilir çözümler geliştiriyoruz. Tasarım aşamasından saha uygulamasına kadar tüm süreçleri disiplinli bir mühendislik yaklaşımıyla yöneterek, enerji verimliliği yüksek ve uzun ömürlü sistemler kuruyoruz.' : 'As Setisan Electromechanical; we develop project-specific, applicable, and sustainable solutions in mechanical installation, electrical infrastructure, and HVAC systems. By managing all processes from the design stage to field application with a disciplined engineering approach, we build highly energy-efficient and long-lasting systems.' }}
            </p>
            <a href="#" class="link-arrow" style="margin-top: 2rem;">
              {{ $isTr ? 'Hizmetlerimizi İnceleyin' : 'Explore Our Services' }} &rarr;
            </a>
          </div>
          <div>
            <span class="label">{{ $isTr ? 'Sürdürülebilir Altyapı' : 'Sustainable Infrastructure' }}</span>
            <p>
              {{ $isTr ? 'Farklı ölçek ve ihtiyaçlara sahip projelerde, uluslararası standartlara tam uyumlu sistemler kuruyoruz. Veri merkezlerinden sağlık yapıları ve sanayi tesislerine kadar her projede; dayanıklılık, süreklilik ve işletme verimliliğini ön planda tutuyoruz.' : 'In projects of various scales and needs, we build systems fully compliant with international standards. In every project, from data centers to healthcare facilities and industrial plants, we prioritize durability, continuity, and operational efficiency.' }}
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
      <div class="grid-strict grid-strict--4 reveal">
        @foreach($stats as $stat)
          <div style="padding: 2rem 1rem; background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.1); border-radius: 12px; text-align: center; transition: transform 0.3s ease;">
            <div style="font-size: 3.5rem; font-weight: 700; color: var(--white); margin-bottom: 0.5rem; line-height: 1;">{{ $isTr ? $stat['number_tr'] : $stat['number_en'] }}</div>
            <div style="font-size: 0.85rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; opacity: 0.7; color: var(--white);">{{ $isTr ? $stat['label_tr'] : $stat['label_en'] }}</div>
          </div>
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
    <div class="projeler-stroke-text">
      {{ $isTr ? 'PROJELERİMİZ' : 'OUR PROJECTS' }}
    </div>

    <div class="container" style="position: relative; z-index: 2;">
      <div class="projeler-grid">
        <div class="projeler-left reveal">
                    <div class="projeler-categories d-none d-lg-flex">
            <a href="javascript:void(0)" class="cat-link active" data-filter="all">{{ $isTr ? 'Tümü' : 'All' }}</a>
            @foreach($services as $service)
              <a href="javascript:void(0)" class="cat-link" data-filter="{{ $service->id }}">{{ $service->title }}</a>
            @endforeach
          </div>

                    <div class="projeler-categories-mobile d-block d-lg-none" style="margin-bottom: 2rem;">
            <select class="cat-select" style="width:100%; padding: 1rem; border-radius: 8px; background: rgba(255,255,255,0.05); color: var(--white); border: 1px solid rgba(255,255,255,0.2); font-size: 1rem; outline: none; appearance: none; background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23FFFFFF%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E'); background-repeat: no-repeat; background-position: right 1rem top 50%; background-size: 0.8rem auto;">
              <option value="all" style="background:var(--dark)">{{ $isTr ? 'Tümü (Tüm Projeler)' : 'All Projects' }}</option>
              @foreach($services as $service)
                <option value="{{ $service->id }}" style="background:var(--dark)">{{ $service->title }}</option>
              @endforeach
            </select>
          </div>

          <ul class="projeler-list">
            @foreach($featuredProjects as $project)
              <li class="projeler-item" data-category="{{ $project->service_id }}" data-image="{{ $project->cover_image ? asset('storage/' . $project->cover_image) : asset('images/extracted/stitched_page_19.jpg') }}">
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
  $homePartners = [
    'Wilo', 'Grundfos', 'Vaillant', 'Siemens', 'Daikin', 'Schneider Electric',
    'Reflex', 'Victaulic', 'Arçelik', 'DemirDöküm', 'ECA', 'Fırat'
  ];
  @endphp
  <section class="home-refs-strip">
    <div class="container">

        <div style="margin-top: 4rem;">
      <h3 style="font-size: 1.5rem; color: var(--primary); margin-bottom: 1.5rem;">{{ $isTr ? 'Referanslarımız' : 'Our References' }}</h3>
      <div class="ref-marquee-wrap" style="padding: 1rem 0; overflow: hidden;">
        <div class="ref-marquee-track ref-marquee-track--left" style="display: flex; gap: 4rem; align-items: center; width: max-content;">
          @if($partners->count() > 0)
            @php

              $repeatCount = max(3, ceil(15 / $partners->count()));
            @endphp
            @for ($i = 0; $i < $repeatCount; $i++)
              @foreach($partners as $partner)
                <img src="{{ asset($partner->logo) }}" alt="{{ $partner->name ?? 'Solution Partner' }}" style="height: 65px; width: auto; object-fit: contain; flex-shrink: 0; filter: grayscale(100%); opacity: 0.6; transition: 0.4s ease;" onmouseover="this.style.filter='none'; this.style.opacity='1'" onmouseout="this.style.filter='grayscale(100%)'; this.style.opacity='0.6'">
              @endforeach
            @endfor
          @endif
        </div>
      </div>
    </div>
  </section>



@endsection