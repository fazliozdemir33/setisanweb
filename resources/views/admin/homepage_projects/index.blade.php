@extends('layouts.admin')
@section('page_title', 'Anasayfa Projeleri')

@section('content')

<div style="display:flex;align-items:flex-start;justify-content:space-between;margin-bottom:1.5rem;gap:1rem;flex-wrap:wrap">
  <div>
    <h2 style="font-size:1.1rem;font-weight:600">Anasayfa Projeleri</h2>
    <p style="font-size:.78rem;color:var(--muted);margin-top:.25rem">
      Sağ sütundaki projeler anasayfada görünür. Sürükleyerek sıralayın veya + / ✕ butonlarıyla ekleyin/çıkarın.
    </p>
  </div>
  <a href="{{ route('admin.projects.index') }}" class="btn btn--outline btn--sm">← Tüm Projeler</a>
</div>

<div id="save-indicator"
  style="display:none;align-items:center;gap:.4rem;font-size:.78rem;color:var(--success);margin-bottom:.75rem;font-weight:600">
  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
    stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>
  Değişiklikler kaydedildi
</div>

<div style="display:grid;grid-template-columns:1fr 1fr;gap:1.5rem;align-items:start">

  {{-- ═══ LEFT: Mevcut / Eklenebilir Projeler ═══ --}}
  <div class="card">
    <div class="card__header">
      <h3>📋 Tüm Aktif Projeler</h3>
      <span style="font-size:.75rem;color:var(--muted)">Anasayfaya eklemek için + butonuna tıklayın</span>
    </div>
    <div style="padding:.5rem 0;max-height:600px;overflow-y:auto">

      {{-- Search --}}
      <div style="padding:.5rem 1rem">
        <input type="text" id="proj-search" placeholder="Proje ara…"
          class="form-control" style="font-size:.8rem;padding:.5rem .75rem">
      </div>

      <table id="available-table" style="font-size:.82rem">
        <thead>
          <tr>
            <th>Proje</th>
            <th>Yıl</th>
            <th style="width:50px"></th>
          </tr>
        </thead>
        <tbody>
          @forelse($available as $p)
          <tr class="avail-row" data-id="{{ $p->id }}" data-name="{{ strtolower($p->title_tr) }}">
            <td>
              <div style="display:flex;align-items:center;gap:.6rem">
                @if($p->cover_image)
                  <img src="{{ asset('storage/' . $p->cover_image) }}"
                    style="width:38px;height:28px;object-fit:cover;border-radius:3px;flex-shrink:0">
                @else
                  <div style="width:38px;height:28px;background:var(--border);border-radius:3px;flex-shrink:0"></div>
                @endif
                <span style="font-weight:500">{{ $p->title_tr }}</span>
              </div>
            </td>
            <td style="color:var(--muted)">{{ $p->year ?? '—' }}</td>
            <td>
              <button class="btn btn--primary btn--sm add-btn" data-id="{{ $p->id }}"
                data-url="{{ route('admin.homepage-projects.toggle', $p->id) }}"
                title="Anasayfaya ekle">+</button>
            </td>
          </tr>
          @empty
          <tr><td colspan="3" style="text-align:center;color:var(--muted);padding:1.5rem">
            Tüm projeler zaten anasayfada.
          </td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  {{-- ═══ RIGHT: Anasayfadaki Projeler (Sıralanabilir) ═══ --}}
  <div class="card">
    <div class="card__header">
      <h3>🏠 Anasayfada Gösterilecekler</h3>
      <span style="font-size:.75rem;color:var(--muted)">Sürükleyerek sıralayın</span>
    </div>
    <div style="padding:.5rem 0;max-height:600px;overflow-y:auto">
      <table>
        <thead>
          <tr>
            <th style="width:32px"></th>
            <th style="width:32px">#</th>
            <th>Proje</th>
            <th style="width:50px"></th>
          </tr>
        </thead>
        <tbody id="featured-body">
          @forelse($featured as $i => $p)
          <tr class="feat-row" data-id="{{ $p->id }}" draggable="true" style="font-size:.82rem">
            <td class="drag-handle" style="cursor:grab;color:var(--muted);padding:.5rem .6rem">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round">
                <circle cx="9"  cy="5"  r="1" fill="currentColor"/>
                <circle cx="15" cy="5"  r="1" fill="currentColor"/>
                <circle cx="9"  cy="12" r="1" fill="currentColor"/>
                <circle cx="15" cy="12" r="1" fill="currentColor"/>
                <circle cx="9"  cy="19" r="1" fill="currentColor"/>
                <circle cx="15" cy="19" r="1" fill="currentColor"/>
              </svg>
            </td>
            <td class="feat-num" style="color:var(--muted);font-weight:600;font-size:.75rem">{{ $i+1 }}</td>
            <td>
              <div style="display:flex;align-items:center;gap:.6rem">
                @if($p->cover_image)
                  <img src="{{ asset('storage/' . $p->cover_image) }}"
                    style="width:38px;height:28px;object-fit:cover;border-radius:3px;flex-shrink:0">
                @else
                  <div style="width:38px;height:28px;background:var(--border);border-radius:3px;flex-shrink:0"></div>
                @endif
                <div>
                  <div style="font-weight:500">{{ $p->title_tr }}</div>
                  @if($p->year)<div style="font-size:.72rem;color:var(--muted)">{{ $p->year }}</div>@endif
                </div>
              </div>
            </td>
            <td>
              <button class="btn btn--danger btn--sm remove-btn" data-id="{{ $p->id }}"
                data-url="{{ route('admin.homepage-projects.toggle', $p->id) }}"
                title="Anasayfadan çıkar">✕</button>
            </td>
          </tr>
          @empty
          <tr id="feat-empty"><td colspan="4" style="text-align:center;color:var(--muted);padding:2rem;font-size:.82rem">
            Henüz proje eklenmemiş. Sol sütundan + ile ekleyin.
          </td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

