@extends('layouts.app')
@php $locale = app()->getLocale();
$isTr = $locale === 'tr'; @endphp

@section('meta_title', $isTr ? 'Projeler & Referanslar — Setisan Elektromekanik' : 'Projects & References — Setisan Elektromekanik')
@section('meta_desc', $isTr ? 'Tamamladığımız kurumsal mekanik ve elektrik projelerini inceleyin.' : 'Explore our completed institutional mechanical and electrical projects.')

@section('content')

  <div class="page-header">
    <div class="container">

      <h1>{{ $isTr ? 'Projeler & Referanslar' : 'Projects & References' }}</h1>
      <p>
        {{ $isTr ? 'Kurumsal ve sanayi yapılarında gerçekleştirdiğimiz elektromekanik projelerin seçkisi.' : 'A selection of electromechanical projects carried out in institutional and industrial buildings.' }}
      </p>
    </div>
  </div>

  <section class="section">
    <div class="container">

      <div class="filter-tabs reveal">
        <a href="{{ url($isTr ? 'tr/projeler' : 'en/projects') }}"
          class="filter-tab {{ !$currentFilter ? 'active' : '' }}">
          {{ $isTr ? 'Tümü' : 'All' }}
        </a>
        @foreach($sectors as $sec)
          <a href="{{ url(($isTr ? 'tr/projeler' : 'en/projects') . '?sektor=' . $sec->slug) }}"
            class="filter-tab {{ $currentFilter === $sec->slug ? 'active' : '' }}">
            {{ $sec->name }}
          </a>
        @endforeach
      </div>

      <div id="projects-container">
        <div class="project-grid" style="transition: opacity 0.3s ease;">
          @forelse($projects as $i => $project)
            <div class="flip-card-wrapper reveal" style="transition-delay:{{ ($i % 3) * 0.1 }}s"
              data-sector="{{ $project->sector?->slug }}"
              data-href="{{ url(($isTr ? 'tr/projeler' : 'en/projects') . '/' . $project->slug) }}">
              <div class="flip-card-inner">

                {{-- FRONT --}}
                <div class="flip-card-front">
                  <img
                    src="{{ $project->cover_image ? asset('storage/' . $project->cover_image) : asset('images/extracted/stitched_page_15.jpg') }}"
                    alt="{{ $project->title }}" loading="lazy">
                  <div class="project-card__overlay">
                    <div style="display: flex; gap: 0.25rem; flex-wrap: wrap; margin-bottom: 0.5rem;">
                      @if($project->sector)
                        <span class="project-card__tag" style="margin:0">{{ $project->sector->name }}</span>
                      @endif
                      @foreach($project->categories as $cat)
                        <span class="project-card__tag" style="margin:0; background: rgba(255,255,255,0.1); border-color: rgba(255,255,255,0.2);">{{ $isTr ? $cat->name_tr : ($cat->name_en ?? $cat->name_tr) }}</span>
                      @endforeach
                    </div>
                    <div class="project-card__meta">
                      {{ $project->location }}
                      @if($project->size) · {{ $project->size }} @endif
                    </div>
                    <h2 class="project-card__title">{{ $project->title }}</h2>
                  </div>
                </div>

                {{-- BACK --}}
                <div class="flip-card-back">
                  <div style="display: flex; gap: 0.25rem; flex-wrap: wrap; justify-content: center; margin-bottom: 0.5rem;">
                    @if($project->sector)
                      <span class="flip-card-back__tag" style="margin:0">{{ $project->sector->name }}</span>
                    @endif
                    @foreach($project->categories as $cat)
                      <span class="flip-card-back__tag" style="margin:0; background: rgba(255,255,255,0.1); border-color: rgba(255,255,255,0.2);">{{ $isTr ? $cat->name_tr : ($cat->name_en ?? $cat->name_tr) }}</span>
                    @endforeach
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
                  <a href="{{ url(($isTr ? 'tr/projeler' : 'en/projects') . '/' . $project->slug) }}"
                    class="flip-card-back__btn">
                    {{ $isTr ? 'Detayları Gör' : 'View Details' }} →
                  </a>
                </div>

              </div>
            </div>
          @empty
            <div style="grid-column:1/-1;text-align:center;padding:4rem 0;color:var(--muted)">
              {{ $isTr ? 'Henüz proje bulunmuyor.' : 'No projects found yet.' }}
            </div>
          @endforelse
        </div>

        @if($projects->hasPages())
          <div class="projects-pagination" style="margin-top:3rem;display:flex;justify-content:center">
            {{ $projects->links() }}
          </div>
        @endif
      </div>

    </div>
  </section>
