@extends('layouts.admin')
@section('page_title', 'Çözüm Ortakları (Markalar)')

@section('content')
<div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:1.5rem">
  <div>
    <h2 style="font-size:1.1rem;font-weight:600">Çözüm Ortakları — Ekipman Markaları</h2>
    <p style="font-size:.78rem;color:var(--muted);margin-top:.2rem">Anasayfada kayan bant olarak gösterilir. Aktif/Pasif toggle ile istediğin zaman görünür yaparsın.</p>
  </div>
  <a href="{{ route('admin.solution-partners.create') }}" class="btn btn--primary btn--sm">+ Marka Ekle</a>
</div>

@if(session('success'))
  <div class="alert alert--success" style="margin-bottom:1rem">{{ session('success') }}</div>
@endif

<div class="card">
  <table>
    <thead>
      <tr>
        <th style="width:70px">Logo</th>
        <th>Marka Adı</th>
        <th>Web Sitesi</th>
        <th style="width:60px">Sıra</th>
        <th style="width:90px">Durum</th>
        <th style="text-align:right">İşlemler</th>
      </tr>
    </thead>
    <tbody>
      @forelse($partners as $p)
      <tr id="sp-row-{{ $p->id }}">
        <td>
          @if($p->logo)
            <img src="{{ asset('storage/' . $p->logo) }}" alt="{{ $p->name }}"
              style="height:36px;max-width:80px;object-fit:contain;border-radius:4px;background:#f4f4f4;padding:2px">
          @else
            <span style="color:var(--muted);font-size:.75rem">Yok</span>
          @endif
        </td>
        <td style="font-weight:500">{{ $p->name }}</td>
        <td style="color:var(--muted);font-size:.8rem">
          @if($p->website)
            <a href="{{ $p->website }}" target="_blank" style="color:var(--accent)">{{ $p->website }}</a>
          @else —
          @endif
        </td>
        <td style="color:var(--muted)">{{ $p->order_index }}</td>
        <td>
          {{-- Toggle switch --}}
          <label class="toggle" title="{{ $p->is_active ? 'Aktif — tıkla kapatmak için' : 'Pasif — tıkla açmak için' }}">
            <input type="checkbox" class="sp-toggle" data-id="{{ $p->id }}"
              data-url="{{ route('admin.solution-partners.toggle', $p) }}"
              {{ $p->is_active ? 'checked' : '' }}>
            <span class="toggle-slider"></span>
          </label>
        </td>
        <td style="text-align:right;white-space:nowrap">
          <a href="{{ route('admin.solution-partners.edit', $p) }}" class="btn btn--outline btn--sm">Düzenle</a>
          <form method="POST" action="{{ route('admin.solution-partners.destroy', $p) }}" style="display:inline"
            onsubmit="return confirm('Bu markayı silmek istediğinizden emin misiniz?')">
            @csrf @method('DELETE')
            <button class="btn btn--danger btn--sm">Sil</button>
          </form>
        </td>
      </tr>
      @empty
      <tr><td colspan="6" style="text-align:center;color:var(--muted);padding:2rem">Henüz marka eklenmemiş.</td></tr>
      @endforelse
    </tbody>
  </table>
</div>

<script>
document.querySelectorAll('.sp-toggle').forEach(toggle => {
  toggle.addEventListener('change', async function() {
    const url  = this.dataset.url;
    const csrf = '{{ csrf_token() }}';
    try {
      const res = await fetch(url, {
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': csrf, 'Accept': 'application/json' }
      });
      const data = await res.json();
      this.checked = data.is_active;
    } catch(e) {
      this.checked = !this.checked; // revert on error
      console.error(e);
    }
  });
});
</script>
@endsection
