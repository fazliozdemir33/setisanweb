@extends('layouts.app')
@php $locale = app()->getLocale(); $isTr = $locale === 'tr'; @endphp

@section('meta_title', $isTr ? 'Hakkımızda — Setisan Elektromekanik' : 'About Us — Setisan Elektromekanik')
@section('meta_desc', $isTr ? 'Setisan Elektromekanik hakkında bilgi edinin. 15 yıllık deneyim, 200+ proje, kurumsal mühendislik anlayışı.' : 'Learn about Setisan Elektromekanik. 15 years of experience, 200+ projects, institutional engineering approach.')

@section('content')

<div class="page-header">
  <div class="container">

    <h1>{{ $isTr ? 'Hakkımızda' : 'About Us' }}</h1>
    <p>{{ \App\Models\Setting::get("page_hakkimizda_subtitle") ?: ($isTr ? 'Elektromekanik mühendislikte 30 yıllık köklü deneyim ve güven.' : '30 years of deep-rooted experience and trust in electromechanical engineering.') }}</p>
  </div>
</div>

<section class="section">
  <div class="container">
    <div class="grid-2" style="gap:clamp(3rem,6vw,8rem);align-items:center">
      <div>
        <div class="eyebrow reveal">{{ $isTr ? 'Biz Kimiz?' : 'Who We Are' }}</div>
        <h2 class="reveal reveal--delay-1">{!! nl2br(e(\App\Models\Setting::get("page_hakkimizda_main_title") ?: ($isTr ? "Sahada Güçlü,\nMühendislikte Disiplinli" : "Strong in the Field,\nDisciplined in Engineering"))) !!}</h2>
        <div class="reveal reveal--delay-2 prose" style="margin-top:1.5rem; color:var(--text-light); line-height:1.85;">
          @php
            $defaultTr = "2017 yılında yurt içinde alt elektromekanik projelerin hayata geçirilmesi üzere kurulan SETİSAN, aslında 30 yıllık bir tecrübeye sahiptir. Kaliteli ve zamanında iş üretmeyi misyon edinen şirketimiz; kendi ihtisas alanlarında üst düzey profesyonellerden oluşan kadrosuyla, müşterilerimize en yüksek katma değeri rekabetçi fiyatlarla sunmaktadır.\n\nProfesyonel iş yaklaşımımız; insana, topluma ve çevreye saygı, dürüstlük, verimlilik ve müşteri odaklı çalışma bilincine dayanmaktadır. Bu sayede SETİSAN, Türkiye’nin sürekli gelişen ve büyüyen firmaları arasındaki yerini her zaman korumaktadır.";
            
            $defaultEn = "Established in 2017 to realize electromechanical projects domestically, SETİSAN actually possesses 30 years of profound engineering experience. With a mission of producing high-quality work on time, our company offers the highest added value to our customers at competitive prices through our team of top-level professionals in their respective fields.\n\nOur professional approach is based on respect for people, society, and the environment, honesty, efficiency, and a customer-oriented mindset. Thanks to this, SETİSAN continues to maintain its position among Turkey's continuously developing and growing companies.";
            
            $content = \App\Models\Setting::get("page_hakkimizda_content");
            if(!$content) $content = $isTr ? $defaultTr : $defaultEn;
          @endphp
          {!! nl2br(e($content)) !!}
        </div>
      </div>
      <div class="reveal reveal--delay-1">
        <img src="{{ asset('images/extracted/stitched_page_10_01.jpg') }}" alt="{{ $isTr ? 'Setisan Elektromekanik' : 'Setisan Elektromekanik' }}" style="width:100%;border-radius:var(--radius);aspect-ratio:4/3;object-fit:cover" loading="lazy">
      </div>
    </div>
  </div>
</section>

