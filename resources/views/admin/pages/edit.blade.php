@extends('layouts.admin')
@section('page_title', 'Sayfa İçeriği Düzenle: ' . ucfirst($key))

@section('content')
<div style="max-width:900px">
  <h2 style="font-size:1.1rem;font-weight:600;margin-bottom:1.5rem">Sayfa: {{ ucfirst($key) }}</h2>

  <form method="POST" action="{{ route('admin.pages.update', $key) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    @if($key === 'hakkimizda')
    <div class="card" style="margin-bottom:1.25rem">
      <div class="card__header">
        <div class="form-tabs" style="border:none;margin:0">
          <div class="form-tab active" onclick="switchTab('tr',this)">🇹🇷 Türkçe</div>
          <div class="form-tab" onclick="switchTab('en',this)">🇬🇧 English</div>
        </div>
      </div>
      
      @foreach(['tr', 'en'] as $lang)
      <div id="tab-{{ $lang }}" style="display: {{ $lang == 'tr' ? 'block' : 'none' }}; padding: 1.5rem;">
        
        <div class="form-group">
          <label class="form-label">Sayfa Alt Başlığı (Subtitle)</label>
          <input type="text" name="settings[subtitle][{{ $lang }}]" class="form-control" value="{{ \App\Models\Setting::where('key', "page_{$key}_subtitle")->first()->{"value_{$lang}"} ?? '' }}">
        </div>

        <div class="form-group">
          <label class="form-label">Ana Başlık (Örn: Sahada Güçlü...)</label>
          <input type="text" name="settings[main_title][{{ $lang }}]" class="form-control" value="{{ \App\Models\Setting::where('key', "page_{$key}_main_title")->first()->{"value_{$lang}"} ?? '' }}">
        </div>

        <div class="form-group">
          <label class="form-label">Biz Kimiz? (Ana Metin)</label>
          <textarea name="settings[content][{{ $lang }}]" class="form-control" rows="8">{{ \App\Models\Setting::where('key', "page_{$key}_content")->first()->{"value_{$lang}"} ?? '' }}</textarea>
        </div>

        <div class="form-group">
          <label class="form-label">Misyonumuz</label>
          <textarea name="settings[mission][{{ $lang }}]" class="form-control" rows="4">{{ \App\Models\Setting::where('key', "page_{$key}_mission")->first()->{"value_{$lang}"} ?? '' }}</textarea>
        </div>

        <div class="form-group">
          <label class="form-label">Vizyonumuz</label>
          <textarea name="settings[vision][{{ $lang }}]" class="form-control" rows="4">{{ \App\Models\Setting::where('key', "page_{$key}_vision")->first()->{"value_{$lang}"} ?? '' }}</textarea>
        </div>

        <h4 style="margin-bottom: 1rem; color: var(--primary);">İstatistik Verileri</h4>
        <div class="form-row">
          <div class="form-group">
            <label class="form-label">Veri 1 (Örn: 30 Yıllık Deneyim)</label>
            <input type="text" name="settings[stat_1_val][{{ $lang }}]" class="form-control" placeholder="Rakam (Örn: 30)" value="{{ \App\Models\Setting::where('key', "page_{$key}_stat_1_val")->first()->{"value_{$lang}"} ?? '' }}" style="margin-bottom:.5rem;">
            <input type="text" name="settings[stat_1_label][{{ $lang }}]" class="form-control" placeholder="Etiket (Örn: Yıllık Deneyim)" value="{{ \App\Models\Setting::where('key', "page_{$key}_stat_1_label")->first()->{"value_{$lang}"} ?? '' }}">
          </div>
          <div class="form-group">
            <label class="form-label">Veri 2 (Örn: 200+ Proje)</label>
            <input type="text" name="settings[stat_2_val][{{ $lang }}]" class="form-control" placeholder="Rakam (Örn: 200+)" value="{{ \App\Models\Setting::where('key', "page_{$key}_stat_2_val")->first()->{"value_{$lang}"} ?? '' }}" style="margin-bottom:.5rem;">
            <input type="text" name="settings[stat_2_label][{{ $lang }}]" class="form-control" placeholder="Etiket (Örn: Tamamlanan Proje)" value="{{ \App\Models\Setting::where('key', "page_{$key}_stat_2_label")->first()->{"value_{$lang}"} ?? '' }}">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group">
            <label class="form-label">Veri 3 (Örn: 50+ Kurumsal Müşteri)</label>
            <input type="text" name="settings[stat_3_val][{{ $lang }}]" class="form-control" placeholder="Rakam (Örn: 50+)" value="{{ \App\Models\Setting::where('key', "page_{$key}_stat_3_val")->first()->{"value_{$lang}"} ?? '' }}" style="margin-bottom:.5rem;">
            <input type="text" name="settings[stat_3_label][{{ $lang }}]" class="form-control" placeholder="Etiket (Örn: Kurumsal Müşteri)" value="{{ \App\Models\Setting::where('key', "page_{$key}_stat_3_label")->first()->{"value_{$lang}"} ?? '' }}">
          </div>
        </div>
        <h4 style="margin-bottom: 1rem; color: var(--primary);">İletişim Banner Alanı (En Alt Kısım)</h4>
        <div class="form-group">
          <label class="form-label">CTA Başlığı (Örn: Projeniz için görüşelim)</label>
          <input type="text" name="settings[cta_title][{{ $lang }}]" class="form-control" value="{{ \App\Models\Setting::where('key', "page_{$key}_cta_title")->first()->{"value_{$lang}"} ?? '' }}">
        </div>
        <div class="form-group">
          <label class="form-label">CTA Açıklaması (Örn: Teknik ekibimiz...)</label>
          <textarea name="settings[cta_desc][{{ $lang }}]" class="form-control" rows="2">{{ \App\Models\Setting::where('key', "page_{$key}_cta_desc")->first()->{"value_{$lang}"} ?? '' }}</textarea>
        </div>
      </div>
      @endforeach

      <div style="padding: 1.5rem; border-top: 1px solid var(--border);">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
          <h4 style="margin: 0; color: var(--primary);">Kalite ve Yönetim Sistemi Sertifikalarımız</h4>
          <button type="button" class="btn btn--sm btn--primary" onclick="document.getElementById('certModal').style.display='flex'">+ Yeni Sertifika Ekle</button>
        </div>

        @php
          $certsSetting = \App\Models\Setting::get("page_hakkimizda_certificates");
          $certs = $certsSetting ? json_decode($certsSetting, true) : [];
        @endphp

        @if(count($certs) > 0)
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 1rem;">
          @foreach($certs as $index => $cert)
          <div style="border: 1px solid var(--border); border-radius: 8px; overflow: hidden; background: #fff;">
            <div style="height: 120px; background: #f8f9fa; display: flex; align-items: center; justify-content: center; overflow: hidden;">
              @if(in_array(pathinfo($cert['image'], PATHINFO_EXTENSION), ['jpg','jpeg','png','webp','gif']))
                <img src="{{ Storage::url($cert['image']) }}" style="width: 100%; height: 100%; object-fit: cover;">
              @else
                <span style="font-size: 0.8rem; color: #666;">[Dosya]</span>
              @endif
            </div>
            <div style="padding: 0.75rem;">
              <h5 style="margin: 0 0 0.5rem 0; font-size: 0.9rem;">{{ $cert['title_tr'] }}</h5>
              {{-- Silme butonu: ana form DIŞINDA ayrı form --}}
              <button type="button"
                class="btn btn--sm btn--danger"
                style="width: 100%; padding: 0.25rem;"
                onclick="deleteCert({{ $index }})">Sil</button>
            </div>
          </div>
          @endforeach
        </div>
        @else
        <p style="color: var(--muted); font-size: 0.9rem;">Henüz sertifika eklenmemiş.</p>
        @endif
      </div>

    </div>
    @elseif($key === 'anasayfa')
    <div class="card" style="margin-bottom:1.25rem">
      <div class="card__header">
        <h3 style="margin:0;font-size:1rem;font-weight:600">Sayısal Veriler (İstatistikler)</h3>
        <div class="form-tabs" style="border:none;margin:0">
          <div class="form-tab active" onclick="switchTab('tr',this)">🇹🇷 Türkçe</div>
          <div class="form-tab" onclick="switchTab('en',this)">🇬🇧 English</div>
        </div>
      </div>

      @foreach(['tr', 'en'] as $lang)
      <div id="tab-{{ $lang }}" style="display: {{ $lang == 'tr' ? 'block' : 'none' }}; padding: 1.5rem;">
        <div class="form-row">
          <div class="form-group">
            <label class="form-label">Veri 1 (Örn: 30 Yıllık Tecrübe)</label>
            <input type="text" name="settings[stat_1_val][{{ $lang }}]" class="form-control" placeholder="Rakam (Örn: 30)" value="{{ \App\Models\Setting::where('key', "page_{$key}_stat_1_val")->first()->{"value_{$lang}"} ?? '' }}" style="margin-bottom:.5rem;">
            <input type="text" name="settings[stat_1_label][{{ $lang }}]" class="form-control" placeholder="Etiket (Örn: Yıllık Tecrübe)" value="{{ \App\Models\Setting::where('key', "page_{$key}_stat_1_label")->first()->{"value_{$lang}"} ?? '' }}">
          </div>
          <div class="form-group">
            <label class="form-label">Veri 2 (Örn: 200+ Tamamlanan Proje)</label>
            <input type="text" name="settings[stat_2_val][{{ $lang }}]" class="form-control" placeholder="Rakam (Örn: 200+)" value="{{ \App\Models\Setting::where('key', "page_{$key}_stat_2_val")->first()->{"value_{$lang}"} ?? '' }}" style="margin-bottom:.5rem;">
            <input type="text" name="settings[stat_2_label][{{ $lang }}]" class="form-control" placeholder="Etiket (Örn: Tamamlanan Proje)" value="{{ \App\Models\Setting::where('key', "page_{$key}_stat_2_label")->first()->{"value_{$lang}"} ?? '' }}">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group">
            <label class="form-label">Veri 3 (Örn: 50.000m² Toplam Alan)</label>
            <input type="text" name="settings[stat_3_val][{{ $lang }}]" class="form-control" placeholder="Rakam (Örn: 50.000)" value="{{ \App\Models\Setting::where('key', "page_{$key}_stat_3_val")->first()->{"value_{$lang}"} ?? '' }}" style="margin-bottom:.5rem;">
            <input type="text" name="settings[stat_3_label][{{ $lang }}]" class="form-control" placeholder="Etiket (Örn: m² Alan)" value="{{ \App\Models\Setting::where('key', "page_{$key}_stat_3_label")->first()->{"value_{$lang}"} ?? '' }}">
          </div>
        </div>
      </div>
      @endforeach
    </div>
    @else
            <div class="card" style="margin-bottom:1.25rem">
        <div class="card__header">
          <div class="form-tabs" style="border:none;margin:0">
            <div class="form-tab active" onclick="switchTab('tr',this)">🇹🇷 Türkçe</div>
            <div class="form-tab" onclick="switchTab('en',this)">🇬🇧 English</div>
          </div>
        </div>
        <div class="card__body" style="padding:1.5rem">
          <div id="tab-tr">
            <div class="form-group">
              <label class="form-label">Sayfa İçeriği (TR)</label>
              <textarea name="settings[content][tr]" class="form-control" rows="15">{{ \App\Models\Setting::get("page_{$key}_content")->value_tr ?? '' }}</textarea>
            </div>
          </div>
          <div id="tab-en" style="display:none">
            <div class="form-group">
              <label class="form-label">Sayfa İçeriği (EN)</label>
              <textarea name="settings[content][en]" class="form-control" rows="15">{{ \App\Models\Setting::get("page_{$key}_content")->value_en ?? '' }}</textarea>
            </div>
          </div>
        </div>
      </div>
    @endif

    <button type="submit" class="btn btn--primary">Değişiklikleri Kaydet</button>
  </form>
