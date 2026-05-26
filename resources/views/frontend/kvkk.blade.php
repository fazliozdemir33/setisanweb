@extends('layouts.app')
@php $locale = app()->getLocale(); $isTr = $locale === 'tr'; @endphp

@section('meta_title', $isTr ? 'KVKK & Gizlilik Politikası — Setisan Elektromekanik' : 'Privacy Policy — Setisan Elektromekanik')
@section('meta_desc', $isTr ? 'Kişisel verilerin korunması hakkında bilgi edinin.' : 'Learn about the protection of personal data.')

@section('content')
<div class="page-header">
  <div class="container">
    <h1>{{ $isTr ? 'KVKK & Gizlilik Politikası' : 'Privacy Policy' }}</h1>
  </div>
</div>
<section class="section">
  <div class="container" style="max-width:820px">
    <div style="line-height:1.9;color:var(--text-light)">
      <h2 style="font-size:1.25rem;margin-bottom:1rem;color:var(--dark)">{{ $isTr ? '1. Veri Sorumlusu' : '1. Data Controller' }}</h2>
      <p>{{ $isTr ? 'Setisan Elektromekanik olarak, kişisel verileriniz 6698 sayılı Kişisel Verilerin Korunması Kanunu kapsamında koruma altındadır.' : 'As Setisan Elektromekanik, your personal data is protected under applicable data protection legislation.' }}</p>
      <h2 style="font-size:1.25rem;margin:2rem 0 1rem;color:var(--dark)">{{ $isTr ? '2. Toplanan Veriler' : '2. Data Collected' }}</h2>
      <p>{{ $isTr ? 'İletişim formunu doldurduğunuzda ad-soyad, e-posta, telefon ve mesaj içeriğiniz işlenmektedir. Bu veriler yalnızca iletişim talebinizin karşılanması amacıyla kullanılmaktadır.' : 'When you fill in the contact form, your name, email, phone and message content are processed. This data is used solely to respond to your communication request.' }}</p>
      <h2 style="font-size:1.25rem;margin:2rem 0 1rem;color:var(--dark)">{{ $isTr ? '3. Veri Güvenliği' : '3. Data Security' }}</h2>
      <p>{{ $isTr ? 'Verileriniz SSL şifreleme ile aktarılmakta ve güvenli sunucularda saklanmaktadır. Üçüncü taraflarla paylaşılmamaktadır.' : 'Your data is transmitted with SSL encryption and stored on secure servers. It is not shared with third parties.' }}</p>
      <h2 style="font-size:1.25rem;margin:2rem 0 1rem;color:var(--dark)">{{ $isTr ? '4. Haklarınız' : '4. Your Rights' }}</h2>
      <p>{{ $isTr ? 'KVKK kapsamında; bilgi talep etme, düzeltme, silme ve işlemeye itiraz haklarına sahipsiniz. Talepleriniz için: info@setisan.com.tr' : 'You have the right to request information, correction, deletion and object to processing. For requests: info@setisan.com.tr' }}</p>
    </div>
  </div>
</section>
@endsection
