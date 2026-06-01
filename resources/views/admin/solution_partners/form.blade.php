@extends('layouts.admin')
@section('page_title', isset($partner) ? 'Marka Düzenle' : 'Yeni Marka')

@section('content')
<div style="max-width:580px">
  <div style="display:flex;align-items:center;gap:1rem;margin-bottom:1.5rem">
    <a href="{{ route('admin.solution-partners.index') }}" class="btn btn--outline btn--sm">← Geri</a>
    <h2 style="font-size:1.1rem;font-weight:600">{{ isset($partner) ? 'Marka Düzenle' : 'Yeni Marka Ekle' }}</h2>
  </div>

  <form method="POST"
    action="{{ isset($partner) ? route('admin.solution-partners.update', $partner) : route('admin.solution-partners.store') }}"
    enctype="multipart/form-data">
    @csrf
    @if(isset($partner)) @method('PUT') @endif

    <div class="card">
      <div class="card__body" style="padding:1.5rem;display:flex;flex-direction:column;gap:1rem">

        <div class="form-group">
          <label class="form-label">Marka Adı *</label>
          <input type="text" name="name" class="form-control" required
            value="{{ old('name', $partner->name ?? '') }}"
            placeholder="Örn: Wilo, Grundfos, Siemens">
        </div>

        <div class="form-group">
          <label class="form-label">Logo (PNG/SVG/WebP önerilir)</label>
          <input type="file" name="logo" class="form-control" accept="image/*">
          @if(isset($partner) && $partner->logo)
            <div style="margin-top:.5rem;display:flex;align-items:center;gap:.75rem">
              <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}"
                style="height:40px;max-width:120px;object-fit:contain;background:#f4f4f4;border-radius:4px;padding:4px">
              <span style="font-size:.75rem;color:var(--muted)">Mevcut logo. Yeni yüklerseniz değişir.</span>
            </div>
          @endif
        </div>

        <div class="form-group">
          <label class="form-label">Web Sitesi (isteğe bağlı)</label>
          <input type="url" name="website" class="form-control"
            value="{{ old('website', $partner->website ?? '') }}"
            placeholder="https://wilo.com">
        </div>

        <div class="form-row">
          <div class="form-group">
            <label class="form-label">Sıralama</label>
            <input type="number" name="order_index" class="form-control" min="0"
              value="{{ old('order_index', $partner->order_index ?? 0) }}">
            <small style="color:var(--muted);font-size:.75rem">Küçük sayı önce gelir.</small>
          </div>
          <div class="form-group" style="display:flex;align-items:center;padding-top:1.6rem">
            <label style="display:flex;align-items:center;gap:.5rem;cursor:pointer;font-size:.875rem">
              <input type="checkbox" name="is_active"
                {{ (isset($partner) ? $partner->is_active : true) ? 'checked' : '' }}>
              Anasayfada Göster (Aktif)
            </label>
          </div>
        </div>

      </div>
    </div>

    <div style="margin-top:1rem">
      <button type="submit" class="btn btn--primary">Kaydet</button>
    </div>
  </form>
</div>
@endsection
