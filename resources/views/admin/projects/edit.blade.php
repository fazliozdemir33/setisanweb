@extends('layouts.admin')
@section('page_title', isset($project) ? 'Proje Düzenle' : 'Yeni Proje')

@section('content')
  <div style="max-width:900px">
    <div style="display:flex;align-items:center;gap:1rem;margin-bottom:1.5rem">
      <a href="{{ route('admin.projects.index') }}" class="btn btn--outline btn--sm">← Geri</a>
      <h2 style="font-size:1.1rem;font-weight:600">{{ isset($project) ? 'Proje Düzenle' : 'Yeni Proje Ekle' }}</h2>
    </div>

    <form method="POST"
      action="{{ isset($project) ? route('admin.projects.update', $project->id) : route('admin.projects.store') }}"
      enctype="multipart/form-data">
      @csrf
      @if(isset($project)) @method('PUT') @endif

      <div class="card" style="margin-bottom:1.25rem">
        <div class="card__header">
          <h3>Proje Bilgileri</h3>
        </div>
        <div class="card__body" style="padding:1.5rem">
          <div class="form-row">
            <div class="form-group">
              <label class="form-label">Sektör</label>
              <select name="sector_id" class="form-control">
                <option value="">— Sektör Seç —</option>
                @foreach($sectors as $sec)
                  <option value="{{ $sec->id }}" {{ (old('sector_id', $project->sector_id ?? null) == $sec->id) ? 'selected' : '' }}>{{ $sec->name_tr }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label class="form-label">Proje Etiketleri (Örn: Tasarım, Mekanik)</label>
              <select name="categories[]" class="form-control" multiple style="height: 100px;">
                @foreach($categories as $cat)
                  <option value="{{ $cat->id }}" {{ (isset($project) && $project->categories->contains($cat->id)) || (is_array(old('categories')) && in_array($cat->id, old('categories'))) ? 'selected' : '' }}>
                    {{ $cat->name_tr }}
                  </option>
                @endforeach
              </select>
              <div style="font-size: 0.8rem; color: var(--muted); margin-top: 0.25rem;">Birden fazla seçmek için CTRL / CMD tuşuna basılı tutun.</div>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label class="form-label">Durum</label>
              <select name="status" class="form-control">
                <option value="completed" {{ old('status', $project->status ?? 'completed') === 'completed' ? 'selected' : '' }}>Tamamlandı</option>
                <option value="ongoing" {{ old('status', $project->status ?? '') === 'ongoing' ? 'selected' : '' }}>Devam Ediyor</option>
              </select>
            </div>
            <div class="form-group">
              <label class="form-label">Yıl</label>
              <input type="number" name="year" class="form-control" min="2000" max="2099"
                value="{{ old('year', $project->year ?? date('Y')) }}">
            </div>
          </div>
            <div class="form-group" style="display:flex;gap:2rem;padding-top:1.5rem">
              <label style="display:flex;align-items:center;gap:.5rem;cursor:pointer;font-size:.875rem">
                <input type="checkbox" name="is_active" {{ (isset($project) ? $project->is_active : true) ? 'checked' : '' }}> Aktif
              </label>

            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label class="form-label">Kapak Görseli</label>
              <input type="file" name="cover_image" class="form-control" accept="image/*">
              @if(isset($project) && $project->cover_image)
                <img src="{{ asset('storage/' . ltrim($project->cover_image, 'public/')) }}"
                  style="max-width:200px;margin-top:.5rem;border-radius:4px" onerror="this.style.display='none'">
              @endif
            </div>
            <div class="form-group">
              <label class="form-label">Galeri Fotoğrafları (Birden Fazla Seçebilirsiniz)</label>
              <input type="file" name="gallery_images[]" class="form-control" accept="image/*" multiple>
              @if(isset($project) && $project->gallery->count())
                <div style="display:flex;gap:.5rem;margin-top:.5rem;flex-wrap:wrap">
                  @foreach($project->gallery as $img)
                    <img src="{{ asset('storage/' . ltrim($img->image_path, 'public/')) }}"
                      style="max-height:50px;border-radius:4px" onerror="this.style.display='none'">
                  @endforeach
                </div>
              @endif
            </div>
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
              <label class="form-label">Proje Adı (TR) *</label>
              <input type="text" name="title_tr" class="form-control" required
                value="{{ old('title_tr', $project->title_tr ?? '') }}">
            </div>
            <div class="form-row">
              <div class="form-group">
                <label class="form-label">Lokasyon (TR)</label>
                <input type="text" name="location_tr" class="form-control"
                  value="{{ old('location_tr', $project->location_tr ?? '') }}">
              </div>
              <div class="form-group">
                <label class="form-label">Alan/Büyüklük (TR)</label>
                <input type="text" name="size_tr" class="form-control" placeholder="Örn: 80.000 m² veya 7.500 kişilik"
                  value="{{ old('size_tr', $project->size_tr ?? '') }}">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group">
                <label class="form-label">İşveren / Müşteri (TR)</label>
                <input type="text" name="client_tr" class="form-control"
                  value="{{ old('client_tr', $project->client_tr ?? '') }}">
              </div>
              <div class="form-group">
                <label class="form-label">Süre / Tarih (TR)</label>
                <input type="text" name="duration_tr" class="form-control"
                  value="{{ old('duration_tr', $project->duration_tr ?? '') }}">
              </div>
            </div>
            <div class="form-group">
              <label class="form-label">Kapsam (TR)</label>
              <textarea name="scope_tr" class="form-control"
                rows="2">{{ old('scope_tr', $project->scope_tr ?? '') }}</textarea>
            </div>
            <div class="form-group">
              <label class="form-label">Açıklama (TR)</label>
              <textarea name="description_tr" class="form-control"
                rows="8">{{ old('description_tr', $project->description_tr ?? '') }}</textarea>
            </div>
            <div class="form-row">
              <div class="form-group">
                <label class="form-label">Meta Başlık (TR)</label>
                <input type="text" name="meta_title_tr" class="form-control"
                  value="{{ old('meta_title_tr', $project->meta_title_tr ?? '') }}">
              </div>
              <div class="form-group">
                <label class="form-label">Meta Açıklama (TR)</label>
                <textarea name="meta_desc_tr" class="form-control"
                  rows="2">{{ old('meta_desc_tr', $project->meta_desc_tr ?? '') }}</textarea>
              </div>
            </div>
          </div>
          <div id="tab-en" style="display:none">
            <div class="form-group">
              <label class="form-label">Project Name (EN)</label>
              <input type="text" name="title_en" class="form-control"
                value="{{ old('title_en', $project->title_en ?? '') }}">
            </div>
            <div class="form-row">
              <div class="form-group">
                <label class="form-label">Location (EN)</label>
                <input type="text" name="location_en" class="form-control"
                  value="{{ old('location_en', $project->location_en ?? '') }}">
              </div>
              <div class="form-group">
                <label class="form-label">Size/Area (EN)</label>
                <input type="text" name="size_en" class="form-control"
                  value="{{ old('size_en', $project->size_en ?? '') }}">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group">
                <label class="form-label">Client (EN)</label>
                <input type="text" name="client_en" class="form-control"
                  value="{{ old('client_en', $project->client_en ?? '') }}">
              </div>
              <div class="form-group">
                <label class="form-label">Duration/Date (EN)</label>
                <input type="text" name="duration_en" class="form-control"
                  value="{{ old('duration_en', $project->duration_en ?? '') }}">
              </div>
            </div>
            <div class="form-group">
              <label class="form-label">Scope (EN)</label>
              <textarea name="scope_en" class="form-control"
                rows="2">{{ old('scope_en', $project->scope_en ?? '') }}</textarea>
            </div>
            <div class="form-group">
              <label class="form-label">Description (EN)</label>
              <textarea name="description_en" class="form-control"
                rows="8">{{ old('description_en', $project->description_en ?? '') }}</textarea>
            </div>
            <div class="form-row">
              <div class="form-group">
                <label class="form-label">Meta Title (EN)</label>
                <input type="text" name="meta_title_en" class="form-control"
                  value="{{ old('meta_title_en', $project->meta_title_en ?? '') }}">
              </div>
              <div class="form-group">
                <label class="form-label">Meta Description (EN)</label>
                <textarea name="meta_desc_en" class="form-control"
                  rows="2">{{ old('meta_desc_en', $project->meta_desc_en ?? '') }}</textarea>
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