@extends('layouts.admin')
@section('page_title', 'Profil Ayarları')

@section('content')

@if(session('success'))
<div class="alert alert--success" style="margin-bottom:1.5rem; padding:1rem; border-radius:4px; background:rgba(46,204,113,0.1); color:#2ecc71; border:1px solid rgba(46,204,113,0.3);">
  {{ session('success') }}
</div>
@endif

@if($errors->any())
<div class="alert alert--error" style="margin-bottom:1.5rem; padding:1rem; border-radius:4px; background:rgba(231,76,60,0.1); color:#e74c3c; border:1px solid rgba(231,76,60,0.3);">
  <ul style="list-style:none; margin:0; padding:0;">
    @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<div class="card" style="max-width: 600px;">
  <div class="card__header">
    <h3>Profil Bilgileri</h3>
  </div>
  <div class="card__body" style="padding: 2rem;">
    <form action="{{ route('admin.profile.update') }}" method="POST">
      @csrf

      <div class="form-group">
        <label for="name" class="form-label">İsim Soyisim</label>
        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
      </div>

      <div class="form-group">
        <label for="email" class="form-label">E-posta (Kullanıcı Adı)</label>
        <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
      </div>

      <hr style="margin:2.5rem 0 2rem 0; border:none; border-top:1px solid var(--border);">
      <h4 style="margin-bottom:1.5rem; color:var(--p);">Şifre Değiştir (İsteğe Bağlı)</h4>

      <div class="form-group">
        <label for="current_password" class="form-label">Mevcut Şifre</label>
        <input type="password" id="current_password" name="current_password" class="form-control" placeholder="Mevcut şifrenizi girin">
        <small style="color:var(--muted); margin-top:0.5rem; display:block;">Sadece şifrenizi değiştirmek istiyorsanız doldurun.</small>
      </div>

      <div class="form-group">
        <label for="password" class="form-label">Yeni Şifre</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Yeni şifrenizi girin">
      </div>

      <div class="form-group">
        <label for="password_confirmation" class="form-label">Yeni Şifre (Tekrar)</label>
        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Yeni şifrenizi tekrar girin">
      </div>

      <div class="form-group" style="margin-top: 2.5rem; margin-bottom: 0;">
        <button type="submit" class="btn btn--primary">Bilgileri Güncelle</button>
      </div>
    </form>
  </div>
</div>

@endsection
