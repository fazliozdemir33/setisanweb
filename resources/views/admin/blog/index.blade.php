@extends('layouts.admin')
@section('page_title', 'Blog Yazıları')

@section('content')
<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1.5rem">
  <h2 style="font-size:1.1rem;font-weight:600">Blog / Haberler</h2>
  <a href="{{ route('admin.blog.create') }}" class="btn btn--primary">+ Yeni Yazı</a>
</div>

<div class="card">
  <div class="card__body">
    <table>
      <thead>
        <tr>
          <th>Başlık</th>
          <th>Kategori</th>
          <th>Yayın Tarihi</th>
          <th>Durum</th>
          <th>İşlemler</th>
        </tr>
      </thead>
      <tbody>
        @forelse($posts as $post)
        <tr>
          <td style="font-weight:500">{{ $post->title_tr }}</td>
          <td style="color:var(--muted)">{{ $post->category ?? '—' }}</td>
          <td style="color:var(--muted);font-size:.8rem">{{ $post->published_at?->format('d.m.Y') ?? '—' }}</td>
          <td>
            <span class="badge {{ $post->is_published ? 'badge--green' : 'badge--yellow' }}">
              {{ $post->is_published ? 'Yayında' : 'Taslak' }}
            </span>
          </td>
          <td style="display:flex;gap:.5rem">
            <a href="{{ route('admin.blog.edit', $post->id) }}" class="btn btn--outline btn--sm">Düzenle</a>
            <form method="POST" action="{{ route('admin.blog.destroy', $post->id) }}" onsubmit="return confirm('Silmek istediğinizden emin misiniz?')">
              @csrf @method('DELETE')
              <button class="btn btn--danger btn--sm">Sil</button>
            </form>
          </td>
        </tr>
        @empty
        <tr><td colspan="5" style="text-align:center;color:var(--muted);padding:2rem">Henüz blog yazısı yok.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