@endsection


@push('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const filterTabs = document.querySelectorAll('.filter-tab');
      const isMobile = () => window.matchMedia('(hover: none)').matches;

      /* ── Mobile flip support: tap to flip, tap flipped-card link to navigate ── */
      function attachFlipCardEvents() {
        document.querySelectorAll('.flip-card-wrapper').forEach(card => {
          card.addEventListener('click', (e) => {
            if (!isMobile()) return; // Desktop: CSS hover handles it
            const clickedBtn = e.target.closest('.flip-card-back__btn');
            if (clickedBtn) return; // Let the link navigate normally
            if (!card.classList.contains('flipped')) {
              // First tap: flip the card
              e.preventDefault();
              // Close any other flipped cards
              document.querySelectorAll('.flip-card-wrapper.flipped').forEach(other => {
                if (other !== card) other.classList.remove('flipped');
              });
              card.classList.add('flipped');
            } else {
              // Second tap on the card body (not button): unflip
              const clickedBackBtn = e.target.closest('.flip-card-back__btn');
              if (!clickedBackBtn) {
                card.classList.remove('flipped');
              }
            }
          });
        });

        // Close flipped cards when tapping outside
        document.addEventListener('click', (e) => {
          if (!e.target.closest('.flip-card-wrapper')) {
            document.querySelectorAll('.flip-card-wrapper.flipped').forEach(card => {
              card.classList.remove('flipped');
            });
          }
        }, { passive: true });
      }

      function attachPaginationEvents() {
        const paginationLinks = document.querySelectorAll('.projects-pagination a');
        paginationLinks.forEach(link => {
          link.addEventListener('click', (e) => {
            e.preventDefault();
            loadProjects(link.href, null);
          });
        });
      }

      const loadProjects = async (url, clickedTab) => {
        const container = document.getElementById('projects-container');
        const grid = container.querySelector('.project-grid');

        grid.style.opacity = '0.5';
        grid.style.pointerEvents = 'none';

        try {
          const response = await fetch(url, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
          });
          const htmlText = await response.text();

          const parser = new DOMParser();
          const doc = parser.parseFromString(htmlText, 'text/html');
          const newContainer = doc.getElementById('projects-container');

          if (newContainer) {
            container.innerHTML = newContainer.innerHTML;
          }

          window.history.pushState({ path: url }, '', url);

          if (clickedTab) {
            filterTabs.forEach(t => t.classList.remove('active'));
            clickedTab.classList.add('active');
          }

          attachPaginationEvents();
          attachFlipCardEvents();

        } catch (error) {
          console.error('Error fetching projects:', error);
          grid.style.opacity = '1';
          grid.style.pointerEvents = 'auto';
        }
      };

      filterTabs.forEach(tab => {
        tab.addEventListener('click', (e) => {
          e.preventDefault();
          loadProjects(tab.href, tab);
        });
      });

      attachPaginationEvents();
      attachFlipCardEvents();

      window.addEventListener('popstate', (e) => {
        if (e.state && e.state.path) {
          let matchingTab = Array.from(filterTabs).find(t => t.href === e.state.path) || filterTabs[0];
          loadProjects(e.state.path, matchingTab);
        } else {
          window.location.reload();
        }
      });
    });
  </script>
@endpush