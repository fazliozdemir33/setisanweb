@extends('layouts.admin')

@section('page_title', 'Referanslar')

@section('content')
<div class="card">
  <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1.5rem">
    <h2 style="font-size:1.1rem;font-weight:600;color:var(--dark)">Tüm Referanslar</h2>
    <a href="{{ route('admin.partners.create') }}" class="btn btn--primary btn--sm">+ Yeni Ekle</a>
  </div>

  <div style="overflow-x:auto">
    <table style="width:100%;text-align:left;border-collapse:collapse;font-size:0.875rem">
      <thead>
        <tr style="border-bottom:2px solid var(--border)">
          <th style="padding:1rem .5rem;color:var(--muted);font-weight:600">ID</th>
          <th style="padding:1rem .5rem;color:var(--muted);font-weight:600">Logo</th>
          <th style="padding:1rem .5rem;color:var(--muted);font-weight:600">Ad / Başlık</th>
          <th style="padding:1rem .5rem;color:var(--muted);font-weight:600">Sıra</th>
          <th style="padding:1rem .5rem;color:var(--muted);font-weight:600">Durum</th>
          <th style="padding:1rem .5rem;color:var(--muted);font-weight:600;text-align:right">İşlemler</th>
        </tr>
      </thead>
      <tbody>
        @foreach($partners as $p)
        <tr style="border-bottom:1px solid var(--border)">
          <td style="padding:1rem .5rem;color:var(--muted)">#{{ $p->id }}</td>
          <td style="padding:1rem .5rem;">
            <img src="{{ asset($p->logo) }}" alt="Logo" style="max-width: 140px; max-height: 60px; display: block; object-fit: contain; object-position: left center;">
          </td>
          <td style="padding:1rem .5rem;font-weight:500;color:var(--dark)">{{ $p->name ?? '-' }}</td>
          <td style="padding:1rem .5rem;color:var(--muted)">{{ $p->order_index }}</td>
          <td style="padding:1rem .5rem;">
            @if($p->is_active)
              <span class="badge badge--green">Aktif</span>
            @else
              <span class="badge badge--red">Pasif</span>
            @endif
          </td>
          <td style="padding:1rem .5rem;">
            <div style="display:flex; gap:0.5rem; justify-content:flex-end; align-items:center;">
              <a href="{{ route('admin.partners.edit', $p) }}" class="btn btn--outline btn--sm">Düzenle</a>
              <form action="{{ route('admin.partners.destroy', $p) }}" method="POST" style="margin:0;" onsubmit="return confirm('Bu çözüm ortağını silmek istediğinize emin misiniz?');">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn--danger btn--sm" style="margin:0;">Sil</button>
              </form>
            </div>
          </td>
        </tr>
        @endforeach
        @if($partners->isEmpty())
        <tr>
          <td colspan="6" style="padding:2rem;text-align:center;color:var(--muted)">Henüz çözüm ortağı eklenmemiş.</td>
        </tr>
        @endif
      </tbody>
    </table>
  </div>
</div>
@endsection
