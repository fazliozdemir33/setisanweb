@extends('layouts.admin')
@section('page_title', isset($service) ? 'Hizmet Düzenle' : 'Yeni Hizmet')

@section('content')
<div style="max-width:900px">
  <div style="display:flex;align-items:center;gap:1rem;margin-bottom:1.5rem">
    <a href="{{ route('admin.services.index') }}" class="btn btn--outline btn--sm">← Geri</a>
    <h2 style="font-size:1.1rem;font-weight:600">{{ isset($service) ? 'Hizmet Düzenle: ' . $service->title_tr : 'Yeni Hizmet Ekle' }}</h2>
  </div>

  <form method="POST"
        action="{{ isset($service) ? route('admin.services.update', $service->id) : route('admin.services.store') }}"
        enctype="multipart/form-data">
    @csrf
    @if(isset($service)) @method('PUT') @endif

    <div class="card" style="margin-bottom:1.25rem">
      <div class="card__header"><h3>Genel Bilgiler</h3></div>
      <div class="card__body" style="padding:1.5rem">
        <div class="form-row">
          <div class="form-group">
            <label class="form-label">Sıra No</label>
            <input type="number" name="order_index" class="form-control" value="{{ old('order_index', $service->order_index ?? 0) }}">
          </div>
          <div class="form-group" style="display:flex;align-items:center;gap:.75rem;padding-top:1.5rem">
            <label class="toggle">
              <input type="checkbox" name="is_active" {{ (isset($service) ? $service->is_active : true) ? 'checked' : '' }}>
              <span class="toggle-slider"></span>
            </label>
            <span class="form-label" style="margin:0">Aktif</span>
          </div>
        </div>
        <div class="form-group">
          <label class="form-label">Üst Hizmet (Alt hizmet oluşturmak için seçin)</label>
          <select name="parent_id" class="form-control">
            <option value="">— Ana Hizmet (Üst Yok) —</option>
            @foreach($parentServices as $p)
              <option value="{{ $p->id }}" {{ old('parent_id', $service->parent_id ?? '') == $p->id ? 'selected' : '' }}>
                {{ $p->title_tr }}
              </option>
            @endforeach
          </select>
          <small style="color:var(--muted); margin-top:.35rem; display:block">Boş bırakırsanız bu hizmet ana hizmet olarak oluşturulur.</small>
        </div>

        <div class="form-group">
          <label class="form-label">Kapak Görseli</label>
          <input type="file" name="cover_image" class="form-control" accept="image/*">
          @if(isset($service) && $service->cover_image)
            <img src="{{ asset('storage/' . $service->cover_image) }}" style="max-width:200px;margin-top:.5rem;border-radius:4px">
          @endif
        </div>
      </div>
    </div>

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
            <label class="form-label">Başlık (TR) *</label>
            <input type="text" name="title_tr" class="form-control" required value="{{ old('title_tr', $service->title_tr ?? '') }}">
          </div>
          <div class="form-group">
            <label class="form-label">Kısa Açıklama (TR)</label>
            <textarea name="excerpt_tr" class="form-control" rows="3">{{ old('excerpt_tr', $service->excerpt_tr ?? '') }}</textarea>
          </div>
          <div class="form-group">
            <label class="form-label">İçerik (TR)</label>
            <textarea name="content_tr" class="form-control" rows="10">{{ old('content_tr', $service->content_tr ?? '') }}</textarea>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label class="form-label">Meta Başlık (TR)</label>
              <input type="text" name="meta_title_tr" class="form-control" value="{{ old('meta_title_tr', $service->meta_title_tr ?? '') }}">
            </div>
            <div class="form-group">
              <label class="form-label">Meta Açıklama (TR)</label>
              <textarea name="meta_desc_tr" class="form-control" rows="2">{{ old('meta_desc_tr', $service->meta_desc_tr ?? '') }}</textarea>
            </div>
          </div>
        </div>
        <div id="tab-en" style="display:none">
          <div class="form-group">
            <label class="form-label">Title (EN)</label>
            <input type="text" name="title_en" class="form-control" value="{{ old('title_en', $service->title_en ?? '') }}">
          </div>
          <div class="form-group">
            <label class="form-label">Excerpt (EN)</label>
            <textarea name="excerpt_en" class="form-control" rows="3">{{ old('excerpt_en', $service->excerpt_en ?? '') }}</textarea>
          </div>
          <div class="form-group">
            <label class="form-label">Content (EN)</label>
            <textarea name="content_en" class="form-control" rows="10">{{ old('content_en', $service->content_en ?? '') }}</textarea>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label class="form-label">Meta Title (EN)</label>
              <input type="text" name="meta_title_en" class="form-control" value="{{ old('meta_title_en', $service->meta_title_en ?? '') }}">
            </div>
            <div class="form-group">
              <label class="form-label">Meta Description (EN)</label>
              <textarea name="meta_desc_en" class="form-control" rows="2">{{ old('meta_desc_en', $service->meta_desc_en ?? '') }}</textarea>
            </div>
          </div>
        </div>
      </div>
    </div>

    <button type="submit" class="btn btn--primary">Kaydet</button>
  </form>
</div>

@push('scripts')
<script>
function switchTab(lang, el) {
  document.querySelectorAll('[id^="tab-"]').forEach(t => t.style.display = 'none');
  document.querySelectorAll('.form-tab').forEach(t => t.classList.remove('active'));
  document.getElementById('tab-' + lang).style.display = 'block';
  el.classList.add('active');
}
</script>
@endpush
@endsection
