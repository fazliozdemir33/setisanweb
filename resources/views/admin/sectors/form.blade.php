@extends('layouts.admin')
@section('page_title', isset($sector) ? 'Sektör Düzenle' : 'Yeni Sektör')

@section('content')
  <div style="max-width:600px">
    <div style="display:flex;align-items:center;gap:1rem;margin-bottom:1.5rem">
      <a href="{{ route('admin.sectors.index') }}" class="btn btn--outline btn--sm">← Geri</a>
      <h2 style="font-size:1.1rem;font-weight:600">{{ isset($sector) ? 'Sektör Düzenle' : 'Yeni Sektör Ekle' }}</h2>
    </div>

    @if($errors->any())
      <div class="alert alert--error" style="margin-bottom:1rem">
        <ul style="margin:0;padding-left:1.2rem">
          @foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach
        </ul>
      </div>
    @endif

    <form method="POST"
      action="{{ isset($sector) ? route('admin.sectors.update', $sector) : route('admin.sectors.store') }}">
      @csrf
      @if(isset($sector)) @method('PUT') @endif

      <div class="card">
        <div class="card__body" style="padding:1.5rem;display:flex;flex-direction:column;gap:1rem">

          <div class="form-group">
            <label class="form-label">Sektör Adı (TR) *</label>
            <input type="text" name="name_tr" class="form-control" required
              value="{{ old('name_tr', $sector->name_tr ?? '') }}"
              placeholder="Örn: Otel, Hastane, Fabrika">
          </div>

          <div class="form-group">
            <label class="form-label">Sektör Adı (EN)</label>
            <input type="text" name="name_en" class="form-control"
              value="{{ old('name_en', $sector->name_en ?? '') }}"
              placeholder="E.g: Hotel, Hospital, Factory">
          </div>

          <div class="form-group">
            <label class="form-label">Sıralama</label>
            <input type="number" name="order_index" class="form-control" min="0"
              value="{{ old('order_index', $sector->order_index ?? 0) }}"
              placeholder="0 = en üstte">
            <small style="color:var(--muted);font-size:.78rem">Küçük sayı daha önce görünür.</small>
          </div>

        </div>
      </div>

      <div style="margin-top:1rem">
        <button type="submit" class="btn btn--primary">Kaydet</button>
      </div>
    </form>
  </div>
@endsection
