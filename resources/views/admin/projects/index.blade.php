@extends('layouts.admin')
@section('page_title', 'Projeler')

@section('content')
<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1.5rem">
  <div>
    <h2 style="font-size:1.1rem;font-weight:600">Projeler</h2>
    <p style="font-size:.78rem;color:var(--muted);margin-top:.2rem">Satırı sürükleyerek veya ok butonlarıyla sıralayın. Sıra otomatik kaydedilir.</p>
  </div>
  <a href="{{ route('admin.projects.create') }}" class="btn btn--primary">+ Yeni Proje</a>
</div>

@if(session('success'))
  <div class="alert alert--success" style="margin-bottom:1rem">{{ session('success') }}</div>
@endif

{{-- Save indicator --}}
<div id="save-indicator" style="display:none;align-items:center;gap:.5rem;font-size:.78rem;color:var(--success);margin-bottom:.75rem;font-weight:600">
  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
  Sıralama kaydedildi
</div>

<div class="card">
  <table id="projects-table">
    <thead>
      <tr>
        <th style="width:40px"></th>{{-- drag handle --}}
        <th style="width:42px">Sıra</th>
        <th>Proje Adı</th>
        <th>Sektör</th>
        <th>Yıl</th>
        <th>Durum</th>
        <th style="text-align:right">İşlemler</th>
      </tr>
    </thead>
    <tbody id="sortable-body">
      @forelse($projects as $i => $project)
      <tr data-id="{{ $project->id }}" class="sortable-row">
        {{-- Drag handle --}}
        <td class="drag-handle" title="Sürükle">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="cursor:grab;color:var(--muted)">
            <circle cx="9" cy="5" r="1" fill="currentColor"/><circle cx="15" cy="5" r="1" fill="currentColor"/>
            <circle cx="9" cy="12" r="1" fill="currentColor"/><circle cx="15" cy="12" r="1" fill="currentColor"/>
            <circle cx="9" cy="19" r="1" fill="currentColor"/><circle cx="15" cy="19" r="1" fill="currentColor"/>
          </svg>
        </td>
        {{-- Order number --}}
        <td>
          <div style="display:flex;flex-direction:column;gap:2px">
            <button class="order-btn order-btn--up" data-dir="up" title="Yukarı taşı" {{ $loop->first ? 'disabled' : '' }}>▲</button>
            <span class="order-num" style="text-align:center;font-size:.75rem;font-weight:600;color:var(--muted)">{{ $i + 1 }}</span>
            <button class="order-btn order-btn--down" data-dir="down" title="Aşağı taşı" {{ $loop->last ? 'disabled' : '' }}>▼</button>
          </div>
        </td>
        <td style="font-weight:500">
          {{ $project->title_tr }}
          @if(!$project->is_active)<span style="font-size:.7rem;color:var(--danger);margin-left:.4rem">(Pasif)</span>@endif
        </td>
        <td><span class="badge badge--blue">{{ $project->sector?->name_tr ?? '—' }}</span></td>
        <td style="color:var(--muted)">{{ $project->year ?? '—' }}</td>
        <td>
          <span class="badge {{ $project->is_active ? 'badge--green' : 'badge--red' }}">
            {{ $project->is_active ? 'Aktif' : 'Pasif' }}
          </span>
        </td>
        <td style="text-align:right;white-space:nowrap">
          <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn--outline btn--sm">Düzenle</a>
          <form method="POST" action="{{ route('admin.projects.destroy', $project->id) }}" style="display:inline"
            onsubmit="return confirm('Silmek istediğinizden emin misiniz?')">
            @csrf @method('DELETE')
            <button class="btn btn--danger btn--sm">Sil</button>
          </form>
        </td>
      </tr>
      @empty
      <tr><td colspan="7" style="text-align:center;color:var(--muted);padding:2rem">Henüz proje yok.</td></tr>
      @endforelse
    </tbody>
  </table>
</div>

