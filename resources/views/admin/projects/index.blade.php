@extends('layouts.admin')
@section('page_title', 'Projeler')

@section('content')
<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1.5rem">
  <h2 style="font-size:1.1rem;font-weight:600">Projeler</h2>
  <a href="{{ route('admin.projects.create') }}" class="btn btn--primary">+ Yeni Proje</a>
</div>

<div class="card">
  <div class="card__body">
    <table>
      <thead>
        <tr>
          <th>Proje Adı</th>
          <th>Lokasyon</th>
          <th>Yıl</th>
          <th>Hizmet</th>

          <th>Durum</th>
          <th>İşlemler</th>
        </tr>
      </thead>
      <tbody>
        @forelse($projects as $project)
        <tr>
          <td style="font-weight:500">{{ $project->title_tr }}</td>
          <td style="color:var(--muted)">{{ $project->location_tr ?? '—' }}</td>
          <td style="color:var(--muted)">{{ $project->year ?? '—' }}</td>
          <td><span class="badge badge--blue">{{ $project->service?->title_tr ?? '—' }}</span></td>

          <td>
            <span class="badge {{ $project->is_active ? 'badge--green' : 'badge--red' }}">
              {{ $project->is_active ? 'Aktif' : 'Pasif' }}
            </span>
          </td>
          <td style="display:flex;gap:.5rem">
            <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn--outline btn--sm">Düzenle</a>
            <form method="POST" action="{{ route('admin.projects.destroy', $project->id) }}" onsubmit="return confirm('Silmek istediğinizden emin misiniz?')">
              @csrf @method('DELETE')
              <button class="btn btn--danger btn--sm">Sil</button>
            </form>
          </td>
        </tr>
        @empty
        <tr><td colspan="7" style="text-align:center;color:var(--muted);padding:2rem">Henüz proje yok.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
