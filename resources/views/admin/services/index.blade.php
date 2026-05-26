@extends('layouts.admin')
@section('page_title', 'Hizmetler')

@section('content')
<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1.5rem">
  <h2 style="font-size:1.1rem;font-weight:600">Hizmetler</h2>
  <a href="{{ route('admin.services.create') }}" class="btn btn--primary">+ Yeni Hizmet</a>
</div>

<div class="card">
  <div class="card__body">
    <table>
      <thead>
        <tr>
          <th>Sıra</th>
          <th>Başlık (TR)</th>
          <th>Başlık (EN)</th>
          <th>Durum</th>
          <th>İşlemler</th>
        </tr>
      </thead>
      <tbody>
        @forelse($services as $service)
        <tr>
          <td style="color:var(--muted)">{{ $service->order_index }}</td>
          <td style="font-weight:500">{{ $service->title_tr }}</td>
          <td style="color:var(--muted)">{{ $service->title_en ?? '—' }}</td>
          <td>
            <span class="badge {{ $service->is_active ? 'badge--green' : 'badge--red' }}">
              {{ $service->is_active ? 'Aktif' : 'Pasif' }}
            </span>
          </td>
          <td style="display:flex;gap:.5rem">
            <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn--outline btn--sm">Düzenle</a>
            <form method="POST" action="{{ route('admin.services.destroy', $service->id) }}" onsubmit="return confirm('Silmek istediğinizden emin misiniz?')">
              @csrf @method('DELETE')
              <button class="btn btn--danger btn--sm">Sil</button>
            </form>
          </td>
        </tr>
        @empty
        <tr><td colspan="5" style="text-align:center;color:var(--muted);padding:2rem">Henüz hizmet yok.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