<section class="section--dark" style="padding:clamp(4rem,8vw,8rem) 0">
  <div class="container">
    <div class="stats" style="border-color:rgba(255,255,255,.1)">
      @php
        $stats = [
          [
            \App\Models\Setting::get("page_hakkimizda_stat_1_val") ?: '30',
            \App\Models\Setting::get("page_hakkimizda_stat_1_label") ?: ($isTr ? 'Yıllık Deneyim' : 'Years of Experience')
          ],
          [
            \App\Models\Setting::get("page_hakkimizda_stat_2_val") ?: '200+',
            \App\Models\Setting::get("page_hakkimizda_stat_2_label") ?: ($isTr ? 'Tamamlanan Proje' : 'Completed Projects')
          ],
          [
            \App\Models\Setting::get("page_hakkimizda_stat_3_val") ?: '50+',
            \App\Models\Setting::get("page_hakkimizda_stat_3_label") ?: ($isTr ? 'Kurumsal Müşteri' : 'Corporate Clients')
          ],
          [
            \App\Models\Setting::get("page_hakkimizda_stat_4_val") ?: '100%',
            \App\Models\Setting::get("page_hakkimizda_stat_4_label") ?: ($isTr ? 'Zamanında Teslim' : 'On-Time Delivery')
          ]
        ];
      @endphp
      @foreach($stats as $s)
      <div class="stat">
        <div class="stat__number">{{ $s[0] }}</div>
        <div class="stat__label">{{ $s[1] }}</div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<section class="section section--surface">
  <div class="container">
    <div class="section-header section-header--center reveal">
      <div class="eyebrow">{{ $isTr ? 'Değerlerimiz' : 'Our Values' }}</div>
      <h2>{{ $isTr ? 'Çalışma Prensiblerimiz' : 'Our Working Principles' }}</h2>
    </div>
    <div class="grid-2">
      <div class="reveal" style="background:var(--white);padding:2.5rem;border-radius:var(--radius);border:1px solid var(--border)">
        <h3 style="font-size:1.5rem;margin-bottom:1rem;color:var(--accent)">{{ $isTr ? 'Misyonumuz' : 'Our Mission' }}</h3>
        <p>
          @php
            $defaultMissionTr = 'Güvenli, yüksek kaliteli ve uygun maliyetli Mekanik-Elektrik projeleri tasarlamak, inşa etmek ve tamamlamak; müşterilerimiz ile birlikte anlaştığımız iş programına uymak; tüm bunları gerçekleştirirken, SETİSAN çalışanlarının kariyer gelişimine yardımcı olmak.';
            $defaultMissionEn = 'To design, build, and complete safe, high-quality, and cost-effective Mechanical-Electrical projects; to adhere to the agreed-upon schedule with our clients; and while accomplishing all these, to help the career development of SETİSAN employees.';
            $mission = \App\Models\Setting::get("page_hakkimizda_mission");
            if(!$mission) $mission = $isTr ? $defaultMissionTr : $defaultMissionEn;
          @endphp
          {!! nl2br(e($mission)) !!}
        </p>
      </div>
      <div class="reveal reveal-delay-1" style="background:var(--white);padding:2.5rem;border-radius:var(--radius);border:1px solid var(--border)">
        <h3 style="font-size:1.5rem;margin-bottom:1rem;color:var(--accent)">{{ $isTr ? 'Vizyonumuz' : 'Our Vision' }}</h3>
        <p>
          @php
            $defaultVisionTr = 'Dünya genelinde hizmet veren mühendislik ve inşaat firmaları arasında en iyi ve yenilikçi firmalardan biri olmak. Kalite, dakiklik ve çalışanlarımızın motivasyonunun sağlanmasını tüm iş süreçlerimizin temelinde tutmak.';
            $defaultVisionEn = 'To become one of the best and most innovative engineering and construction firms operating worldwide. To keep quality, punctuality, and employee motivation at the core of all our business processes.';
            $vision = \App\Models\Setting::get("page_hakkimizda_vision");
            if(!$vision) $vision = $isTr ? $defaultVisionTr : $defaultVisionEn;
          @endphp
          {!! nl2br(e($vision)) !!}
        </p>
      </div>
    </div>
  </div>