</div>

{{-- Sertifika silme formu — Ana formun DIŞINDA (iç içe form HTML hatası önlenir) --}}
@if($key === 'hakkimizda')
<form id="cert-delete-form" method="POST" style="display:none">
  @csrf
  @method('DELETE')
</form>
@endif

@push('scripts')
<script>
function switchTab(lang, el) {
  document.querySelectorAll('[id^="tab-"]').forEach(t => t.style.display = 'none');
  document.querySelectorAll('.form-tab').forEach(t => t.classList.remove('active'));
  document.getElementById('tab-' + lang).style.display = 'block';
  el.classList.add('active');
}

function deleteCert(index) {
  if (!confirm('Bu sertifikayı silmek istediğinizden emin misiniz?')) return;
  const form = document.getElementById('cert-delete-form');
  if (!form) return;
  form.action = '/yonetim/sayfalar/{{ $key }}/sertifika/' + index;
  form.submit();
}
</script>

<!-- Certificate Add Modal -->
<div id="certModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 9999; align-items: center; justify-content: center;">
  <div style="background: var(--white); padding: 2rem; border-radius: var(--radius); width: 100%; max-width: 500px; position: relative;">
    <button type="button" onclick="document.getElementById('certModal').style.display='none'" style="position: absolute; top: 1rem; right: 1rem; background: none; border: none; font-size: 1.5rem; cursor: pointer; color: var(--muted);">&times;</button>
    <h3 style="margin-top: 0; margin-bottom: 1.5rem; font-size: 1.25rem;">Yeni Sertifika / Belge Ekle</h3>

    <form action="{{ route('admin.pages.add_certificate', $key) }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label class="form-label">Sertifika Görseli (Zorunlu)</label>
        <input type="file" name="image" class="form-control" accept="image/*,application/pdf" required>
      </div>

      <div class="form-group">
        <label class="form-label">Sertifika Adı (TR)</label>
        <input type="text" name="title_tr" class="form-control" required placeholder="Örn: ISO 9001 Kalite Belgesi">
      </div>

      <div class="form-group">
        <label class="form-label">Sertifika Adı (EN)</label>
        <input type="text" name="title_en" class="form-control" placeholder="Örn: ISO 9001 Quality Certificate">
      </div>

      <div class="form-group">
        <label class="form-label">Açıklama (TR) - İsteğe Bağlı</label>
        <textarea name="desc_tr" class="form-control" rows="2" placeholder="Örn: Kalite ve Çevre Yönetim Sistemi"></textarea>
      </div>

      <div class="form-group">
        <label class="form-label">Açıklama (EN) - İsteğe Bağlı</label>
        <textarea name="desc_en" class="form-control" rows="2" placeholder="Örn: Quality and Environment Management System"></textarea>
      </div>

      <button type="submit" class="btn btn--primary" style="width: 100%;">Ekle</button>
    </form>
  </div>
</div>
@endpush
@endsection

