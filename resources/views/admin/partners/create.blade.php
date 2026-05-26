@extends('layouts.admin')

@section('page_title', 'Yeni Çözüm Ortağı Ekle')

@section('content')
<div class="card" style="max-width: 800px; padding: 2rem;">
  <form action="{{ route('admin.partners.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
      <label class="form-label">Firma / Marka Adı (İsteğe Bağlı)</label>
      <input type="text" name="name" class="form-control" value="{{ old('name') }}">
    </div>

    <div class="form-group">
      <label class="form-label">Logo Yükle</label>
      <input type="file" name="logo_file" class="form-control" accept="image/*" required>
      <small style="color:var(--muted);display:block;margin-top:.4rem">Geçerli formatlar: jpg, png, svg, webp. Maksimum boyut: 2MB.</small>
    </div>

    <div class="form-group">
      <label class="form-label">Sıralama</label>
      <input type="number" name="order_index" class="form-control" value="{{ old('order_index', 0) }}">
    </div>

    <div class="form-group" style="display:flex;align-items:center;gap:.75rem">
      <label class="toggle">
        <input type="checkbox" name="is_active" value="1" checked>
        <span class="toggle-slider"></span>
      </label>
      <span style="font-size:0.875rem;font-weight:500">Sahnede Göster (Aktif)</span>
    </div>

    <hr style="border:none;border-top:1px solid var(--border);margin:2rem 0">

    <div style="display:flex;justify-content:flex-end;gap:1rem">
      <a href="{{ route('admin.partners.index') }}" class="btn btn--outline">İptal</a>
      <button type="submit" class="btn btn--primary">Kaydet</button>
    </div>
  </form>
</div>
@endsection
