<div class="project-grid">
  @forelse($projects as $i => $project)
    <div class="flip-card-wrapper reveal visible" style="transition-delay:{{ ($i % 3) * 0.08 }}s"
      data-href="{{ url(($isTr ? 'tr/projeler' : 'en/projects') . '/' . $project->slug) }}"
      data-status="{{ $project->status }}"
      data-sector="{{ $project->sector ? $project->sector->slug : '' }}"
      data-categories=",{{ $project->categories->pluck('slug')->implode(',') }},">
      <div class="flip-card-inner">

        {{-- FRONT --}}
        <div class="flip-card-front">
          <img src="{{ $project->cover_image ? asset('storage/' . $project->cover_image) : asset('images/extracted/stitched_page_15.jpg') }}"
               alt="{{ $project->title }}" loading="lazy">
          <div class="project-card__overlay">
            <div style="display:flex;gap:0.25rem;flex-wrap:wrap;margin-bottom:0.5rem;">
              @if($project->sector)
                <span class="project-card__tag" style="margin:0">{{ $project->sector->name }}</span>
              @endif
              @foreach($project->categories as $cat)
                <span class="project-card__tag" style="margin:0;background:rgba(255,255,255,0.1);border-color:rgba(255,255,255,0.2);">{{ $isTr ? $cat->name_tr : ($cat->name_en ?? $cat->name_tr) }}</span>
              @endforeach
              @if($project->status === 'ongoing')
                <span class="project-card__tag project-card__tag--ongoing" style="margin:0">{{ $isTr ? 'Devam Ediyor' : 'Ongoing' }}</span>
              @endif
            </div>
            <div class="project-card__meta">
              {{ $project->location }}@if($project->size) · {{ $project->size }}@endif
            </div>
            <h2 class="project-card__title">{{ $project->title }}</h2>
          </div>
        </div>

        {{-- BACK --}}
        <div class="flip-card-back">
          <div style="display:flex;gap:0.25rem;flex-wrap:wrap;justify-content:center;margin-bottom:0.5rem;">
            @if($project->sector)
              <span class="flip-card-back__tag" style="margin:0">{{ $project->sector->name }}</span>
            @endif
            @foreach($project->categories as $cat)
              <span class="flip-card-back__tag" style="margin:0;background:rgba(255,255,255,0.1);border-color:rgba(255,255,255,0.2);">{{ $isTr ? $cat->name_tr : ($cat->name_en ?? $cat->name_tr) }}</span>
            @endforeach
            @if($project->status === 'ongoing')
              <span class="flip-card-back__tag flip-card-back__tag--ongoing" style="margin:0">
                <span style="display:inline-block;width:6px;height:6px;background:#4ade80;border-radius:50%;margin-right:4px;animation:pf-pulse 1.5s infinite;vertical-align:middle;"></span>
                {{ $isTr ? 'Devam Ediyor' : 'Ongoing' }}
              </span>
            @endif
          </div>
          <div class="flip-card-back__title">{{ $project->title }}</div>
          <div class="flip-card-back__divider"></div>
          <div class="flip-card-back__info">
            @if($project->client)
              <div class="flip-card-back__row">
                <span class="flip-card-back__label">{{ $isTr ? 'İşveren' : 'Client' }}</span>
                <span class="flip-card-back__value">{{ $project->client }}</span>
              </div>
            @endif
            @if($project->scope)
              <div class="flip-card-back__row">
                <span class="flip-card-back__label">{{ $isTr ? 'Kapsam' : 'Scope' }}</span>
                <span class="flip-card-back__value">{{ $project->scope }}</span>
              </div>
            @endif
            @if($project->duration)
              <div class="flip-card-back__row">
                <span class="flip-card-back__label">{{ $isTr ? 'Süre' : 'Duration' }}</span>
                <span class="flip-card-back__value">{{ $project->duration }}</span>
              </div>
            @elseif($project->year)
              <div class="flip-card-back__row">
                <span class="flip-card-back__label">{{ $isTr ? 'Yıl' : 'Year' }}</span>
                <span class="flip-card-back__value">{{ $project->year }}</span>
              </div>
            @endif
          </div>
          @if($project->description)
            <div class="flip-card-back__desc">{{ $project->description }}</div>
          @endif
          <a href="{{ url(($isTr ? 'tr/projeler' : 'en/projects') . '/' . $project->slug) }}" class="flip-card-back__btn">
            {{ $isTr ? 'Detayları Gör' : 'View Details' }} →
          </a>
        </div>

      </div>
    </div>
  @empty
    <div style="grid-column:1/-1;text-align:center;padding:4rem 0;color:var(--muted)">
      {{ $isTr ? 'Bu filtrelere uygun proje bulunamadı.' : 'No projects found for these filters.' }}
    </div>
  @endforelse
</div>