<style>
  .drag-handle { cursor: grab; padding: .5rem .75rem; }
  .drag-handle:active { cursor: grabbing; }
  .sortable-row { transition: background 0.15s; }
  .sortable-row.dragging { opacity: 0.45; background: #f0f4ff; }
  .sortable-row.drag-over { background: #e8f0fe; }

  .order-btn {
    display: block;
    width: 22px; height: 18px;
    font-size: .6rem;
    line-height: 1;
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 3px;
    cursor: pointer;
    color: var(--dark);
    transition: background .15s;
    padding: 0;
  }
  .order-btn:hover:not(:disabled) { background: var(--border); }
  .order-btn:disabled { opacity: .3; cursor: default; }
</style>

<script>
(function () {
  const REORDER_URL = '{{ route("admin.projects.reorder") }}';
  const CSRF        = '{{ csrf_token() }}';
  const tbody       = document.getElementById('sortable-body');
  const indicator   = document.getElementById('save-indicator');

  let saveTimer;

  // ── Collect current order ──
  function getOrder() {
    return [...tbody.querySelectorAll('tr[data-id]')].map((tr, idx) => ({
      id: parseInt(tr.dataset.id),
      order: idx
    }));
  }

  // ── Refresh row numbers & arrow disabled states ──
  function refreshUI() {
    const rows = [...tbody.querySelectorAll('tr[data-id]')];
    rows.forEach((tr, idx) => {
      const num  = tr.querySelector('.order-num');
      const up   = tr.querySelector('.order-btn--up');
      const down = tr.querySelector('.order-btn--down');
      if (num)  num.textContent  = idx + 1;
      if (up)   up.disabled   = idx === 0;
      if (down) down.disabled = idx === rows.length - 1;
    });
  }

  // ── Send order to server ──
  function saveOrder() {
    clearTimeout(saveTimer);
    saveTimer = setTimeout(async () => {
      const items = getOrder();
      try {
        const res = await fetch(REORDER_URL, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': CSRF,
            'Accept': 'application/json'
          },
          body: JSON.stringify({ items })
        });
        if (res.ok) {
          indicator.style.display = 'flex';
          setTimeout(() => indicator.style.display = 'none', 2500);
        }
      } catch (e) {
        console.error('Reorder failed', e);
      }
    }, 600); // debounce 600ms
  }

  // ── Up / Down arrow buttons ──
  tbody.addEventListener('click', (e) => {
    const btn = e.target.closest('.order-btn');
    if (!btn) return;
    const tr  = btn.closest('tr');
    if (btn.classList.contains('order-btn--up') && tr.previousElementSibling) {
      tbody.insertBefore(tr, tr.previousElementSibling);
    } else if (btn.classList.contains('order-btn--down') && tr.nextElementSibling) {
      tbody.insertBefore(tr.nextElementSibling, tr);
    }
    refreshUI();
    saveOrder();
  });

  // ── Drag-and-drop ──
  let dragSrc = null;

  tbody.addEventListener('dragstart', (e) => {
    const handle = e.target.closest('.drag-handle');
    const row    = e.target.closest('tr[data-id]');
    if (!row) { e.preventDefault(); return; }
    dragSrc = row;
    row.classList.add('dragging');
    e.dataTransfer.effectAllowed = 'move';
    e.dataTransfer.setData('text/plain', row.dataset.id);
  });

  tbody.addEventListener('dragover', (e) => {
    e.preventDefault();
    const row = e.target.closest('tr[data-id]');
    if (!row || row === dragSrc) return;
    [...tbody.querySelectorAll('.drag-over')].forEach(r => r.classList.remove('drag-over'));
    row.classList.add('drag-over');
    // Insert above or below based on cursor position
    const rect = row.getBoundingClientRect();
    const mid  = rect.top + rect.height / 2;
    if (e.clientY < mid) {
      tbody.insertBefore(dragSrc, row);
    } else {
      tbody.insertBefore(dragSrc, row.nextSibling);
    }
  });

  tbody.addEventListener('dragend', () => {
    if (dragSrc) dragSrc.classList.remove('dragging');
    [...tbody.querySelectorAll('.drag-over')].forEach(r => r.classList.remove('drag-over'));
    dragSrc = null;
    refreshUI();
    saveOrder();
  });

  // Make rows draggable via handle
  [...tbody.querySelectorAll('tr[data-id]')].forEach(tr => {
    tr.setAttribute('draggable', 'true');
  });

  refreshUI();
})();
</script>
@endsection
