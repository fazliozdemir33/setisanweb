@extends('layouts.admin')
@section('page_title', isset($category) ? 'Kategori Düzenle' : 'Yeni Kategori')

@section('content')
<div style="max-width:600px">
  <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:1.5rem">
    <h2 style="font-size:1.1rem;font-weight:600">{{ isset($category) ? 'Kategori Düzenle' : 'Yeni Kategori (Etiket) Ekle' }}</h2>
    <a href="{{ route('admin.project-categories.index') }}" class="btn btn--outline btn--sm">← Geri</a>
  </div>

  <form method="POST" action="{{ isset($category) ? route('admin.project-categories.update', $category) : route('admin.project-categories.store') }}">
    @csrf
    @if(isset($category)) @method('PUT') @endif

    <div class="card">
      <div class="card__body" style="padding:1.5rem">

        <div class="form-group">
          <label class="form-label">Kategori Adı (TR)</label>
          <input type="text" name="name_tr" class="form-control" required value="{{ old('name_tr', $category->name_tr ?? '') }}">
        </div>

        <div class="form-group">
          <label class="form-label">Kategori Adı (EN)</label>
          <input type="text" name="name_en" class="form-control" value="{{ old('name_en', $category->name_en ?? '') }}">
        </div>

        <div class="form-row">
          <div class="form-group">
            <label class="form-label">Sıra (Order)</label>
            <input type="number" name="order_index" class="form-control" value="{{ old('order_index', $category->order_index ?? 0) }}">
          </div>
          
          <div class="form-group" style="display: flex; align-items: flex-end;">
            <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer; padding-bottom: 0.5rem;">
              <input type="checkbox" name="is_active" value="1" {{ old('is_active', $category->is_active ?? true) ? 'checked' : '' }}>
              <span style="font-weight: 500;">Aktif olarak göster</span>
            </label>
          </div>
        </div>

      </div>
    </div>

    <button type="submit" class="btn btn--primary" style="margin-top:1rem">Kaydet</button>
  </form>
</div>
@endsection
