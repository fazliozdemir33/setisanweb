@extends('layouts.admin')
@section('page_title', 'Medya Kütüphanesi')

@section('content')
<h2 style="font-size:1.1rem;font-weight:600;margin-bottom:1.5rem">Medya Yükle</h2>

<div class="card" style="margin-bottom:2rem">
  <div class="card__body" style="padding:2rem">
    <form action="{{ route('admin.media.store') }}" method="POST" enctype="multipart/form-data" style="display:flex;gap:1rem;align-items:center">
      @csrf
      <input type="file" name="file" class="form-control" accept="image/*,.pdf" style="max-width:400px" required>
      <button type="submit" class="btn btn--primary">Yükle</button>
    </form>
    <p style="margin-top:1rem;color:var(--muted);font-size:.8rem">Yüklenen dosyalar public/storage/media/ dizininde saklanır. İzin verilen formatlar: jpg, jpeg, png, webp, gif, svg, pdf. Max 10MB.</p>
  </div>
</div>

@endsection
