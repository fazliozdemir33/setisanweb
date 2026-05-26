<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Yönetim Girişi — Setisan Elektromekanik</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Syne:wght@700;800&display=swap');
    *,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
    body{font-family:'Inter',sans-serif;background:#1B3252;min-height:100vh;display:flex;align-items:center;justify-content:center;padding:2rem}
    .login-box{background:#fff;border-radius:8px;width:100%;max-width:420px;padding:3rem 2.5rem;box-shadow:0 24px 64px rgba(0,0,0,.25)}
    .login-brand{text-align:center;margin-bottom:2.5rem}
    .login-brand h1{font-family:'Syne',sans-serif;font-size:1.75rem;font-weight:800;color:#1B3252}
    .login-brand p{font-size:.75rem;color:#6B7280;letter-spacing:.1em;text-transform:uppercase;margin-top:.25rem}
    .form-group{margin-bottom:1.25rem}
    .form-label{display:block;font-size:.8rem;font-weight:500;color:#1A1A1A;margin-bottom:.4rem}
    .form-control{width:100%;padding:.75rem 1rem;border:1.5px solid #E2E1DB;border-radius:4px;font-size:.9rem;font-family:'Inter',sans-serif;outline:none;transition:border-color .2s}
    .form-control:focus{border-color:#1B3252}
    .btn-login{width:100%;padding:.875rem;background:#1B3252;color:#fff;border:none;border-radius:4px;font-size:.9rem;font-weight:600;cursor:pointer;transition:background .2s;margin-top:.5rem}
    .btn-login:hover{background:#D4621A}
    .alert{padding:.75rem 1rem;border-radius:4px;font-size:.8rem;margin-bottom:1.25rem;background:#fee2e2;color:#991b1b;border:1px solid #fca5a5}
    .login-footer{text-align:center;margin-top:2rem;font-size:.75rem;color:#6B7280}
  </style>
</head>
<body>
  <div class="login-box">
    <div class="login-brand">
      <h1>Setisan</h1>
      <p>Yönetim Paneli</p>
    </div>

    @if(session('error'))
      <div class="alert">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.login.post') }}">
      @csrf
      <div class="form-group">
        <label class="form-label" for="email">E-posta Adresi</label>
        <input type="email" id="email" name="email" class="form-control" required autocomplete="email" value="{{ old('email') }}">
        @error('email')<div style="color:#DC2626;font-size:.75rem;margin-top:.25rem">{{ $message }}</div>@enderror
      </div>
      <div class="form-group">
        <label class="form-label" for="password">Şifre</label>
        <input type="password" id="password" name="password" class="form-control" required autocomplete="current-password">
        @error('password')<div style="color:#DC2626;font-size:.75rem;margin-top:.25rem">{{ $message }}</div>@enderror
      </div>
      <button type="submit" class="btn-login">Giriş Yap</button>
    </form>
    <div class="login-footer">Setisan Elektromekanik &copy; {{ date('Y') }}</div>
  </div>
</body>
</html>
