@extends('layouts.admin')
@section('page_title', isset($blog) ? 'Yazı Düzenle' : 'Yeni Yazı')

@section('content')
<div style="max-width:900px">
  <div style="display:flex;align-items:center;gap:1rem;margin-bottom:1.5rem">
    <a href="{{ route('admin.blog.index') }}" class="btn btn--outline btn--sm">← Geri</a>
    <h2 style="font-size:1.1rem;font-weight:600">{{ isset($blog) ? 'Yazı Düzenle' : 'Yeni Yazı Ekle' }}</h2>
  </div>

  <form method="POST"
        action="{{ isset($blog) ? route('admin.blog.update', $blog->id) : route('admin.blog.store') }}"
        enctype="multipart/form-data">
    @csrf
    @if(isset($blog)) @method('PUT') @endif

    <div class="card" style="margin-bottom:1.25rem">
      <div class="card__header"><h3>Yazı Bilgileri</h3></div>
      <div class="card__body" style="padding:1.5rem">
        <div class="form-row">
          <div class="form-group">
            <label class="form-label">Kategori</label>
            <input type="text" name="category" class="form-control" value="{{ old('category', $blog->category ?? '') }}" placeholder="Örn: Endüstri, Haberler">
          </div>
          <div class="form-group">
            <label class="form-label">Yazar</label>
            <input type="text" name="author" class="form-control" value="{{ old('author', $blog->author ?? 'Setisan Elektromekanik') }}">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group">
            <label class="form-label">Yayın Tarihi</label>
            <input type="date" name="published_at" class="form-control" value="{{ old('published_at', isset($blog) && $blog->published_at ? $blog->published_at->format('Y-m-d') : date('Y-m-d')) }}">
          </div>
          <div class="form-group" style="display:flex;align-items:center;gap:.75rem;padding-top:1.5rem">
            <label class="toggle">
              <input type="checkbox" name="is_published" {{ (isset($blog) ? $blog->is_published : true) ? 'checked' : '' }}>
              <span class="toggle-slider"></span>
            </label>
            <span class="form-label" style="margin:0">Yayında</span>
          </div>
        </div>
        <div class="form-group">
          <label class="form-label">Kapak Görseli</label>
          <input type="file" name="cover_image" class="form-control" accept="image/*">
          @if(isset($blog) && $blog->cover_image)
            <img src="{{ asset('storage/' . $blog->cover_image) }}" style="max-width:200px;margin-top:.5rem;border-radius:4px">
          @endif
        </div>
      </div>
    </div>

    <div class="card" style="margin-bottom:1.25rem">
      <div class="card__header">
        <div class="form-tabs" style="border:none;margin:0">
          <div class="form-tab active" onclick="switchTab('tr',this)">🇹🇷 Türkçe</div>
          <div class="form-tab" onclick="switchTab('en',this)">🇬🇧 English</div>
        </div>
      </div>
      <div class="card__body" style="padding:1.5rem">
        <div id="tab-tr">
          <div class="form-group">
            <label class="form-label">Başlık (TR) *</label>
            <input type="text" name="title_tr" class="form-control" required value="{{ old('title_tr', $blog->title_tr ?? '') }}">
          </div>
          <div class="form-group">
            <label class="form-label">Kısa Açıklama (Özet - TR)</label>
            <textarea name="excerpt_tr" class="form-control" rows="3">{{ old('excerpt_tr', $blog->excerpt_tr ?? '') }}</textarea>
          </div>
          <div class="form-group">
            <label class="form-label">İçerik (TR)</label>
            <textarea name="content_tr" class="form-control" rows="12">{{ old('content_tr', $blog->content_tr ?? '') }}</textarea>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label class="form-label">Meta Başlık (TR)</label>
              <input type="text" name="meta_title_tr" class="form-control" value="{{ old('meta_title_tr', $blog->meta_title_tr ?? '') }}">
            </div>
            <div class="form-group">
              <label class="form-label">Meta Açıklama (TR)</label>
              <textarea name="meta_desc_tr" class="form-control" rows="2">{{ old('meta_desc_tr', $blog->meta_desc_tr ?? '') }}</textarea>
            </div>
          </div>
        </div>
        
        <div id="tab-en" style="display:none">
          <div class="form-group">
            <label class="form-label">Title (EN)</label>
            <input type="text" name="title_en" class="form-control" value="{{ old('title_en', $blog->title_en ?? '') }}">
          </div>
          <div class="form-group">
            <label class="form-label">Excerpt (EN)</label>
            <textarea name="excerpt_en" class="form-control" rows="3">{{ old('excerpt_en', $blog->excerpt_en ?? '') }}</textarea>
          </div>
          <div class="form-group">
            <label class="form-label">Content (EN)</label>
            <textarea name="content_en" class="form-control" rows="12">{{ old('content_en', $blog->content_en ?? '') }}</textarea>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label class="form-label">Meta Title (EN)</label>
              <input type="text" name="meta_title_en" class="form-control" value="{{ old('meta_title_en', $blog->meta_title_en ?? '') }}">
            </div>
            <div class="form-group">
              <label class="form-label">Meta Description (EN)</label>
              <textarea name="meta_desc_en" class="form-control" rows="2">{{ old('meta_desc_en', $blog->meta_desc_en ?? '') }}</textarea>
            </div>
          </div>
        </div>
      </div>
    </div>

    <button type="submit" class="btn btn--primary">Kaydet</button>
  </form>
</div>

@push('scripts')
<script>
function switchTab(lang, el) {
  document.querySelectorAll('[id^="tab-"]').forEach(t => t.style.display = 'none');
  document.querySelectorAll('.form-tab').forEach(t => t.classList.remove('active'));
  document.getElementById('tab-' + lang).style.display = 'block';
  el.classList.add('active');
}
</script>
@endpush
@endsection
