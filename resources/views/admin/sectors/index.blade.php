@extends('layouts.admin')
@section('page_title', 'Proje Sektörleri')

@section('content')
  <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:1.5rem">
    <h2 style="font-size:1.1rem;font-weight:600">Proje Sektörleri</h2>
    <a href="{{ route('admin.sectors.create') }}" class="btn btn--primary btn--sm">+ Yeni Sektör</a>
  </div>

  @if(session('success'))
    <div class="alert alert--success" style="margin-bottom:1rem">{{ session('success') }}</div>
  @endif

  <div class="card">
    <table class="table">
      <thead>
        <tr>
          <th>Sıra</th>
          <th>Ad (TR)</th>
          <th>Ad (EN)</th>
          <th>Slug</th>
          <th>Proje Sayısı</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @forelse($sectors as $sector)
          <tr>
            <td>{{ $sector->order_index }}</td>
            <td><strong>{{ $sector->name_tr }}</strong></td>
            <td>{{ $sector->name_en ?? '—' }}</td>
            <td><code>{{ $sector->slug }}</code></td>
            <td>{{ $sector->projects()->count() }}</td>
            <td style="text-align:right;white-space:nowrap">
              <a href="{{ route('admin.sectors.edit', $sector) }}" class="btn btn--outline btn--sm">Düzenle</a>
              <form method="POST" action="{{ route('admin.sectors.destroy', $sector) }}" style="display:inline"
                onsubmit="return confirm('Bu sektörü silmek istediğinizden emin misiniz?')">
                @csrf @method('DELETE')
                <button class="btn btn--danger btn--sm">Sil</button>
              </form>
            </td>
          </tr>
        @empty
          <tr><td colspan="6" style="text-align:center;color:var(--muted);padding:2rem">Henüz sektör eklenmemiş.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
@endsection
