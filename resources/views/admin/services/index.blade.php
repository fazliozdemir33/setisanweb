@extends('layouts.admin')
@section('page_title', 'Hizmetler')

@section('content')
<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1.5rem">
  <h2 style="font-size:1.1rem;font-weight:600">Hizmetler</h2>
  <a href="{{ route('admin.services.create') }}" class="btn btn--primary">+ Yeni Hizmet</a>
</div>

<div class="card">
  <div class="card__body">
    <table>
      <thead>
        <tr>
          <th>Sıra</th>
          <th>Başlık (TR)</th>
          <th>Tür</th>
          <th>Durum</th>
          <th>İşlemler</th>
        </tr>
      </thead>
      <tbody>
        @forelse($parents as $parent)
        {{-- Ana Hizmet satırı --}}
        <tr style="background: #f5f5f5;">
          <td style="color:var(--muted)">{{ $parent->order_index }}</td>
          <td style="font-weight:700; color:var(--primary)">
            📁 {{ $parent->title_tr }}
            @if($parent->title_en)
              <span style="font-weight:400; color:var(--muted); font-size:0.85rem"> / {{ $parent->title_en }}</span>
            @endif
          </td>
          <td><span class="badge" style="background:#e8f0fe;color:#1a73e8;border:none">Ana Hizmet</span></td>
          <td>
            <span class="badge {{ $parent->is_active ? 'badge--green' : 'badge--red' }}">
              {{ $parent->is_active ? 'Aktif' : 'Pasif' }}
            </span>
          </td>
          <td style="display:flex;gap:.5rem">
            <a href="{{ route('admin.services.edit', $parent->id) }}" class="btn btn--outline btn--sm">Düzenle</a>
            <form method="POST" action="{{ route('admin.services.destroy', $parent->id) }}" onsubmit="return confirm('Bu ana hizmeti ve tüm alt hizmetlerini silmek istiyor musunuz?')">
              @csrf @method('DELETE')
              <button class="btn btn--danger btn--sm">Sil</button>
            </form>
          </td>
        </tr>

        {{-- Alt Hizmet satırları --}}
        @foreach($parent->children as $child)
        <tr>
          <td style="color:var(--muted); padding-left:2.5rem">{{ $child->order_index }}</td>
          <td style="padding-left:2.5rem">
            <span style="color:var(--muted); margin-right:.5rem">└</span>
            <span style="font-weight:500">{{ $child->title_tr }}</span>
            @if($child->title_en)
              <span style="font-weight:400; color:var(--muted); font-size:0.85rem"> / {{ $child->title_en }}</span>
            @endif
          </td>
          <td><span class="badge" style="background:#fce8e6;color:#d93025;border:none">Alt Hizmet</span></td>
          <td>
            <span class="badge {{ $child->is_active ? 'badge--green' : 'badge--red' }}">
              {{ $child->is_active ? 'Aktif' : 'Pasif' }}
            </span>
          </td>
          <td style="display:flex;gap:.5rem">
            <a href="{{ route('admin.services.edit', $child->id) }}" class="btn btn--outline btn--sm">Düzenle</a>
            <form method="POST" action="{{ route('admin.services.destroy', $child->id) }}" onsubmit="return confirm('Silmek istediğinizden emin misiniz?')">
              @csrf @method('DELETE')
              <button class="btn btn--danger btn--sm">Sil</button>
            </form>
          </td>
        </tr>
        @endforeach

        @empty
        <tr><td colspan="5" style="text-align:center;color:var(--muted);padding:2rem">Henüz hizmet yok.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
