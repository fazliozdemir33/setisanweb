@extends('layouts.admin')
@section('page_title', 'Mesaj Detay')

@section('content')
<div style="max-width:700px">
  <div style="display:flex;align-items:center;gap:1rem;margin-bottom:1.5rem">
    <a href="{{ route('admin.messages.index') }}" class="btn btn--outline btn--sm">← Geri</a>
    <h2 style="font-size:1.1rem;font-weight:600">Mesaj Detayı</h2>
  </div>

  <div class="card">
    <div class="card__body" style="padding:2rem">
      <table style="margin-bottom:2rem">
        <tr><td style="padding:.5rem 1rem .5rem 0;color:var(--muted);font-size:.875rem;font-weight:500;white-space:nowrap">Ad Soyad</td><td style="font-weight:600">{{ $message->name }}</td></tr>
        @if($message->company)
        <tr><td style="padding:.5rem 1rem .5rem 0;color:var(--muted);font-size:.875rem;font-weight:500">Firma</td><td>{{ $message->company }}</td></tr>
        @endif
        <tr><td style="padding:.5rem 1rem .5rem 0;color:var(--muted);font-size:.875rem;font-weight:500">E-posta</td><td><a href="mailto:{{ $message->email }}" style="color:var(--p)">{{ $message->email }}</a></td></tr>
        @if($message->phone)
        <tr><td style="padding:.5rem 1rem .5rem 0;color:var(--muted);font-size:.875rem;font-weight:500">Telefon</td><td>{{ $message->phone }}</td></tr>
        @endif
        @if($message->subject)
        <tr><td style="padding:.5rem 1rem .5rem 0;color:var(--muted);font-size:.875rem;font-weight:500">Konu</td><td>{{ $message->subject }}</td></tr>
        @endif
        <tr><td style="padding:.5rem 1rem .5rem 0;color:var(--muted);font-size:.875rem;font-weight:500">Tarih</td><td>{{ $message->created_at->format('d.m.Y H:i') }}</td></tr>
        <tr><td style="padding:.5rem 1rem .5rem 0;color:var(--muted);font-size:.875rem;font-weight:500">Dil</td><td>{{ strtoupper($message->locale) }}</td></tr>
      </table>

      <div style="background:var(--surface);padding:1.5rem;border-radius:4px;border:1px solid var(--border)">
        <div style="font-size:.75rem;font-weight:600;color:var(--muted);letter-spacing:.08em;text-transform:uppercase;margin-bottom:.75rem">Mesaj</div>
        <p style="white-space:pre-wrap;line-height:1.75">{{ $message->message }}</p>
      </div>

      <div style="margin-top:2rem;display:flex;gap:.75rem">
        <a href="mailto:{{ $message->email }}" class="btn btn--primary">✉ Yanıtla</a>
        <form method="POST" action="{{ route('admin.messages.destroy', $message->id) }}" onsubmit="return confirm('Silmek istediğinizden emin misiniz?')">
          @csrf @method('DELETE')
          <button class="btn btn--danger">Mesajı Sil</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