</div>

<style>
  .feat-row { transition: background .15s; }
  .feat-row.dragging { opacity: .4; background: #f0f4ff; }
  .feat-row.drag-over { background: #e8f0fe; }
  #available-table tbody tr:hover td { background: rgba(248,248,246,.6); }
</style>

<script>
(function () {
  const TOGGLE_CSRF  = '{{ csrf_token() }}';
  const REORDER_URL  = '{{ route("admin.homepage-projects.reorder") }}';
  const featBody     = document.getElementById('featured-body');
  const indicator    = document.getElementById('save-indicator');
  let saveTimer;

  // ── Helpers ──────────────────────────────────────
  function showSaved() {
    indicator.style.display = 'flex';
    clearTimeout(saveTimer);
    saveTimer = setTimeout(() => indicator.style.display = 'none', 2500);
  }

  function refreshNums() {
    featBody.querySelectorAll('.feat-row').forEach((tr, i) => {
      const n = tr.querySelector('.feat-num');
      if (n) n.textContent = i + 1;
    });
    // hide/show empty message
    const empty = document.getElementById('feat-empty');
    if (empty) empty.style.display = featBody.querySelectorAll('.feat-row').length ? 'none' : '';
  }

  async function toggleFeatured(id, url) {
    const res  = await fetch(url, {
      method: 'POST',
      headers: { 'X-CSRF-TOKEN': TOGGLE_CSRF, 'Accept': 'application/json' }
    });
    return res.json();
  }

  async function saveOrder() {
    const items = [...featBody.querySelectorAll('.feat-row')].map((tr, idx) => ({
      id: parseInt(tr.dataset.id), order: idx
    }));
    await fetch(REORDER_URL, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': TOGGLE_CSRF,
        'Accept': 'application/json'
      },
      body: JSON.stringify({ items })
    });
    showSaved();
  }

  // ── Build a featured row from available row data ──
  function buildFeatRow(id, title, year, imgSrc, toggleUrl) {
    const tr = document.createElement('tr');
    tr.className = 'feat-row';
    tr.dataset.id = id;
    tr.setAttribute('draggable', 'true');
    tr.style.fontSize = '.82rem';

    const imgHtml = imgSrc
      ? `<img src="${imgSrc}" style="width:38px;height:28px;object-fit:cover;border-radius:3px;flex-shrink:0">`
      : `<div style="width:38px;height:28px;background:var(--border);border-radius:3px;flex-shrink:0"></div>`;
    const yearHtml = year ? `<div style="font-size:.72rem;color:var(--muted)">${year}</div>` : '';

    tr.innerHTML = `
      <td class="drag-handle" style="cursor:grab;color:var(--muted);padding:.5rem .6rem">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
          <circle cx="9" cy="5" r="1" fill="currentColor"/><circle cx="15" cy="5" r="1" fill="currentColor"/>
          <circle cx="9" cy="12" r="1" fill="currentColor"/><circle cx="15" cy="12" r="1" fill="currentColor"/>
          <circle cx="9" cy="19" r="1" fill="currentColor"/><circle cx="15" cy="19" r="1" fill="currentColor"/>
        </svg>
      </td>
      <td class="feat-num" style="color:var(--muted);font-weight:600;font-size:.75rem">—</td>
      <td><div style="display:flex;align-items:center;gap:.6rem">${imgHtml}<div><div style="font-weight:500">${title}</div>${yearHtml}</div></div></td>
      <td><button class="btn btn--danger btn--sm remove-btn" data-id="${id}" data-url="${toggleUrl}" title="Anasayfadan çıkar">✕</button></td>
    `;
    attachDrag(tr);
    return tr;
  }

  // ── ADD button (left column → right) ──
  document.getElementById('available-table').addEventListener('click', async (e) => {
    const btn = e.target.closest('.add-btn');
    if (!btn) return;
    btn.disabled = true;
    const id  = btn.dataset.id;
    const url = btn.dataset.url;

    try {
      const data = await toggleFeatured(id, url);
      if (!data.is_featured) { btn.disabled = false; return; } // unexpected

      // Move row from available to featured
      const availRow = document.querySelector(`#available-table tr[data-id="${id}"]`);
      const title    = availRow?.querySelector('span')?.textContent ?? '';
      const imgEl    = availRow?.querySelector('img');
      const imgSrc   = imgEl ? imgEl.src : null;
      const yearTd   = availRow?.querySelectorAll('td')[1]?.textContent?.trim();
      const year     = yearTd === '—' ? null : yearTd;

      if (availRow) availRow.remove();

      // Remove empty placeholder in featured
      const empty = document.getElementById('feat-empty');
      if (empty) empty.remove();

      const newRow = buildFeatRow(id, title, year, imgSrc, url);
      featBody.appendChild(newRow);
      refreshNums();
      await saveOrder();
    } catch(err) {
      console.error(err);
      btn.disabled = false;
    }
  });

  // ── REMOVE button (right → left) ──
  featBody.addEventListener('click', async (e) => {
    const btn = e.target.closest('.remove-btn');
    if (!btn) return;
    btn.disabled = true;
    const id  = btn.dataset.id;
    const url = btn.dataset.url;

    try {
      const data = await toggleFeatured(id, url);
      if (data.is_featured) { btn.disabled = false; return; }

      const featRow = featBody.querySelector(`tr[data-id="${id}"]`);
      if (featRow) featRow.remove();
      refreshNums();
      showSaved();

      // Reload page to put it back in available list (simplest UX)
      setTimeout(() => window.location.reload(), 600);
    } catch(err) {
      console.error(err);
      btn.disabled = false;
    }
  });

  // ── Drag-and-drop (featured list) ──
  let dragSrc = null;

  function attachDrag(tr) {
    tr.addEventListener('dragstart', (e) => {
      dragSrc = tr;
      tr.classList.add('dragging');
      e.dataTransfer.effectAllowed = 'move';
      e.dataTransfer.setData('text/plain', tr.dataset.id);
    });
    tr.addEventListener('dragend', () => {
      tr.classList.remove('dragging');
      featBody.querySelectorAll('.drag-over').forEach(r => r.classList.remove('drag-over'));
      dragSrc = null;
      refreshNums();
      saveOrder();
    });
  }

  featBody.addEventListener('dragover', (e) => {
    e.preventDefault();
    const row = e.target.closest('tr.feat-row');
    if (!row || row === dragSrc) return;
    featBody.querySelectorAll('.drag-over').forEach(r => r.classList.remove('drag-over'));
    row.classList.add('drag-over');
    const rect = row.getBoundingClientRect();
    const mid  = rect.top + rect.height / 2;
    featBody.insertBefore(dragSrc, e.clientY < mid ? row : row.nextSibling);
  });

  // Init: attach drag to existing rows
  featBody.querySelectorAll('.feat-row').forEach(attachDrag);
  refreshNums();

  // ── Search filter (left column) ──
  document.getElementById('proj-search').addEventListener('input', function () {
    const q = this.value.toLowerCase().trim();
    document.querySelectorAll('.avail-row').forEach(row => {
      row.style.display = (!q || row.dataset.name.includes(q)) ? '' : 'none';
    });
  });
})();
</script>

@endsection
