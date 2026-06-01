@extends('layouts.admin')
@section('page_title', 'Proje Kategorileri / Etiketleri')

@section('content')
  <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:1.5rem">
    <h2 style="font-size:1.1rem;font-weight:600">Proje Kategorileri (Etiketler)</h2>
    <a href="{{ route('admin.project-categories.create') }}" class="btn btn--primary btn--sm">+ Yeni Kategori/Etiket</a>
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
          <th>Durum</th>
          <th>Bağlı Proje</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @forelse($categories as $category)
          <tr>
            <td>{{ $category->order_index }}</td>
            <td><strong>{{ $category->name_tr }}</strong></td>
            <td>{{ $category->name_en ?? '—' }}</td>
            <td><code>{{ $category->slug }}</code></td>
            <td>
              @if($category->is_active)
                <span style="color: green; font-weight: 600; font-size: 0.85rem">Aktif</span>
              @else
                <span style="color: red; font-size: 0.85rem">Pasif</span>
              @endif
            </td>
            <td>{{ $category->projects()->count() }}</td>
            <td style="text-align:right;white-space:nowrap">
              <a href="{{ route('admin.project-categories.edit', $category) }}" class="btn btn--outline btn--sm">Düzenle</a>
              <form method="POST" action="{{ route('admin.project-categories.destroy', $category) }}" style="display:inline"
                onsubmit="return confirm('Bu kategoriyi/etiketi silmek istediğinizden emin misiniz?')">
                @csrf @method('DELETE')
                <button class="btn btn--danger btn--sm">Sil</button>
              </form>
            </td>
          </tr>
        @empty
          <tr><td colspan="7" style="text-align:center;color:var(--muted);padding:2rem">Henüz kategori eklenmemiş.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
@endsection
