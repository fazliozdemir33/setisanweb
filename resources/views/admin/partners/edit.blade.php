@extends('layouts.admin')

@section('page_title', 'Çözüm Ortağı Düzenle')

@section('content')
<div class="card" style="max-width: 800px; padding: 2rem;">
  <form action="{{ route('admin.partners.update', $partner) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
      <label class="form-label">Firma / Marka Adı (İsteğe Bağlı)</label>
      <input type="text" name="name" class="form-control" value="{{ old('name', $partner->name) }}">
    </div>

    <div class="form-group">
      <label class="form-label">Yeni Logo Yükle (Sadece değiştirmek isterseniz seçin)</label>
      <input type="file" name="logo_file" class="form-control" accept="image/*">
      <small style="color:var(--muted);display:block;margin-top:.4rem">Geçerli formatlar: jpg, png, svg, webp. Maksimum boyut: 2MB.</small>
      @if($partner->logo)
        <div style="margin-top:1rem">
          <p style="font-size:0.875rem;margin-bottom:0.5rem;color:var(--dark)">Mevcut Logo:</p>
          <img src="{{ asset($partner->logo) }}" alt="Logo Önizleme" style="max-width: 200px; max-height: 80px; display: block; object-fit: contain; object-position: left center;">
        </div>
      @endif
    </div>

    <div class="form-group">
      <label class="form-label">Sıralama</label>
      <input type="number" name="order_index" class="form-control" value="{{ old('order_index', $partner->order_index) }}">
    </div>

    <div class="form-group" style="display:flex;align-items:center;gap:.75rem">
      <label class="toggle">
        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $partner->is_active) ? 'checked' : '' }}>
        <span class="toggle-slider"></span>
      </label>
      <span style="font-size:0.875rem;font-weight:500">Sahnede Göster (Aktif)</span>
    </div>

    <hr style="border:none;border-top:1px solid var(--border);margin:2rem 0">

    <div style="display:flex;justify-content:flex-end;gap:1rem">
      <a href="{{ route('admin.partners.index') }}" class="btn btn--outline">İptal</a>
      <button type="submit" class="btn btn--primary">Güncelle</button>
    </div>
  </form>
</div>
@endsection
