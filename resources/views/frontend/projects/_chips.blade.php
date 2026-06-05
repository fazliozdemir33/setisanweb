@if(!$currentStatus && !$currentFilter && !$currentCategory)
  <span class="pf-no-filter">{{ $isTr ? 'Tüm projeler gösteriliyor' : 'Showing all projects' }}</span>
@endif
@if($currentStatus)
  <span class="pf-chip">
    <span class="pf-chip__dot" style="background:{{ $currentStatus==='tamamlanan'?'var(--accent)':'#4ade80' }}"></span>
    {{ $currentStatus === 'tamamlanan' ? ($isTr?'Tamamlanan':'Completed') : ($isTr?'Devam Eden':'Ongoing') }}
    <button class="pf-chip__x" data-remove="durum" aria-label="Kaldır">×</button>
  </span>
@endif
@if($currentFilter)
  @php $sec = $sectors->firstWhere('slug',$currentFilter); @endphp
  <span class="pf-chip">
    <span class="pf-chip__dot" style="background:var(--primary)"></span>
    {{ $sec?->name ?? $currentFilter }}
    <button class="pf-chip__x" data-remove="sektor" aria-label="Kaldır">×</button>
  </span>
@endif
@if($currentCategory)
  @php $cat = $categories->firstWhere('slug',$currentCategory); @endphp
  <span class="pf-chip pf-chip--cat">
    {{ $cat ? ($isTr?$cat->name_tr:($cat->name_en??$cat->name_tr)) : $currentCategory }}
    <button class="pf-chip__x" data-remove="kategori" aria-label="Kaldır">×</button>
  </span>
@endif
@if($currentStatus || $currentFilter || $currentCategory)
  <button class="pf-clear" id="pf-clear">{{ $isTr?'Tümünü Temizle':'Clear all' }}</button>
@endif