</section>

<section class="section" style="background: var(--surface);">
  <div class="container">
    <div class="section-header section-header--center reveal">
      <div class="eyebrow">{{ $isTr ? 'Kalite & Güvence' : 'Quality & Assurance' }}</div>
      <h2>{{ $isTr ? 'Sertifikalar ve Yetki Belgeleri' : 'Certificates & Authorizations' }}</h2>
    </div>
    
    <div class="grid-3 reveal reveal-delay-1" style="gap: 2rem; display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));">
      @php
        $certsSetting = \App\Models\Setting::get("page_hakkimizda_certificates");
        $certs = $certsSetting ? json_decode($certsSetting, true) : [];
      @endphp
      
      @forelse($certs as $cert)
      <a href="{{ Storage::url($cert['image']) }}" target="_blank" class="cert-card">
        <div class="cert-card__img-wrapper">
          @if(in_array(pathinfo($cert['image'], PATHINFO_EXTENSION), ['jpg','jpeg','png','webp','gif']))
            <img src="{{ Storage::url($cert['image']) }}" alt="{{ $isTr ? $cert['title_tr'] : $cert['title_en'] }}" class="cert-card__img">
          @else
            <div class="cert-card__icon"><svg width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg></div>
          @endif
        </div>
        <div class="cert-card__content">
          <h4>{{ $isTr ? $cert['title_tr'] : $cert['title_en'] }}</h4>
          @if(($isTr ? $cert['desc_tr'] : $cert['desc_en']))
            <p>{{ $isTr ? $cert['desc_tr'] : $cert['desc_en'] }}</p>
          @endif
        </div>
      </a>
      @empty
        <div style="grid-column: 1 / -1; text-align: center; color: var(--muted); padding: 2rem;">
          {{ $isTr ? 'Henüz sertifika eklenmemiş.' : 'No certificates added yet.' }}
        </div>
      @endforelse
    </div>
  </div>
</section>

<style>
.cert-card {
  display: flex;
  flex-direction: column;
  background: var(--white);
  border: 1px solid var(--border);
  border-radius: var(--radius);
  overflow: hidden;
  text-decoration: none;
  color: var(--dark);
  transition: all 0.3s ease;
  height: 100%;
}
.cert-card:hover {
  transform: translateY(-5px);
  border-color: var(--accent);
  box-shadow: 0 10px 30px rgba(0,0,0,0.05);
}
.cert-card__icon {
  width: 48px;
  height: 48px;
  background: rgba(212, 98, 26, 0.1);
  color: var(--accent);
  border-radius: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 2rem auto;
}
.cert-card__img-wrapper {
  display: block;
  width: 100%;
  border-bottom: 1px solid var(--border);
  background: var(--surface);
}
.cert-card__img {
  width: 100%;
  height: auto;
  display: block;
}
.cert-card__content {
  flex: 1;
  padding: 2rem;
}
.cert-card__content h4 {
  font-size: 1.1rem;
  font-weight: 700;
  margin-bottom: 0.5rem;
  color: var(--primary);
}
.cert-card__content p {
  font-size: 0.9rem;
  color: var(--muted);
  line-height: 1.6;
}
</style>

<section class="cta-banner">
  <div class="container">
    <h2>{{ \App\Models\Setting::get("page_hakkimizda_cta_title") ?: ($isTr ? 'Projeniz için görüşelim' : "Let's discuss your project") }}</h2>
    <p>{{ \App\Models\Setting::get("page_hakkimizda_cta_desc") ?: ($isTr ? 'Teknik ekibimiz ihtiyaçlarınızı değerlendirerek size özel çözüm sunar.' : 'Our technical team evaluates your needs and offers you a tailored solution.') }}</p>
    <a href="{{ url($isTr ? 'tr/iletisim' : 'en/contact') }}" class="btn btn--outline">{{ $isTr ? 'İletişime Geçin' : 'Contact Us' }} →</a>
  </div>
</section>

@endsection
