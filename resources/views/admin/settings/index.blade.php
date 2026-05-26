@extends('layouts.admin')
@section('page_title', 'Site Ayarları')

@section('content')
<h2 style="font-size:1.1rem;font-weight:600;margin-bottom:1.5rem">Site Ayarları</h2>

<form method="POST" action="{{ route('admin.settings.update') }}">
  @csrf

  <div class="card" style="margin-bottom:1.25rem">
    <div class="card__header"><h3>İletişim Sayfası</h3></div>
    <div class="card__body" style="padding:1.5rem">

      <p style="font-size:.8rem;color:var(--muted);margin-bottom:1.5rem">
        Bu bölümdeki değişiklikler <strong>İletişim</strong> sayfasına anında yansır.
      </p>

            <div class="form-row">
        <div class="form-group">
          <label class="form-label">Sayfa Başlığı (TR)</label>
          <input type="text" name="contact_page_title_tr" class="form-control"
            value="{{ \App\Models\Setting::get('contact_page_title_tr', 'İletişime Geçin') }}"
            placeholder="İletişime Geçin">
        </div>
        <div class="form-group">
          <label class="form-label">Page Title (EN)</label>
          <input type="text" name="contact_page_title_en" class="form-control"
            value="{{ \App\Models\Setting::get('contact_page_title_en', 'Get in Touch') }}"
            placeholder="Get in Touch">
        </div>
      </div>

            <div class="form-row">
        <div class="form-group">
          <label class="form-label">Sayfa Açıklaması (TR)</label>
          <textarea name="contact_page_desc_tr" class="form-control" rows="2"
            placeholder="Teknik gereksinimlerinizi paylaşın…">{{ \App\Models\Setting::get('contact_page_desc_tr') }}</textarea>
        </div>
        <div class="form-group">
          <label class="form-label">Page Description (EN)</label>
          <textarea name="contact_page_desc_en" class="form-control" rows="2"
            placeholder="Share your technical requirements…">{{ \App\Models\Setting::get('contact_page_desc_en') }}</textarea>
        </div>
      </div>

      <hr style="border:0;border-top:1px solid var(--border);margin:1.25rem 0">

            <div class="form-row">
        <div class="form-group">
          <label class="form-label">Telefon</label>
          <input type="text" name="contact_phone" class="form-control"
            value="{{ \App\Models\Setting::get('contact_phone', '0212 603 65 18') }}"
            placeholder="0212 603 65 18">
        </div>
        <div class="form-group">
          <label class="form-label">E-posta</label>
          <input type="email" name="contact_email" class="form-control"
            value="{{ \App\Models\Setting::get('contact_email', 'info@setisan.com') }}"
            placeholder="info@setisan.com">
        </div>
      </div>

            <div class="form-row">
        <div class="form-group">
          <label class="form-label">Web Adresi</label>
          <input type="text" name="contact_web" class="form-control"
            value="{{ \App\Models\Setting::get('contact_web', 'www.setisan.com') }}"
            placeholder="www.setisan.com">
        </div>
        <div class="form-group">
          <label class="form-label">Çalışma Saatleri</label>
          <input type="text" name="contact_working_hours" class="form-control"
            value="{{ \App\Models\Setting::get('contact_working_hours', 'Pzt – Cum: 08:30 – 18:00') }}"
            placeholder="Pzt – Cum: 08:30 – 18:00">
        </div>
      </div>

            <div class="form-group">
        <label class="form-label">Adres</label>
        <textarea name="contact_address" class="form-control" rows="2"
          placeholder="Tam adres…">{{ \App\Models\Setting::get('contact_address', 'Çobançeşme Mah. Sanayi Cad. Nish İstanbul B Blok Rezidans No: 44 İç Kapı No: 60 Bahçelievler / İstanbul') }}</textarea>
      </div>

            <div class="form-group">
        <label class="form-label">Google Maps Embed URL</label>
        <input type="text" name="contact_map_embed" class="form-control"
          value="{{ \App\Models\Setting::get('contact_map_embed') }}"
          placeholder="https://www.google.com/maps/embed?pb=…">
        <small style="color:var(--muted);font-size:.75rem;margin-top:.3rem;display:block">
          Google Maps → Paylaş → Haritayı göm → iframe src değerini buraya yapıştırın.
        </small>
      </div>

    </div>
  </div>


  <div class="card" style="margin-bottom:1.25rem">
    <div class="card__header"><h3>Sosyal Medya</h3></div>
    <div class="card__body" style="padding:1.5rem">

      <p style="font-size:.8rem;color:var(--muted);margin-bottom:1.5rem">
        Doldurduğunuz platformların ikonları footer'da görünür. <strong>Boş bıraktığınız alanların ikonu gösterilmez.</strong>
      </p>

      <div class="form-row">
        <div class="form-group">
          <label class="form-label">Instagram URL</label>
          <input type="url" name="social_instagram" class="form-control"
            value="{{ \App\Models\Setting::get('social_instagram') }}"
            placeholder="https://instagram.com/setisan">
        </div>
        <div class="form-group">
          <label class="form-label">LinkedIn URL</label>
          <input type="url" name="social_linkedin" class="form-control"
            value="{{ \App\Models\Setting::get('social_linkedin') }}"
            placeholder="https://linkedin.com/company/setisan">
        </div>
      </div>

      <div class="form-row">
        <div class="form-group">
          <label class="form-label">Facebook URL</label>
          <input type="url" name="social_facebook" class="form-control"
            value="{{ \App\Models\Setting::get('social_facebook') }}"
            placeholder="https://facebook.com/setisan">
        </div>
        <div class="form-group">
          <label class="form-label">YouTube URL</label>
          <input type="url" name="social_youtube" class="form-control"
            value="{{ \App\Models\Setting::get('social_youtube') }}"
            placeholder="https://youtube.com/@setisan">
        </div>
      </div>

      <div class="form-row">
        <div class="form-group">
          <label class="form-label">Twitter / X URL</label>
          <input type="url" name="social_twitter" class="form-control"
            value="{{ \App\Models\Setting::get('social_twitter') }}"
            placeholder="https://x.com/setisan">
        </div>
        <div class="form-group">
                  </div>
      </div>

    </div>
  </div>


  <div class="card" style="margin-bottom:1.25rem">
    <div class="card__header"><h3>SEO & Analytics</h3></div>
    <div class="card__body" style="padding:1.5rem">
      <div class="form-group">
        <label class="form-label">Google Analytics 4 Kodu (G-XXXXXXXXXX)</label>
        <input type="text" name="ga4_code" class="form-control" value="{{ \App\Models\Setting::get('ga4_code') }}" placeholder="G-XXXXXXXXXX">
      </div>
      <div class="form-group">
        <label class="form-label">Google Search Console Doğrulama Kodu</label>
        <input type="text" name="gsc_verify" class="form-control" value="{{ \App\Models\Setting::get('gsc_verify') }}">
      </div>
    </div>
  </div>

  <button type="submit" class="btn btn--primary">Ayarları Kaydet</button>
</form>
@endsection
