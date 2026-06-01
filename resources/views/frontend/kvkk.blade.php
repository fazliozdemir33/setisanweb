@extends('layouts.app')
@php $locale = app()->getLocale(); $isTr = $locale === 'tr'; @endphp

@section('meta_title', $isTr ? 'KVKK Aydınlatma Metni — Setisan Elektromekanik' : 'KVKK Clarification Text — Setisan Elektromekanik')
@section('meta_desc', $isTr ? 'Kişisel Verilerin Korunması Kanunu (KVKK) kapsamında aydınlatma metnimiz.' : 'Clarification text under the Personal Data Protection Law (KVKK).')

@section('content')
<div class="page-header">
  <div class="container">
    <h1 style="font-size: 2.5rem; font-weight: 700; margin-bottom: 1rem; color: var(--white);">
      {{ $isTr ? 'KVKK Aydınlatma Metni' : 'KVKK Clarification Text' }}
    </h1>
    <p style="color: rgba(255,255,255,0.7); max-width: 600px; margin: 0 auto; font-size: 1.1rem; line-height: 1.6;">
      {{ $isTr ? 'Kişisel verilerinizin güvenliği ve gizliliği bizim için en üst düzeyde öneme sahiptir.' : 'The security and privacy of your personal data is of utmost importance to us.' }}
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
        {{ $isTr ? '1. Veri Sorumlusu' : '1. Data Controller' }}
      </h2>
      <p style="margin-bottom: 1rem;">
        {{ $isTr 
          ? '6698 sayılı Kişisel Verilerin Korunması Kanunu (“KVKK”) uyarınca, kişisel verileriniz; veri sorumlusu sıfatıyla SETİSAN ISITMA SOĞUTMA KLİMA VE ELEKTRİK SANAYİ TİCARET LİMİTED ŞİRKETİ (“SETİSAN” veya “Şirket”) tarafından aşağıda açıklanan kapsamda işlenebilecektir.' 
          : 'In accordance with the Personal Data Protection Law No. 6698 ("KVKK"), your personal data may be processed by SETİSAN ISITMA SOĞUTMA KLİMA VE ELEKTRİK SANAYİ TİCARET LİMİTED ŞİRKETİ ("SETİSAN" or "Company") as the data controller within the scope explained below.' 
        }}
      </p>
      <p style="margin-bottom: 1.5rem;">
        {{ $isTr 
          ? 'SETİSAN, faaliyet gösterdiği tüm mühendislik, mekanik tesisat, HVAC, elektrik altyapı ve teknik uygulama süreçlerinde; kişisel verilerin güvenliğini, gizliliğini ve hukuka uygun işlenmesini temel kurumsal prensip olarak benimsemektedir.' 
          : 'SETİSAN adopts the security, confidentiality, and lawful processing of personal data as a fundamental corporate principle in all engineering, mechanical installation, HVAC, electrical infrastructure, and technical application processes.' 
        }}
      </p>

      <h2 style="font-size: 1.4rem; font-weight: 600; margin: 2rem 0 1rem; color: #111111; border-bottom: 1px solid rgba(0,0,0,0.1); padding-bottom: 0.5rem;">
        {{ $isTr ? '2. İşlenen Kişisel Veriler' : '2. Processed Personal Data' }}
      </h2>
      <p style="margin-bottom: 1rem;">
        {{ $isTr 
          ? 'İnternet sitemiz, iletişim kanallarımız ve dijital platformlarımız üzerinden tarafımızla paylaşmanız halinde aşağıdaki kişisel verileriniz işlenebilmektedir:' 
          : 'If shared with us through our website, communication channels, and digital platforms, your following personal data may be processed:' 
        }}
      </p>
      <ul style="margin-bottom: 1.5rem; padding-left: 1.5rem; list-style-type: square; color: #444444;">
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'Ad ve soyad bilgisi' : 'First name and last name' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'Telefon numarası' : 'Phone number' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'E-posta adresi' : 'E-mail address' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'Firma/unvan bilgisi' : 'Company/title information' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'Mesaj ve talep içerikleri' : 'Message and request contents' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'IP adresi ve işlem güvenliği verileri' : 'IP address and transaction security data' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'Web sitesi kullanım verileri ve çerez kayıtları' : 'Website usage data and cookie logs' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'Teklif, proje ve iş geliştirme süreçlerine ilişkin bilgiler' : 'Information regarding offers, projects, and business development processes' }}</li>
      </ul>
      <p style="margin-bottom: 1.5rem;">
        {{ $isTr 
          ? 'Başvuru, teklif veya iş ilişkisi süreçlerinde gerekli olması halinde ek bilgi ve belgeler de işlenebilecektir.' 
          : 'If required in application, offer, or business relationship processes, additional information and documents may also be processed.' 
        }}
      </p>

      <h2 style="font-size: 1.4rem; font-weight: 600; margin: 2rem 0 1rem; color: #111111; border-bottom: 1px solid rgba(0,0,0,0.1); padding-bottom: 0.5rem;">
        {{ $isTr ? '3. Kişisel Verilerin İşlenme Amaçları' : '3. Purposes of Processing Personal Data' }}
      </h2>
      <p style="margin-bottom: 1rem;">
        {{ $isTr 
          ? 'Toplanan kişisel verileriniz aşağıdaki amaçlarla işlenebilmektedir:' 
          : 'Your collected personal data may be processed for the following purposes:' 
        }}
      </p>
      <ul style="margin-bottom: 1.5rem; padding-left: 1.5rem; list-style-type: square; color: #444444;">
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'Talep ve iletişim süreçlerinin yürütülmesi' : 'Running request and communication processes' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'Teknik destek, teklif ve proje süreçlerinin yönetilmesi' : 'Managing technical support, offer, and project processes' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'Müşteri ilişkileri ve memnuniyet süreçlerinin yürütülmesi' : 'Conducting customer relations and satisfaction processes' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'Sözleşme süreçlerinin kurulması ve ifası' : 'Establishing and performing contract processes' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'Şirket operasyonlarının sürdürülebilirliğinin sağlanması' : 'Ensuring the sustainability of Company operations' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'Bilgi güvenliği süreçlerinin yürütülmesi' : 'Running information security processes' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'Hukuki yükümlülüklerin yerine getirilmesi' : 'Fulfilling legal obligations' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'Yetkili kurum ve kuruluşlardan gelen taleplerin karşılanması' : 'Meeting requests from authorized institutions and organizations' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'Web sitesi performansının ve kullanıcı deneyiminin geliştirilmesi' : 'Improving website performance and user experience' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'Kurumsal iletişim faaliyetlerinin yürütülmesi' : 'Running corporate communication activities' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'Olası uyuşmazlıklarda ispat yükümlülüklerinin yerine getirilmesi' : 'Fulfilling proof obligations in possible disputes' }}</li>
      </ul>
      <p style="margin-bottom: 1.5rem;">
        {{ $isTr 
          ? 'Kişisel verileriniz, KVKK’nın 4. maddesinde belirtilen hukuka ve dürüstlük kurallarına uygun, doğru ve gerektiğinde güncel, belirli, açık ve meşru amaçlar doğrultusunda işlenmektedir.' 
          : 'Your personal data is processed in accordance with the law and honesty rules specified in Article 4 of the KVKK, accurate and up to date when necessary, for specific, clear, and legitimate purposes.' 
        }}
      </p>

      <h2 style="font-size: 1.4rem; font-weight: 600; margin: 2rem 0 1rem; color: #111111; border-bottom: 1px solid rgba(0,0,0,0.1); padding-bottom: 0.5rem;">
        {{ $isTr ? '4. Kişisel Verilerin Toplanma Yöntemi ve Hukuki Sebebi' : '4. Method and Legal Reason for Collecting Personal Data' }}
      </h2>
      <p style="margin-bottom: 1rem;">
        {{ $isTr ? 'Kişisel verileriniz;' : 'Your personal data;' }}
      </p>
      <ul style="margin-bottom: 1.5rem; padding-left: 1.5rem; list-style-type: square; color: #444444;">
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'İnternet sitemizde yer alan iletişim formları,' : 'Contact forms on our website,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'E-posta yazışmaları,' : 'E-mail correspondence,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'Telefon görüşmeleri,' : 'Phone calls,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'Fiziksel veya dijital teklif süreçleri,' : 'Physical or digital offer processes,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'Çerezler ve benzeri teknolojiler,' : 'Cookies and similar technologies,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'Sosyal medya ve diğer dijital iletişim kanalları' : 'Social media and other digital communication channels' }}</li>
      </ul>
      <p style="margin-bottom: 1rem;">
        {{ $isTr ? 'aracılığıyla elektronik veya fiziki ortamda toplanabilmektedir.' : 'may be collected in electronic or physical media.' }}
      </p>
      <p style="margin-bottom: 1rem;">
        {{ $isTr ? 'Kişisel verileriniz aşağıdaki hukuki sebeplere dayanılarak işlenmektedir:' : 'Your personal data is processed based on the following legal grounds:' }}
      </p>
      <ul style="margin-bottom: 1.5rem; padding-left: 1.5rem; list-style-type: square; color: #444444;">
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'Bir sözleşmenin kurulması veya ifasıyla doğrudan doğruya ilgili olması,' : 'Being directly related to the establishment or performance of a contract,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'Veri sorumlusunun hukuki yükümlülüğünü yerine getirebilmesi,' : 'Enabling the data controller to fulfill its legal obligation,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'Bir hakkın tesisi, kullanılması veya korunması için veri işlemenin zorunlu olması,' : 'Processing data is mandatory for the establishment, exercise, or protection of a right,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'İlgili kişinin temel hak ve özgürlüklerine zarar vermemek kaydıyla veri sorumlusunun meşru menfaatleri için veri işlenmesinin zorunlu olması,' : 'Processing data is mandatory for the legitimate interests of the data controller, provided that it does not harm the fundamental rights and freedoms of the data subject,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'Açık rızanızın bulunması gereken durumlarda açık rızanızın alınması.' : 'Obtaining your explicit consent in cases where explicit consent is required.' }}</li>
      </ul>

      <h2 style="font-size: 1.4rem; font-weight: 600; margin: 2rem 0 1rem; color: #111111; border-bottom: 1px solid rgba(0,0,0,0.1); padding-bottom: 0.5rem;">
        {{ $isTr ? '5. Kişisel Verilerin Aktarılması' : '5. Transfer of Personal Data' }}
      </h2>
      <p style="margin-bottom: 1rem;">
        {{ $isTr ? 'Kişisel verileriniz;' : 'Your personal data;' }}
      </p>
      <ul style="margin-bottom: 1.5rem; padding-left: 1.5rem; list-style-type: square; color: #444444;">
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'Yetkili kamu kurum ve kuruluşlarına,' : 'Authorized public institutions and organizations,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'Hukuken yetkili yargı mercilerine,' : 'Legally authorized judicial authorities,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'Bilgi teknolojileri, hosting, sunucu ve teknik altyapı hizmet sağlayıcılarına,' : 'Information technologies, hosting, server, and technical infrastructure service providers,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'Hukuki, mali ve operasyonel danışmanlık hizmeti alınan iş ortaklarına' : 'Business partners from whom legal, financial, and operational consultancy services are obtained' }}</li>
      </ul>
      <p style="margin-bottom: 1rem;">
        {{ $isTr 
          ? 'KVKK’nın 8. ve 9. maddelerinde belirtilen şartlara uygun olarak aktarılabilecektir.' 
          : 'may be transferred in accordance with the conditions specified in Articles 8 and 9 of the KVKK.' 
        }}
      </p>
      <p style="margin-bottom: 1.5rem;">
        {{ $isTr 
          ? 'SETİSAN, kişisel verilerinizi hiçbir şekilde ticari amaçla üçüncü kişilere satmaz, kiralamaz veya yetkisiz şekilde paylaşmaz.' 
          : 'SETİSAN never sells, rents, or unauthorizedly shares your personal data with third parties for commercial purposes.' 
        }}
      </p>

      <h2 style="font-size: 1.4rem; font-weight: 600; margin: 2rem 0 1rem; color: #111111; border-bottom: 1px solid rgba(0,0,0,0.1); padding-bottom: 0.5rem;">
        {{ $isTr ? '6. Çerez (Cookie) Kullanımı' : '6. Cookie Usage' }}
      </h2>
      <p style="margin-bottom: 1rem;">
        {{ $isTr 
          ? 'İnternet sitemizde kullanıcı deneyimini geliştirmek, performans ölçümü yapmak, güvenliği sağlamak ve hizmet kalitesini artırmak amacıyla çerezler kullanılabilmektedir.' 
          : 'Cookies may be used on our website to improve the user experience, measure performance, ensure security, and increase service quality.' 
        }}
      </p>
      <p style="margin-bottom: 1rem;">
        {{ $isTr ? 'Çerezler aracılığıyla elde edilen veriler;' : 'Data obtained through cookies;' }}
      </p>
      <ul style="margin-bottom: 1rem; padding-left: 1.5rem; list-style-type: square; color: #444444;">
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'site kullanım alışkanlıklarının analiz edilmesi,' : 'analyzing website usage habits,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'teknik sorunların tespiti,' : 'detecting technical problems,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'performans iyileştirmeleri,' : 'performance improvements,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'güvenlik önlemlerinin sağlanması' : 'ensuring security measures' }}</li>
      </ul>
      <p style="margin-bottom: 1.5rem;">
        {{ $isTr ? 'amaçlarıyla işlenebilir.' : 'may be processed for these purposes.' }}
      </p>
      <p style="margin-bottom: 1.5rem;">
        {{ $isTr 
          ? 'Tarayıcı ayarlarınızı değiştirerek çerez kullanımını kısmen veya tamamen engelleyebilirsiniz.' 
          : 'You can partially or completely block the use of cookies by changing your browser settings.' 
        }}
      </p>

      <h2 style="font-size: 1.4rem; font-weight: 600; margin: 2rem 0 1rem; color: #111111; border-bottom: 1px solid rgba(0,0,0,0.1); padding-bottom: 0.5rem;">
        {{ $isTr ? '7. Kişisel Verilerin Saklanma Süresi' : '7. Retention Period of Personal Data' }}
      </h2>
      <p style="margin-bottom: 1rem;">
        {{ $isTr 
          ? 'Kişisel verileriniz, ilgili mevzuatta öngörülen süreler boyunca veya işleme amacının gerektirdiği süre kadar saklanmaktadır.' 
          : 'Your personal data is stored for the periods stipulated in the relevant legislation or for the duration required by the processing purpose.' 
        }}
      </p>
      <p style="margin-bottom: 1.5rem;">
        {{ $isTr 
          ? 'İşleme amacının ortadan kalkması ve yasal saklama sürelerinin sona ermesi halinde kişisel verileriniz KVKK’ya uygun şekilde silinir, yok edilir veya anonim hale getirilir.' 
          : 'If the processing purpose ceases to exist and the legal retention periods expire, your personal data will be deleted, destroyed, or anonymized in accordance with the KVKK.' 
        }}
      </p>

      <h2 style="font-size: 1.4rem; font-weight: 600; margin: 2rem 0 1rem; color: #111111; border-bottom: 1px solid rgba(0,0,0,0.1); padding-bottom: 0.5rem;">
        {{ $isTr ? '8. Veri Güvenliği' : '8. Data Security' }}
      </h2>
      <p style="margin-bottom: 1rem;">
        {{ $isTr 
          ? 'SETİSAN, kişisel verilerin hukuka aykırı olarak işlenmesini ve erişilmesini önlemek, verilerin muhafazasını sağlamak amacıyla uygun teknik ve idari güvenlik tedbirlerini uygulamaktadır.' 
          : 'SETİSAN implements appropriate technical and administrative security measures to prevent unlawful processing and access to personal data, and to ensure the preservation of data.' 
        }}
      </p>
      <p style="margin-bottom: 1rem;">
        {{ $isTr ? 'Bu kapsamda:' : 'In this context:' }}
      </p>
      <ul style="margin-bottom: 1.5rem; padding-left: 1.5rem; list-style-type: square; color: #444444;">
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'erişim yetkilendirmeleri,' : 'access authorizations,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'güvenlik duvarları,' : 'firewalls,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'SSL altyapıları,' : 'SSL infrastructures,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'güncel yazılım sistemleri,' : 'up-to-date software systems,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'veri erişim kontrolleri,' : 'data access controls,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'düzenli güvenlik önlemleri' : 'regular security measures' }}</li>
      </ul>
      <p style="margin-bottom: 1.5rem;">
        {{ $isTr ? 'aktif olarak kullanılmaktadır.' : 'are actively used.' }}
      </p>

      <h2 style="font-size: 1.4rem; font-weight: 600; margin: 2rem 0 1rem; color: #111111; border-bottom: 1px solid rgba(0,0,0,0.1); padding-bottom: 0.5rem;">
        {{ $isTr ? '9. KVKK Kapsamındaki Haklarınız' : '9. Your Rights Under the KVKK' }}
      </h2>
      <p style="margin-bottom: 1rem;">
        {{ $isTr 
          ? 'KVKK’nın 11. maddesi uyarınca aşağıdaki haklara sahipsiniz:' 
          : 'Under Article 11 of the KVKK, you have the following rights:' 
        }}
      </p>
      <ul style="margin-bottom: 2rem; padding-left: 1.5rem; list-style-type: square; color: #444444;">
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'Kişisel verilerinizin işlenip işlenmediğini öğrenme,' : 'Learn whether your personal data is processed,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'İşlenmişse buna ilişkin bilgi talep etme,' : 'Request information if it has been processed,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'İşlenme amacını ve amacına uygun kullanılıp kullanılmadığını öğrenme,' : 'Learn the purpose of processing and whether it is used in accordance with its purpose,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'Yurt içinde veya yurt dışında aktarıldığı üçüncü kişileri bilme,' : 'Know the third parties to whom it is transferred in the country or abroad,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'Eksik veya yanlış işlenmiş olması halinde düzeltilmesini isteme,' : 'Request correction if it is incomplete or incorrectly processed,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'KVKK kapsamında silinmesini veya yok edilmesini isteme,' : 'Request deletion or destruction within the framework of the KVKK,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'Yapılan işlemlerin üçüncü kişilere bildirilmesini isteme,' : 'Request notification of these operations to third parties,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'Otomatik sistemler ile analiz edilmesi nedeniyle aleyhinize bir sonucun ortaya çıkmasına itiraz etme,' : 'Object to a result against you by analyzing it via automatic systems,' }}</li>
        <li style="margin-bottom: 0.5rem;">{{ $isTr ? 'Kanuna aykırı işlenmesi sebebiyle zarara uğramanız halinde zararın giderilmesini talep etme.' : 'Request compensation for damages in case of unlawful processing.' }}</li>
      </ul>

      <h2 style="font-size: 1.4rem; font-weight: 600; margin: 2rem 0 1rem; color: #111111; border-bottom: 1px solid rgba(0,0,0,0.1); padding-bottom: 0.5rem;">
        {{ $isTr ? '10. Başvuru ve İletişim' : '10. Application and Contact' }}
      </h2>
      <p style="margin-bottom: 1.5rem;">
        {{ $isTr 
          ? 'KVKK kapsamındaki taleplerinizi, kimliğinizi doğrulayıcı bilgiler ile birlikte aşağıdaki iletişim kanalları üzerinden tarafımıza iletebilirsiniz:' 
          : 'You can send your requests under the KVKK to us via the following communication channels along with information identifying your identity:' 
        }}
      </p>
      <p style="margin-bottom: 1.5rem; line-height: 1.7;">
        <strong>{{ $isTr ? 'Şirket Ünvanı:' : 'Company Title:' }}</strong><br>
        SETİSAN ISITMA SOĞUTMA KLİMA VE ELEKTRİK SANAYİ TİCARET LİMİTED ŞİRKETİ<br><br>
        <strong>{{ $isTr ? 'E-Posta:' : 'E-Mail:' }}</strong><br>
        <a href="mailto:info@setisan.com.tr" style="color: var(--accent); text-decoration: underline;">info@setisan.com.tr</a>
      </p>
      <p style="margin-top: 1.5rem;">
        {{ $isTr 
          ? 'Başvurularınız, KVKK’nın 13. maddesi kapsamında en kısa sürede ve en geç 30 (otuz) gün içerisinde sonuçlandırılacaktır.' 
          : 'Your applications will be finalized within the shortest time and at the latest within 30 (thirty) days under Article 13 of the KVKK.' 
        }}
      </p>

    </div>
  </div>
</section>
@endsection
