@extends('layouts.app')
@php $locale = app()->getLocale(); $isTr = $locale === 'tr'; @endphp

@section('meta_title', $isTr ? 'Gizlilik Politikası — Setisan Elektromekanik' : 'Privacy Policy — Setisan Elektromekanik')
@section('meta_desc', $isTr ? 'Kişisel veri gizliliği ve güvenlik politikalarımız hakkında detaylı bilgi edinin.' : 'Read about our personal data privacy and security policies.')

@section('content')
<div class="page-header">
  <div class="container">
    <h1 style="font-size: 2.5rem; font-weight: 700; margin-bottom: 1rem; color: var(--white);">
      {{ $isTr ? 'Gizlilik Politikası' : 'Privacy Policy' }}
    </h1>
    <p style="color: rgba(255,255,255,0.7); max-width: 600px; margin: 0 auto; font-size: 1.1rem; line-height: 1.6;">
      {{ $isTr ? 'SETİSAN olarak verilerinizin gizliliğini korumak en yüksek önceliğimizdir.' : 'At SETİSAN, protecting your data privacy is our highest priority.' }}
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
        {{ $isTr ? '1. Genel Yaklaşım' : '1. General Approach' }}
      </h2>
      <p style="margin-bottom: 1rem;">
        {{ $isTr 
          ? 'SETİSAN ISITMA SOĞUTMA KLİMA VE ELEKTRİK SANAYİ TİCARET LİMİTED ŞİRKETİ (“SETİSAN”), ziyaretçilerinin, müşterilerinin ve iş ortaklarının gizliliğini korumayı temel kurumsal sorumluluklarından biri olarak kabul etmektedir.' 
          : 'SETİSAN ISITMA SOĞUTMA KLİMA VE ELEKTRİK SANAYİ TİCARET LİMİTED ŞİRKETİ (“SETİSAN”), accepts protecting the privacy of its visitors, customers, and business partners as one of its fundamental corporate responsibilities.' 
        }}
      </p>
      <p style="margin-bottom: 1rem;">
        {{ $isTr 
          ? 'Bu Gizlilik Politikası; SETİSAN Resmî Web Sitesi üzerinden elde edilen kişisel verilerin hangi kapsamda toplandığını, hangi amaçlarla işlendiğini, nasıl korunduğunu ve kullanıcıların haklarını açıklamaktadır.' 
          : 'This Privacy Policy explains in what scope personal data obtained through the SETİSAN Official Website is collected, for what purposes it is processed, how it is protected, and the rights of users.' 
        }}
      </p>
      <p style="margin-bottom: 1rem;">
        {{ $isTr ? 'SETİSAN, kişisel verilerin işlenmesi süreçlerinde;' : 'SETİSAN, in personal data processing, bases on the following principles:' }}
      </p>
      <ul style="margin-bottom: 1.5rem; padding-left: 1.5rem; list-style-type: square; color: #444444;">
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'hukuka uygunluk,' : 'legality,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'şeffaflık,' : 'transparency,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'veri minimizasyonu,' : 'data minimization,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'güvenlik,' : 'security,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'amaçla sınırlılık' : 'purpose limitation' }}</li>
      </ul>
      <p style="margin-bottom: 1.5rem;">
        {{ $isTr ? 'ilkelerini esas almaktadır.' : 'as its core foundation.' }}
      </p>

      <h2 style="font-size: 1.4rem; font-weight: 600; margin: 2rem 0 1rem; color: #111111; border-bottom: 1px solid rgba(0,0,0,0.1); padding-bottom: 0.5rem;">
        {{ $isTr ? '2. Toplanan Veriler' : '2. Collected Data' }}
      </h2>
      <p style="margin-bottom: 1rem;">
        {{ $isTr 
          ? 'Sitemizi ziyaret ettiğinizde veya bizimle iletişime geçtiğinizde aşağıdaki veriler işlenebilmektedir:' 
          : 'When you visit our site or contact us, your following data may be processed:' 
        }}
      </p>
      <ul style="margin-bottom: 1.5rem; padding-left: 1.5rem; list-style-type: square; color: #444444;">
        <li style="margin-bottom: 0.8rem;">
          <strong>{{ $isTr ? 'Kimlik ve İletişim Bilgileri:' : 'Identity and Contact Information:' }}</strong><br>
          {{ $isTr ? 'Ad ve soyad, telefon numarası, e-posta adresi, firma/unvan bilgisi.' : 'First name and last name, phone number, e-mail address, company/title information.' }}
        </li>
        <li style="margin-bottom: 0.8rem;">
          <strong>{{ $isTr ? 'Talep ve İletişim İçerikleri:' : 'Request and Communication Contents:' }}</strong><br>
          {{ $isTr ? 'İletişim formu mesajları, teklif talepleri, teknik destek veya proje bilgileri.' : 'Contact form messages, offer requests, technical support or project information.' }}
        </li>
        <li style="margin-bottom: 0.8rem;">
          <strong>{{ $isTr ? 'Teknik ve Kullanım Verileri:' : 'Technical and Usage Data:' }}</strong><br>
          {{ $isTr ? 'IP adresi, tarayıcı tipi ve sürümü, işletim sistemi bilgileri, ziyaret edilen sayfalar, site kullanım süresi, trafik ve oturum verileri, çerez (cookie) kayıtları.' : 'IP address, browser type and version, operating system information, visited pages, site usage duration, traffic and session data, cookie logs.' }}
        </li>
      </ul>

      <h2 style="font-size: 1.4rem; font-weight: 600; margin: 2rem 0 1rem; color: #111111; border-bottom: 1px solid rgba(0,0,0,0.1); padding-bottom: 0.5rem;">
        {{ $isTr ? '3. Verilerin Kullanım Amaçları' : '3. Purposes of Using Data' }}
      </h2>
      <p style="margin-bottom: 1rem;">
        {{ $isTr ? 'Toplanan veriler aşağıdaki amaçlarla kullanılmaktadır:' : 'The collected data is used for the following purposes:' }}
      </p>
      <ul style="margin-bottom: 1.5rem; padding-left: 1.5rem; list-style-type: square; color: #444444;">
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'İletişim taleplerinin yanıtlanması' : 'Responding to communication requests' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'Teklif ve proje süreçlerinin yürütülmesi' : 'Carrying out offer and project processes' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'Teknik destek hizmetlerinin sağlanması' : 'Providing technical support services' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'Müşteri ilişkileri süreçlerinin yönetilmesi' : 'Managing customer relations processes' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'İnternet sitesi performansının geliştirilmesi' : 'Improving website performance' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'Bilgi güvenliğinin sağlanması' : 'Ensuring information security' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'Hizmet kalitesinin artırılması' : 'Increasing service quality' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'Hukuki yükümlülüklerin yerine getirilmesi' : 'Fulfilling legal obligations' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'Olası güvenlik ihlallerinin tespiti ve önlenmesi' : 'Detecting and preventing possible security breaches' }}</li>
      </ul>
      <p style="margin-bottom: 1.5rem;">
        {{ $isTr 
          ? 'SETİSAN, kişisel verileri yalnızca belirli, açık ve meşru amaçlar doğrultusunda işlemektedir.' 
          : 'SETİSAN processes personal data only for specific, explicit, and legitimate purposes.' 
        }}
      </p>

      <h2 style="font-size: 1.4rem; font-weight: 600; margin: 2rem 0 1rem; color: #111111; border-bottom: 1px solid rgba(0,0,0,0.1); padding-bottom: 0.5rem;">
        {{ $isTr ? '4. Çerezler ve Benzeri Teknolojiler' : '4. Cookies and Similar Technologies' }}
      </h2>
      <p style="margin-bottom: 1rem;">
        {{ $isTr 
          ? 'Sitemizde kullanıcı deneyimini geliştirmek, performans analizleri gerçekleştirmek ve güvenliği artırmak amacıyla çerezler kullanılabilmektedir.' 
          : 'Cookies may be used on our site to improve the user experience, perform performance analyses, and increase security.' 
        }}
      </p>
      <p style="margin-bottom: 1rem;">
        {{ $isTr ? 'Çerezler aracılığıyla:' : 'Through cookies:' }}
      </p>
      <ul style="margin-bottom: 1.5rem; padding-left: 1.5rem; list-style-type: square; color: #444444;">
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'site trafiği analiz edilebilir,' : 'website traffic can be analyzed,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'kullanıcı tercihleri hatırlanabilir,' : 'user preferences can be remembered,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'performans iyileştirmeleri yapılabilir,' : 'performance improvements can be made,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'teknik sorunlar tespit edilebilir.' : 'technical problems can be detected.' }}</li>
      </ul>
      <p style="margin-bottom: 1.5rem;">
        {{ $isTr 
          ? 'Kullanıcılar, tarayıcı ayarları üzerinden çerez kullanımını sınırlandırabilir veya tamamen devre dışı bırakabilir.' 
          : 'Users can restrict or completely disable cookie use through browser settings.' 
        }}
      </p>

      <h2 style="font-size: 1.4rem; font-weight: 600; margin: 2rem 0 1rem; color: #111111; border-bottom: 1px solid rgba(0,0,0,0.1); padding-bottom: 0.5rem;">
        {{ $isTr ? '5. Veri Güvenliği' : '5. Data Security' }}
      </h2>
      <p style="margin-bottom: 1rem;">
        {{ $isTr 
          ? 'SETİSAN, kişisel verilerin gizliliğini ve güvenliğini korumak amacıyla güncel teknik ve idari güvenlik önlemleri uygulamaktadır.' 
          : 'SETİSAN implements up-to-date technical and administrative security measures to protect the confidentiality and security of personal data.' 
        }}
      </p>
      <p style="margin-bottom: 1rem;">
        {{ $isTr ? 'Bu kapsamda:' : 'In this context:' }}
      </p>
      <ul style="margin-bottom: 1.5rem; padding-left: 1.5rem; list-style-type: square; color: #444444;">
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'SSL/TLS şifreleme altyapıları,' : 'SSL/TLS encryption infrastructures,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'erişim yetkilendirme sistemleri,' : 'access authorization systems,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'sunucu güvenlik önlemleri,' : 'server security measures,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'güvenlik duvarı teknolojileri,' : 'firewall technologies,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'düzenli yazılım güncellemeleri,' : 'regular software updates,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'veri erişim kontrolleri' : 'data access controls' }}</li>
      </ul>
      <p style="margin-bottom: 1rem;">
        {{ $isTr ? 'aktif olarak kullanılmaktadır.' : 'are actively used.' }}
      </p>
      <p style="margin-bottom: 1.5rem;">
        {{ $isTr 
          ? 'Kişisel verilere yalnızca görev yetkisi bulunan sınırlı personel erişebilmektedir.' 
          : 'Only limited personnel with duty authorization can access personal data.' 
        }}
      </p>

      <h2 style="font-size: 1.4rem; font-weight: 600; margin: 2rem 0 1rem; color: #111111; border-bottom: 1px solid rgba(0,0,0,0.1); padding-bottom: 0.5rem;">
        {{ $isTr ? '6. Veri Paylaşımı' : '6. Data Sharing' }}
      </h2>
      <p style="margin-bottom: 1rem;">
        {{ $isTr 
          ? 'SETİSAN, kişisel verilerinizi üçüncü taraflara satmaz, kiralamaz veya ticari amaçlarla paylaşmaz.' 
          : 'SETİSAN does not sell, rent, or share your personal data with third parties for commercial purposes.' 
        }}
      </p>
      <p style="margin-bottom: 1rem;">
        {{ $isTr ? 'Verileriniz yalnızca:' : 'Your data may only be shared:' }}
      </p>
      <ul style="margin-bottom: 1.5rem; padding-left: 1.5rem; list-style-type: square; color: #444444;">
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'ilgili mevzuatın zorunlu kıldığı durumlarda,' : 'In cases where the relevant legislation makes it mandatory,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'yetkili kamu kurum ve kuruluşlarının talepleri doğrultusunda,' : 'In line with requests from authorized public institutions and organizations,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'hukuki yükümlülüklerin yerine getirilmesi amacıyla,' : 'For the purpose of fulfilling legal obligations,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'teknik altyapı ve hosting hizmet sağlayıcılarıyla sınırlı olmak üzere' : 'Limited to technical infrastructure and hosting service providers' }}</li>
      </ul>
      <p style="margin-bottom: 1.5rem;">
        {{ $isTr ? 'paylaşılabilmektedir.' : 'as required.' }}
      </p>

      <h2 style="font-size: 1.4rem; font-weight: 600; margin: 2rem 0 1rem; color: #111111; border-bottom: 1px solid rgba(0,0,0,0.1); padding-bottom: 0.5rem;">
        {{ $isTr ? '7. Veri Saklama Süresi' : '7. Data Retention Period' }}
      </h2>
      <p style="margin-bottom: 1rem;">
        {{ $isTr 
          ? 'Kişisel verileriniz, işleme amacının gerektirdiği süre boyunca ve ilgili mevzuatta öngörülen yasal saklama süreleri kapsamında muhafaza edilmektedir.' 
          : 'Your personal data is stored for the duration required by the processing purpose and within the scope of the legal retention periods stipulated in the relevant legislation.' 
        }}
      </p>
      <p style="margin-bottom: 1.5rem;">
        {{ $isTr 
          ? 'Saklama süresi sona eren veriler güvenli yöntemlerle silinmekte, yok edilmekte veya anonim hale getirilmektedir.' 
          : 'Data whose retention period has expired is deleted, destroyed, or anonymized using secure methods.' 
        }}
      </p>

      <h2 style="font-size: 1.4rem; font-weight: 600; margin: 2rem 0 1rem; color: #111111; border-bottom: 1px solid rgba(0,0,0,0.1); padding-bottom: 0.5rem;">
        {{ $isTr ? '8. Üçüncü Taraf Bağlantıları' : '8. Third Party Links' }}
      </h2>
      <p style="margin-bottom: 1.5rem;">
        {{ $isTr 
          ? 'İnternet sitemiz, üçüncü taraf internet sitelerine veya platformlara yönlendiren bağlantılar içerebilir. SETİSAN, bu platformların gizlilik uygulamalarından veya içeriklerinden sorumlu değildir. Kullanıcıların ilgili platformların gizlilik politikalarını ayrıca incelemeleri önerilmektedir.' 
          : 'Our website may contain links directing to third-party websites or platforms. SETİSAN is not responsible for the privacy practices or contents of these platforms. It is recommended that users separately review the privacy policies of the respective platforms.' 
        }}
      </p>

      <h2 style="font-size: 1.4rem; font-weight: 600; margin: 2rem 0 1rem; color: #111111; border-bottom: 1px solid rgba(0,0,0,0.1); padding-bottom: 0.5rem;">
        {{ $isTr ? '9. Kullanıcı Hakları' : '9. User Rights' }}
      </h2>
      <p style="margin-bottom: 1rem;">
        {{ $isTr ? 'Kullanıcılar;' : 'Users have the rights to:' }}
      </p>
      <ul style="margin-bottom: 1.5rem; padding-left: 1.5rem; list-style-type: square; color: #444444;">
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'kişisel verilerinin işlenip işlenmediğini öğrenme,' : 'Learn whether their personal data is processed,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'verilerine erişim talep etme,' : 'Request access to their data,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'yanlış veya eksik verilerin düzeltilmesini isteme,' : 'Request correction of incorrect or incomplete data,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'verilerin silinmesini talep etme,' : 'Request deletion of data,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'veri işleme faaliyetlerine itiraz etme' : 'Object to data processing activities' }}</li>
      </ul>
      <p style="margin-bottom: 1.5rem;">
        {{ $isTr ? 'haklarına sahiptir. Bu haklara ilişkin talepler, yürürlükteki veri koruma mevzuatı kapsamında değerlendirilmektedir.' : 'Requests regarding these rights are evaluated within the scope of current data protection legislation.' }}
      </p>

      <h2 style="font-size: 1.4rem; font-weight: 600; margin: 2rem 0 1rem; color: #111111; border-bottom: 1px solid rgba(0,0,0,0.1); padding-bottom: 0.5rem;">
        {{ $isTr ? '10. İletişim' : '10. Contact' }}
      </h2>
      <p style="margin-bottom: 1.5rem;">
        {{ $isTr 
          ? 'Gizlilik Politikası veya kişisel verilerinizin işlenmesi hakkında sorularınız için bizimle aşağıdaki iletişim kanalları üzerinden iletişime geçebilirsiniz:' 
          : 'For questions about the Privacy Policy or the processing of your personal data, you can contact us via the following communication channels:' 
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
