@extends('layouts.admin')
@section('page_title', 'Dashboard')

@section('content')

<div class="dash-stats">
  <div class="stat-card">
    <div class="stat-card__icon">⚙</div>
    <div class="stat-card__num">{{ $stats['services'] }}</div>
    <div class="stat-card__label">Hizmet</div>
  </div>
  <div class="stat-card">
    <div class="stat-card__icon">◈</div>
    <div class="stat-card__num">{{ $stats['projects'] }}</div>
    <div class="stat-card__label">Proje</div>
  </div>
  <div class="stat-card">
    <div class="stat-card__icon">✎</div>
    <div class="stat-card__num">{{ $stats['posts'] }}</div>
    <div class="stat-card__label">Blog Yazısı</div>
  </div>
  <div class="stat-card" style="border-color:{{ $stats['messages'] > 0 ? 'var(--a)' : 'var(--border)' }}">
    <div class="stat-card__icon">✉</div>
    <div class="stat-card__num" style="color:{{ $stats['messages'] > 0 ? 'var(--a)' : 'var(--p)' }}">{{ $stats['messages'] }}</div>
    <div class="stat-card__label">Okunmamış Mesaj</div>
  </div>
</div>

<div class="card">
  <div class="card__header">
    <h3>Son Mesajlar</h3>
    <a href="{{ route('admin.messages.index') }}" class="btn btn--outline btn--sm">Tümünü Gör</a>
  </div>
  <div class="card__body">
    <table>
      <thead>
        <tr>
          <th>Ad Soyad</th>
          <th>Firma</th>
          <th>E-posta</th>
          <th>Tarih</th>
          <th>Durum</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @forelse($recentMessages as $msg)
        <tr>
          <td style="font-weight:{{ $msg->is_read ? '400' : '600' }}">{{ $msg->name }}</td>
          <td>{{ $msg->company ?? '—' }}</td>
          <td>{{ $msg->email }}</td>
          <td style="color:var(--muted);font-size:.8rem">{{ $msg->created_at->diffForHumans() }}</td>
          <td>
            @if(!$msg->is_read)
              <span class="badge badge--blue">Yeni</span>
            @else
              <span class="badge">Okundu</span>
            @endif
          </td>
          <td>
            <a href="{{ route('admin.messages.show', $msg->id) }}" class="btn btn--outline btn--sm">Görüntüle</a>
          </td>
        </tr>
        @empty
        <tr><td colspan="6" style="text-align:center;color:var(--muted);padding:2rem">Henüz mesaj yok.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

@endsection
