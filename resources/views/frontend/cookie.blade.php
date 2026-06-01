@extends('layouts.app')
@php $locale = app()->getLocale(); $isTr = $locale === 'tr'; @endphp

@section('meta_title', $isTr ? 'Çerez Politikası — Setisan Elektromekanik' : 'Cookie Policy — Setisan Elektromekanik')
@section('meta_desc', $isTr ? 'İnternet sitemizde kullanılan çerezler ve yönetim yöntemleri hakkında bilgi edinin.' : 'Learn about the cookies used on our website and how to manage them.')

@section('content')
<div class="page-header">
  <div class="container">
    <h1 style="font-size: 2.5rem; font-weight: 700; margin-bottom: 1rem; color: var(--white);">
      {{ $isTr ? 'Çerez Politikası' : 'Cookie Policy' }}
    </h1>
    <p style="color: rgba(255,255,255,0.7); max-width: 600px; margin: 0 auto; font-size: 1.1rem; line-height: 1.6;">
      {{ $isTr ? 'Sitemizdeki kullanıcı deneyiminizi geliştirmek amacıyla çerezler kullanmaktayız.' : 'We use cookies to improve your user experience on our website.' }}
    </p>
  </div>
</div>

<section class="section" style="padding: 5rem 0; background: var(--bg);">
  <div class="container" style="max-width: 900px;">
    <div style="line-height: 1.9; color: #333333; font-size: 1rem;">
      
      <p style="margin-bottom: 2.5rem; font-style: italic; color: #777777;">
        {{ $isTr ? 'Son Güncelleme Tarihi: Mayıs 2026' : 'Last Updated: May 2026' }}
      </p>

      <h2 style="font-size: 1.4rem; font-weight: 600; margin: 2rem 0 1rem; color: #111111; border-bottom: 1px solid rgba(0,0,0,0.1); padding-bottom: 0.5rem;">
        {{ $isTr ? '1. Genel Bilgilendirme' : '1. General Information' }}
      </h2>
      <p style="margin-bottom: 1rem;">
        {{ $isTr 
          ? 'SETİSAN ISITMA SOĞUTMA KLİMA VE ELEKTRİK SANAYİ TİCARET LİMİTED ŞİRKETİ (“SETİSAN”), internet sitesini ziyaret eden kullanıcıların deneyimini geliştirmek, site performansını artırmak ve dijital hizmetlerin güvenliğini sağlamak amacıyla çerezler (“cookies”) ve benzeri teknolojiler kullanmaktadır.' 
          : 'SETİSAN ISITMA SOĞUTMA KLİMA VE ELEKTRİK SANAYİ TİCARET LİMİTED ŞİRKETİ (“SETİSAN”), uses cookies (“cookies”) and similar technologies to improve the experience of users visiting the website, increase site performance, and ensure the security of digital services.' 
        }}
      </p>
      <p style="margin-bottom: 1.5rem;">
        {{ $isTr 
          ? 'Bu Çerez Politikası, SETİSAN Resmî Web Sitesi üzerinde kullanılan çerez türlerini, kullanım amaçlarını ve kullanıcıların çerez tercihlerini nasıl yönetebileceğini açıklamaktadır.' 
          : 'This Cookie Policy explains the types of cookies used on the SETİSAN Official Website, their purposes of use, and how users can manage their cookie preferences.' 
        }}
      </p>

      <h2 style="font-size: 1.4rem; font-weight: 600; margin: 2rem 0 1rem; color: #111111; border-bottom: 1px solid rgba(0,0,0,0.1); padding-bottom: 0.5rem;">
        {{ $isTr ? '2. Çerez (Cookie) Nedir?' : '2. What is a Cookie?' }}
      </h2>
      <p style="margin-bottom: 1rem;">
        {{ $isTr 
          ? 'Çerezler, bir internet sitesini ziyaret ettiğinizde tarayıcınız aracılığıyla cihazınıza kaydedilen küçük veri dosyalarıdır.' 
          : 'Cookies are small data files saved on your device through your browser when you visit a website.' 
        }}
      </p>
      <p style="margin-bottom: 1rem;">
        {{ $isTr ? 'Bu dosyalar sayesinde internet sitesi:' : 'Thanks to these files, the website can:' }}
      </p>
      <ul style="margin-bottom: 1rem; padding-left: 1.5rem; list-style-type: square; color: #444444;">
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'kullanıcı tercihlerini hatırlayabilir,' : 'remember user preferences,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'güvenli oturum yönetimi sağlayabilir,' : 'provide secure session management,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'performans analizleri gerçekleştirebilir,' : 'perform performance analyses,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'kullanıcı deneyimini optimize edebilir.' : 'optimize user experience.' }}</li>
      </ul>
      <p style="margin-bottom: 1.5rem;">
        {{ $isTr 
          ? 'Çerezler bilgisayarınıza zarar vermez ve kişisel dosyalarınıza erişim sağlamaz.' 
          : 'Cookies do not harm your computer and do not provide access to your personal files.' 
        }}
      </p>

      <h2 style="font-size: 1.4rem; font-weight: 600; margin: 2rem 0 1rem; color: #111111; border-bottom: 1px solid rgba(0,0,0,0.1); padding-bottom: 0.5rem;">
        {{ $isTr ? '3. Kullanılan Çerez Türleri' : '3. Types of Cookies Used' }}
      </h2>
      <ul style="margin-bottom: 1.5rem; padding-left: 1.5rem; list-style-type: square; color: #444444;">
        <li style="margin-bottom: 1rem;">
          <strong>{{ $isTr ? 'Zorunlu Çerezler (Strictly Necessary Cookies):' : 'Mandatory Cookies (Strictly Necessary Cookies):' }}</strong><br>
          {{ $isTr ? 'Bu çerezler, internet sitesinin temel işlevlerinin çalışabilmesi için gereklidir. Örneğin: oturum yönetimi, güvenlik doğrulamaları, form işlemleri, dil tercihleri, erişilebilirlik ayarları bu çerezler aracılığıyla yönetilmektedir. Zorunlu çerezler devre dışı bırakılamaz.' : 'These cookies are necessary for the core functions of the website to work. For example: session management, security verifications, form operations, language preferences, and accessibility settings are managed through these cookies. Necessary cookies cannot be disabled.' }}
        </li>
        <li style="margin-bottom: 1rem;">
          <strong>{{ $isTr ? 'Performans ve Analitik Çerezleri (Performance & Analytical Cookies):' : 'Performance and Analytical Cookies (Performance & Analytical Cookies):' }}</strong><br>
          {{ $isTr ? 'Bu çerezler, kullanıcıların internet sitesini nasıl kullandığını anonim şekilde analiz etmemizi sağlar. Bu kapsamda: ziyaret edilen sayfalar, oturum süreleri, tıklama davranışları, trafik kaynakları, hata kayıtları gibi veriler analiz edilerek site performansı geliştirilmektedir. Bu çerezler kullanıcıyı doğrudan tanımlamaz.' : 'These cookies allow us to anonymously analyze how users use the website. In this context: data such as visited pages, session durations, click behaviors, traffic sources, and error logs are analyzed to develop site performance. These cookies do not directly identify the user.' }}
        </li>
        <li style="margin-bottom: 1rem;">
          <strong>{{ $isTr ? 'Fonksiyonel Çerezler (Functional Cookies):' : 'Functional Cookies (Functional Cookies):' }}</strong><br>
          {{ $isTr ? 'Fonksiyonel çerezler, kullanıcı tercihlerini hatırlayarak daha kişiselleştirilmiş bir deneyim sunulmasını sağlar. Örneğin: dil tercihleri, bölgesel ayarlar, kullanıcı arayüzü tercihleri bu çerezler aracılığıyla saklanabilir.' : 'Functional cookies allow a more personalized experience by remembering user preferences. For example: language preferences, regional settings, and user interface preferences can be stored through these cookies.' }}
        </li>
      </ul>

      <h2 style="font-size: 1.4rem; font-weight: 600; margin: 2rem 0 1rem; color: #111111; border-bottom: 1px solid rgba(0,0,0,0.1); padding-bottom: 0.5rem;">
        {{ $isTr ? '4. Üçüncü Taraf Hizmetler' : '4. Third Party Services' }}
      </h2>
      <p style="margin-bottom: 1rem;">
        {{ $isTr 
          ? 'Sitemizde kullanılan bazı analiz, güvenlik veya performans hizmetleri üçüncü taraf servis sağlayıcıları tarafından sunulabilir.' 
          : 'Some analysis, security, or performance services used on our site may be provided by third-party service providers.' 
        }}
      </p>
      <p style="margin-bottom: 1rem;">
        {{ $isTr ? 'Bunlar;' : 'These may cover services such as:' }}
      </p>
      <ul style="margin-bottom: 1rem; padding-left: 1.5rem; list-style-type: square; color: #444444;">
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'analiz araçları,' : 'analysis tools,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'trafik ölçüm sistemleri,' : 'traffic measurement systems,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'güvenlik hizmetleri,' : 'security services,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'harita veya medya entegrasyonları' : 'map or media integrations' }}</li>
      </ul>
      <p style="margin-bottom: 1.5rem;">
        {{ $isTr 
          ? 'gibi hizmetleri kapsayabilir. Bu hizmet sağlayıcılar kendi gizlilik ve çerez politikaları kapsamında veri işleyebilir.' 
          : 'These service providers may process data under their own privacy and cookie policies.' 
        }}
      </p>

      <h2 style="font-size: 1.4rem; font-weight: 600; margin: 2rem 0 1rem; color: #111111; border-bottom: 1px solid rgba(0,0,0,0.1); padding-bottom: 0.5rem;">
        {{ $isTr ? '5. Çerezlerin Yönetilmesi' : '5. Managing Cookies' }}
      </h2>
      <p style="margin-bottom: 1rem;">
        {{ $isTr ? 'Çerez tercihleri tamamen kullanıcı kontrolündedir. Tarayıcı ayarlarınızı değiştirerek:' : 'Cookie preferences are entirely under user control. By changing browser settings, you can:' }}
      </p>
      <ul style="margin-bottom: 1rem; padding-left: 1.5rem; list-style-type: square; color: #444444;">
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'mevcut çerezleri sebilir,' : 'delete existing cookies,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'yeni çerezlerin kaydedilmesini engelleyebilir,' : 'block saving of new cookies,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'belirli çerez türlerini sınırlandırabilirsiniz.' : 'restrict specific cookie types.' }}</li>
      </ul>
      <p style="margin-bottom: 1.5rem;">
        {{ $isTr 
          ? 'Ancak bazı çerezlerin devre dışı bırakılması durumunda internet sitesinin belirli bölümleri düzgün çalışmayabilir.' 
          : 'However, if some cookies are disabled, certain parts of the website may not function correctly.' 
        }}
      </p>
      <p style="margin-bottom: 1rem;">
        {{ $isTr ? 'Popüler tarayıcıların çerez yönetim sayfaları:' : 'Cookie management pages for popular browsers:' }}
      </p>
      <ul style="margin-bottom: 1.5rem; padding-left: 1.5rem; list-style-type: square; color: var(--accent);">
        <li style="margin-bottom: 0.4rem;"><a href="https://support.google.com/chrome/answer/95647" target="_blank" rel="noopener noreferrer" style="color: var(--accent); text-decoration: underline;">{{ $isTr ? 'Google Chrome Destek' : 'Google Chrome Support' }}</a></li>
        <li style="margin-bottom: 0.4rem;"><a href="https://support.mozilla.org/en-US/kb/enhanced-tracking-protection-firefox-desktop" target="_blank" rel="noopener noreferrer" style="color: var(--accent); text-decoration: underline;">{{ $isTr ? 'Mozilla Firefox Destek' : 'Mozilla Firefox Support' }}</a></li>
        <li style="margin-bottom: 0.4rem;"><a href="https://support.apple.com/guide/safari/sfri11471/mac" target="_blank" rel="noopener noreferrer" style="color: var(--accent); text-decoration: underline;">{{ $isTr ? 'Safari Destek' : 'Safari Support' }}</a></li>
        <li style="margin-bottom: 0.4rem;"><a href="https://support.microsoft.com/en-us/windows/microsoft-edge-browsing-data-and-privacy-bb8174ba-9d73-dcf2-9b4a-c582b4e640dd" target="_blank" rel="noopener noreferrer" style="color: var(--accent); text-decoration: underline;">{{ $isTr ? 'Microsoft Edge Destek' : 'Microsoft Edge Support' }}</a></li>
      </ul>

      <h2 style="font-size: 1.4rem; font-weight: 600; margin: 2rem 0 1rem; color: #111111; border-bottom: 1px solid rgba(0,0,0,0.1); padding-bottom: 0.5rem;">
        {{ $isTr ? '6. Veri Güvenliği' : '6. Data Security' }}
      </h2>
      <p style="margin-bottom: 1rem;">
        {{ $isTr 
          ? 'SETİSAN, çerezler aracılığıyla elde edilen verilerin güvenliğini sağlamak amacıyla güncel teknik ve idari güvenlik önlemleri uygulamaktadır.' 
          : 'SETİSAN implements up-to-date technical and administrative security measures to ensure the security of data obtained through cookies.' 
        }}
      </p>
      <p style="margin-bottom: 1rem;">
        {{ $isTr ? 'Bu kapsamda:' : 'In this context:' }}
      </p>
      <ul style="margin-bottom: 1.5rem; padding-left: 1.5rem; list-style-type: square; color: #444444;">
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'SSL/TLS şifreleme,' : 'SSL/TLS encryption,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'güvenli sunucu altyapıları,' : 'secure server infrastructures,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'erişim kontrolleri,' : 'access controls,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'güvenlik duvarı sistemleri' : 'firewall systems' }}</li>
      </ul>
      <p style="margin-bottom: 1.5rem;">
        {{ $isTr ? 'aktif olarak kullanılmaktadır.' : 'are actively used.' }}
      </p>

      <h2 style="font-size: 1.4rem; font-weight: 600; margin: 2rem 0 1rem; color: #111111; border-bottom: 1px solid rgba(0,0,0,0.1); padding-bottom: 0.5rem;">
        {{ $isTr ? '7. Politika Güncellemeleri' : '7. Policy Updates' }}
      </h2>
      <p style="margin-bottom: 1.5rem;">
        {{ $isTr 
          ? 'SETİSAN, Çerez Politikası üzerinde yürürlükteki mevzuat veya dijital hizmet altyapısındaki değişiklikler doğrultusunda güncelleme yapma hakkını saklı tutar. Güncel politika metni internet sitemiz üzerinden yayınlandığı tarihte yürürlüğe girer.' 
          : 'SETİSAN reserves the right to update the Cookie Policy in line with current legislation or changes in digital service infrastructure. The current policy text enters into force on the date it is published on our website.' 
        }}
      </p>

      <h2 style="font-size: 1.4rem; font-weight: 600; margin: 2rem 0 1rem; color: #111111; border-bottom: 1px solid rgba(0,0,0,0.1); padding-bottom: 0.5rem;">
        {{ $isTr ? '8. İletişim' : '8. Contact' }}
      </h2>
      <p style="margin-bottom: 1.5rem;">
        {{ $isTr 
          ? 'Çerez Politikası hakkında soru, görüş veya talepleriniz için bizimle aşağıdaki iletişim adresi üzerinden iletişime geçebilirsiniz:' 
          : 'For questions, feedback, or requests regarding the Cookie Policy, you can contact us via the following communication address:' 
        }}
      </p>
      <p style="margin-bottom: 1.5rem; line-height: 1.7;">
        <strong>SETİSAN ISITMA SOĞUTMA KLİMA VE ELEKTRİK SANAYİ TİCARET LİMİTED ŞİRKETİ</strong><br><br>
        <strong>{{ $isTr ? 'E-Posta:' : 'E-Mail:' }}</strong><br>
        <a href="mailto:info@setisan.com.tr" style="color: var(--accent); text-decoration: underline;">info@setisan.com.tr</a>
      </p>

    </div>
  </div>
</section>
@endsection
