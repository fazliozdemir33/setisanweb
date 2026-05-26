@extends('layouts.admin')
@section('page_title', 'Mesajlar')

@section('content')
<h2 style="font-size:1.1rem;font-weight:600;margin-bottom:1.5rem">İletişim Mesajları</h2>

<div class="card">
  <div class="card__body">
    <table>
      <thead>
        <tr>
          <th>Ad Soyad</th>
          <th>Firma</th>
          <th>E-posta</th>
          <th>Telefon</th>
          <th>Tarih</th>
          <th>Durum</th>
          <th>İşlemler</th>
        </tr>
      </thead>
      <tbody>
        @forelse($messages as $msg)
        <tr>
          <td style="font-weight:{{ $msg->is_read ? '400' : '600' }}">{{ $msg->name }}</td>
          <td style="color:var(--muted)">{{ $msg->company ?? '—' }}</td>
          <td>{{ $msg->email }}</td>
          <td style="color:var(--muted)">{{ $msg->phone ?? '—' }}</td>
          <td style="color:var(--muted);font-size:.8rem">{{ $msg->created_at->format('d.m.Y H:i') }}</td>
          <td>
            @if(!$msg->is_read)
              <span class="badge badge--blue">Yeni</span>
            @else
              <span class="badge">Okundu</span>
            @endif
          </td>
          <td style="display:flex;gap:.5rem">
            <a href="{{ route('admin.messages.show', $msg->id) }}" class="btn btn--outline btn--sm">Görüntüle</a>
            <form method="POST" action="{{ route('admin.messages.destroy', $msg->id) }}" onsubmit="return confirm('Mesajı silmek istediğinizden emin misiniz?')">
              @csrf @method('DELETE')
              <button class="btn btn--danger btn--sm">Sil</button>
            </form>
          </td>
        </tr>
        @empty
        <tr><td colspan="7" style="text-align:center;color:var(--muted);padding:2rem">Henüz mesaj yok.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

@if($messages->hasPages())
<div style="margin-top:1.5rem">{{ $messages->links() }}</div>
@endif
@endsection
