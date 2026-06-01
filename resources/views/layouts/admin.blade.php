<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Yönetim Paneli — Setisan Elektromekanik</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
    *,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
    :root{
      --p:#1B3252;--a:#D4621A;--white:#fff;--surface:#F8F8F6;
      --border:#E2E1DB;--dark:#1A1A1A;--muted:#6B7280;--danger:#DC2626;--success:#16A34A;
    }
    body{font-family:'Inter',sans-serif;background:var(--surface);color:var(--dark);display:flex;min-height:100vh}
    a{color:inherit;text-decoration:none}

        .sidebar{width:260px;background:var(--p);display:flex;flex-direction:column;min-height:100vh;flex-shrink:0;position:sticky;top:0;height:100vh;overflow-y:auto}
    .sidebar__brand{padding:1.75rem 1.5rem;border-bottom:1px solid rgba(255,255,255,.1)}
    .sidebar__brand-name{color:#fff;font-size:1.1rem;font-weight:700;letter-spacing:.01em}
    .sidebar__brand-sub{color:rgba(255,255,255,.4);font-size:.7rem;letter-spacing:.1em;text-transform:uppercase;margin-top:.2rem}
    .sidebar__admin{padding:1rem 1.5rem;border-bottom:1px solid rgba(255,255,255,.1);font-size:.8rem;color:rgba(255,255,255,.5)}
    .sidebar__admin strong{display:block;color:rgba(255,255,255,.8);font-weight:500}
    .sidebar__nav{padding:1rem 0;flex:1}
    .sidebar__group{padding:.5rem 1.5rem .25rem;font-size:.65rem;font-weight:600;letter-spacing:.12em;text-transform:uppercase;color:rgba(255,255,255,.3);margin-top:.5rem}
    .sidebar__link{display:flex;align-items:center;gap:.75rem;padding:.65rem 1.5rem;color:rgba(255,255,255,.65);font-size:.875rem;font-weight:500;transition:all .2s}
    .sidebar__link:hover,.sidebar__link.active{color:#fff;background:rgba(255,255,255,.08)}
    .sidebar__link.active{border-left:3px solid var(--a)}
    .sidebar__link-icon{width:18px;text-align:center;opacity:.7}
    .sidebar__footer{padding:1.25rem 1.5rem;border-top:1px solid rgba(255,255,255,.1)}

        .main{flex:1;display:flex;flex-direction:column;min-width:0}
    .topbar{background:#fff;border-bottom:1px solid var(--border);padding:.875rem 2rem;display:flex;align-items:center;justify-content:space-between;position:sticky;top:0;z-index:10}
    .topbar__title{font-size:1rem;font-weight:600}
    .topbar__actions{display:flex;gap:.75rem;align-items:center}
    .content{padding:2rem;flex:1}

        .dash-stats{display:grid;grid-template-columns:repeat(4,1fr);gap:1.25rem;margin-bottom:2rem}
    .stat-card{background:#fff;border:1px solid var(--border);border-radius:6px;padding:1.5rem}
    .stat-card__num{font-size:2.25rem;font-weight:700;color:var(--p);line-height:1}
    .stat-card__label{font-size:.8rem;color:var(--muted);margin-top:.4rem}
    .stat-card__icon{font-size:1.5rem;margin-bottom:.75rem;opacity:.6}

        .card{background:#fff;border:1px solid var(--border);border-radius:6px;overflow:hidden}
    .card__header{padding:1rem 1.5rem;border-bottom:1px solid var(--border);display:flex;align-items:center;justify-content:space-between}
    .card__header h3{font-size:.95rem;font-weight:600}
    .card__body{padding:0}
    table{width:100%;border-collapse:collapse;font-size:.875rem}
    th{background:var(--surface);padding:.75rem 1rem;text-align:left;font-weight:600;font-size:.75rem;letter-spacing:.05em;text-transform:uppercase;color:var(--muted);border-bottom:1px solid var(--border)}
    td{padding:.875rem 1rem;border-bottom:1px solid var(--border);vertical-align:middle}
    tr:last-child td{border-bottom:none}
    tr:hover td{background:rgba(248,248,246,.6)}

        .btn{display:inline-flex;align-items:center;gap:.4rem;padding:.5rem 1.1rem;border-radius:4px;font-size:.8rem;font-weight:600;cursor:pointer;border:1.5px solid transparent;transition:all .2s;text-decoration:none}
    .btn--sm{padding:.35rem .85rem;font-size:.75rem}
    .btn--primary{background:var(--p);color:#fff;border-color:var(--p)}
    .btn--primary:hover{background:#122240}
    .btn--accent{background:var(--a);color:#fff;border-color:var(--a)}
    .btn--accent:hover{background:#b8521a}
    .btn--outline{background:transparent;color:var(--dark);border-color:var(--border)}
    .btn--outline:hover{border-color:var(--dark)}
    .btn--danger{background:var(--danger);color:#fff;border-color:var(--danger)}

        .form-group{margin-bottom:1.25rem}
    .form-label{display:block;font-size:.8rem;font-weight:500;color:var(--dark);margin-bottom:.4rem}
    .form-control{width:100%;padding:.7rem .9rem;border:1.5px solid var(--border);border-radius:4px;font-family:'Inter',sans-serif;font-size:.875rem;outline:none;transition:border-color .2s}
    .form-control:focus{border-color:var(--p)}
    textarea.form-control{resize:vertical;min-height:120px}
    .form-row{display:grid;grid-template-columns:1fr 1fr;gap:1rem}
    .form-tabs{display:flex;gap:0;border-bottom:1px solid var(--border);margin-bottom:1.5rem}
    .form-tab{padding:.6rem 1.25rem;font-size:.8rem;font-weight:600;cursor:pointer;border-bottom:2px solid transparent;margin-bottom:-1px;transition:all .2s;color:var(--muted)}
    .form-tab.active{color:var(--p);border-color:var(--p)}

        .badge{display:inline-block;padding:.2rem .6rem;border-radius:3px;font-size:.7rem;font-weight:600;letter-spacing:.05em}
    .badge--green{background:#d1fae5;color:#065f46}
    .badge--yellow{background:#fef3c7;color:#92400e}
    .badge--red{background:#fee2e2;color:#991b1b}
    .badge--blue{background:#dbeafe;color:#1e40af}

        .alert{padding:.85rem 1.25rem;border-radius:4px;font-size:.8rem;margin-bottom:1.25rem}
    .alert--success{background:#d1fae5;color:#065f46;border:1px solid #6ee7b7}
    .alert--error{background:#fee2e2;color:#991b1b;border:1px solid #fca5a5}

        .toggle{position:relative;display:inline-block;width:40px;height:22px}
    .toggle input{opacity:0;width:0;height:0}
    .toggle-slider{position:absolute;inset:0;background:var(--border);border-radius:22px;cursor:pointer;transition:.3s}
    .toggle input:checked + .toggle-slider{background:var(--success)}
    .toggle-slider::before{content:'';position:absolute;width:16px;height:16px;left:3px;bottom:3px;background:#fff;border-radius:50%;transition:.3s}
    .toggle input:checked + .toggle-slider::before{transform:translateX(18px)}

    @media(max-width:900px){
      .sidebar{width:220px}
      .dash-stats{grid-template-columns:1fr 1fr}
    }
  </style>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.3/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body>

<aside class="sidebar">
  <div class="sidebar__brand">
    <div class="sidebar__brand-name">Setisan</div>
    <div class="sidebar__brand-sub">Yönetim Paneli</div>
  </div>
  <div class="sidebar__admin">
    <span>Hoşgeldiniz,</span>
    <strong>{{ session('admin_name', 'Admin') }}</strong>
  </div>
  <nav class="sidebar__nav">
    <div class="sidebar__group">Genel</div>
    <a href="{{ route('admin.dashboard') }}" class="sidebar__link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
      <span class="sidebar__link-icon">⊞</span> Dashboard
    </a>

    <div class="sidebar__group">İçerikler</div>
    <a href="{{ route('admin.services.index') }}" class="sidebar__link {{ request()->routeIs('admin.services*') ? 'active' : '' }}">
      <span class="sidebar__link-icon">⚙</span> Hizmetler
    </a>
    <a href="{{ route('admin.projects.index') }}" class="sidebar__link {{ request()->routeIs('admin.projects*') ? 'active' : '' }}">
      <span class="sidebar__link-icon">◈</span> Projeler
    </a>
    <a href="{{ route('admin.homepage-projects.index') }}" class="sidebar__link {{ request()->routeIs('admin.homepage-projects*') ? 'active' : '' }}" style="padding-left:2.25rem;font-size:.82rem">
      <span class="sidebar__link-icon" style="font-size:.7rem">↳</span> Anasayfa Projeleri
    </a>
    <a href="{{ route('admin.sectors.index') }}" class="sidebar__link {{ request()->routeIs('admin.sectors*') ? 'active' : '' }}">
      <span class="sidebar__link-icon">⊟</span> Proje Sektörleri
    </a>
    <a href="{{ route('admin.project-categories.index') }}" class="sidebar__link {{ request()->routeIs('admin.project-categories*') ? 'active' : '' }}">
      <span class="sidebar__link-icon">🏷️</span> Proje Etiketleri / Kategorileri
    </a>

    <a href="{{ route('admin.partners.index') }}" class="sidebar__link {{ request()->routeIs('admin.partners*') ? 'active' : '' }}">
      <span class="sidebar__link-icon">★</span> Referanslar
    </a>
    <a href="{{ route('admin.solution-partners.index') }}" class="sidebar__link {{ request()->routeIs('admin.solution-partners*') ? 'active' : '' }}">
      <span class="sidebar__link-icon">⬡</span> Çözüm Ortakları
    </a>

    <div class="sidebar__group">Kurumsal Sayfalar</div>
    <a href="{{ route('admin.pages.edit', 'anasayfa') }}" class="sidebar__link {{ request()->is('yonetim/sayfalar/anasayfa*') ? 'active' : '' }}">
      <span class="sidebar__link-icon">🏠</span> Anasayfa
    </a>
    <a href="{{ route('admin.pages.edit', 'hakkimizda') }}" class="sidebar__link {{ request()->is('yonetim/sayfalar/hakkimizda*') ? 'active' : '' }}">
      <span class="sidebar__link-icon">▤</span> Hakkımızda
    </a>

    <div class="sidebar__group">Sistem</div>
    <a href="{{ route('admin.messages.index') }}" class="sidebar__link {{ request()->routeIs('admin.messages*') ? 'active' : '' }}">
      <span class="sidebar__link-icon">✉</span> Mesajlar
    </a>
    <a href="{{ route('admin.settings.index') }}" class="sidebar__link {{ request()->routeIs('admin.settings*') ? 'active' : '' }}">
      <span class="sidebar__link-icon">⚒</span> Site Ayarları
    </a>
    <a href="{{ route('admin.profile.index') }}" class="sidebar__link {{ request()->routeIs('admin.profile*') ? 'active' : '' }}">
      <span class="sidebar__link-icon">⍟</span> Profil Ayarları
    </a>
  </nav>
  <div class="sidebar__footer">
    <form method="POST" action="{{ route('admin.logout') }}">
      @csrf
      <button type="submit" class="btn btn--outline" style="width:100%;justify-content:center;color:rgba(255,255,255,.6);border-color:rgba(255,255,255,.15)">
        ⏻ Çıkış Yap
      </button>
    </form>
  </div>
</aside>

<div class="main">
  <div class="topbar">
    <div class="topbar__title">@yield('page_title', 'Dashboard')</div>
    <div class="topbar__actions">
      <a href="{{ url('tr') }}" target="_blank" class="btn btn--outline btn--sm">Siteyi Görüntüle</a>
    </div>
  </div>

  <div class="content">
    @if(session('success'))
      <div class="alert alert--success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
      <div class="alert alert--error">✕ {{ session('error') }}</div>
    @endif
    @if($errors->any())
      <div class="alert alert--error">
        <strong style="display:block;margin-bottom:0.5rem">Lütfen aşağıdaki hataları düzeltin:</strong>
        <ul style="margin-left: 1.5rem">
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    @yield('content')
  </div>
</div>

@stack('scripts')
</body>
</html>
