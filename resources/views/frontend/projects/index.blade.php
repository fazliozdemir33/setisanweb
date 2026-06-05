@extends('layouts.app')
@php
  $locale  = app()->getLocale();
  $isTr    = $locale === 'tr';
  $baseUrl = url($isTr ? 'tr/projeler' : 'en/projects');
  $activeCount = (int)!!$currentStatus + (int)!!$currentFilter + (int)!!$currentCategory;
@endphp

@section('meta_title', $isTr ? 'Projeler & Referanslar — Setisan Elektromekanik' : 'Projects & References — Setisan Elektromekanik')
@section('meta_desc', $isTr ? 'Tamamladığımız kurumsal mekanik ve elektrik projelerini inceleyin.' : 'Explore our completed institutional mechanical and electrical projects.')

@section('content')

<div class="page-header">
  <div class="container">
    <h1>{{ $isTr ? 'Projeler & Referanslar' : 'Projects & References' }}</h1>
    <p>{{ $isTr ? 'Kurumsal ve sanayi yapılarında gerçekleştirdiğimiz elektromekanik projelerin seçkisi.' : 'A selection of electromechanical projects carried out in institutional and industrial buildings.' }}</p>
  </div>
</div>

<section class="section">
  <div class="container">

    {{-- NEW FILTER SYSTEM --}}
    <div class="project-filter-section">
      
      {{-- Status Tabs --}}
      <div class="project-tabs">
        <button class="project-tab-btn active" data-status="completed">
          <span class="project-tab-btn__dot"></span>
          {{ $isTr ? 'Tamamlanan Projeler' : 'Completed Projects' }}
        </button>
        <button class="project-tab-btn" data-status="ongoing">
          <span class="project-tab-btn__dot project-tab-btn__dot--ongoing"></span>
          {{ $isTr ? 'Devam Eden Projeler' : 'Ongoing Projects' }}
        </button>
      </div>

      {{-- Sector Filters --}}
      @if($sectors->count())
      <div class="project-sectors-wrapper">
        <div class="project-sectors" id="project-sectors-list">
          <button class="project-sector-btn active" data-sector="">
            {{ $isTr ? 'Tüm Sektörler' : 'All Sectors' }}
          </button>
          @foreach($sectors as $sec)
            <button class="project-sector-btn" data-sector="{{ $sec->slug }}">
              {{ $sec->name }}
            </button>
          @endforeach
        </div>
      </div>
      @endif

      {{-- Category Filters --}}
      <div class="project-categories-wrapper" id="project-categories-wrapper" style="display: none;">
        <div class="project-categories" id="project-categories-list">
          {{-- Populated dynamically via JS --}}
        </div>
      </div>

    </div>

    {{-- PROJECT GRID --}}
    <div id="projects-container">
      @include('frontend.projects._grid', ['projects' => $projects, 'isTr' => $isTr, 'baseUrl' => $baseUrl])
    </div>

  </div>
</section>

<style>
/* ── Premium Tabbed Filter Styles ── */
.project-filter-section {
  margin-bottom: 3.5rem;
  display: flex;
  flex-direction: column;
  gap: 1.75rem;
}

/* 1. Status Tabs */
.project-tabs {
  display: inline-flex;
  justify-content: center;
  align-self: center;
  background: rgba(0, 0, 0, 0.03);
  padding: 0.35rem;
  border-radius: 50px;
  border: 1px solid var(--border);
  gap: 0.25rem;
  position: relative;
  z-index: 2;
  margin-bottom: 0.5rem;
}

.project-tab-btn {
  background: transparent;
  border: none;
  color: var(--muted);
  font-family: inherit;
  font-size: 0.9rem;
  font-weight: 700;
  padding: 0.8rem 2rem;
  border-radius: 50px;
  cursor: pointer;
  display: inline-flex;
  align-items: center;
  gap: 0.65rem;
  transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
  text-transform: uppercase;
  letter-spacing: 0.05em;
}

.project-tab-btn:hover {
  color: var(--primary);
}

.project-tab-btn.active {
  background: var(--primary);
  color: var(--white);
  box-shadow: 0 4px 15px rgba(27, 50, 82, 0.15);
}

.project-tab-btn__dot {
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background: var(--accent);
  display: inline-block;
  transition: transform 0.3s ease;
}

.project-tab-btn__dot--ongoing {
  background: #4ade80;
  animation: tab-pulse 1.5s infinite;
}

@keyframes tab-pulse {
  0%, 100% { transform: scale(1); opacity: 1; }
  50% { transform: scale(1.3); opacity: 0.6; }
}

/* 2. Sector Buttons */
.project-sectors-wrapper {
  width: 100%;
  overflow: hidden;
  position: relative;
}

.project-sectors {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  gap: 0.75rem;
  padding: 0.25rem;
}

.project-sector-btn {
  background: var(--white);
  border: 1px solid var(--border);
  color: var(--primary);
  font-family: inherit;
  font-size: 0.85rem;
  font-weight: 600;
  padding: 0.6rem 1.4rem;
  border-radius: 30px;
  cursor: pointer;
  transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
}

.project-sector-btn:hover {
  border-color: var(--primary);
  transform: translateY(-1px);
  box-shadow: 0 4px 10px rgba(0,0,0,0.03);
}

.project-sector-btn.active {
  background: var(--primary);
  border-color: var(--primary);
  color: var(--white);
  box-shadow: 0 4px 12px rgba(27, 50, 82, 0.12);
}

/* 3. Category Tags */
.project-categories-wrapper {
  background: #f8f9fb;
  border: 1px solid var(--border);
  border-radius: 12px;
  padding: 1.25rem 1.5rem;
  transition: opacity 0.3s ease;
}

.project-categories {
  display: flex;
  flex-wrap: wrap;
  gap: 0.5rem;
  align-items: center;
}

.project-category-btn {
  background: transparent;
  border: 1.5px solid var(--border);
  color: var(--muted);
  font-family: inherit;
  font-size: 0.78rem;
  font-weight: 600;
  padding: 0.4rem 1.1rem;
  border-radius: 20px;
  cursor: pointer;
  transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
}

.project-category-btn:hover {
  border-color: var(--accent);
  color: var(--accent);
}

.project-category-btn.active {
  background: var(--accent);
  border-color: var(--accent);
  color: var(--white);
  box-shadow: 0 4px 10px rgba(180, 80, 20, 0.15);
}

/* 4. Loader and Cards */
#projects-container {
  min-height: 250px;
}

.flip-card-back__tag--ongoing {
  background: rgba(74, 222, 128, 0.15) !important;
  border-color: rgba(74, 222, 128, 0.4) !important;
  color: #4ade80 !important;
}

.project-card__tag--ongoing {
  background: rgba(74, 222, 128, 0.15) !important;
  border-color: rgba(74, 222, 128, 0.4) !important;
  color: #4ade80 !important;
}

/* Responsive adjustments */
@media (max-width: 768px) {
  .project-tabs {
    width: 100%;
    border-radius: 15px;
    flex-direction: column;
    padding: 0.5rem;
  }
  
  .project-tab-btn {
    width: 100%;
    justify-content: center;
    border-radius: 10px;
    padding: 0.7rem 1.5rem;
  }

  .project-sectors {
    justify-content: flex-start;
    flex-wrap: nowrap;
    overflow-x: auto;
    padding-bottom: 0.75rem;
    scrollbar-width: none;
    -webkit-overflow-scrolling: touch;
  }
  .project-sectors::-webkit-scrollbar {
    display: none;
  }
  .project-sector-btn {
    white-space: nowrap;
    flex-shrink: 0;
  }

  .project-categories-wrapper {
    padding: 1rem;
  }
}
</style>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
  const tabBtns = document.querySelectorAll('.project-tab-btn');
  const sectorBtns = document.querySelectorAll('.project-sector-btn');
  const categoriesList = document.getElementById('project-categories-list');
  const categoriesWrapper = document.getElementById('project-categories-wrapper');
  const container = document.getElementById('projects-container');
  const cards = document.querySelectorAll('.flip-card-wrapper');
  let emptyMessage = document.getElementById('projects-empty-message');

  // Categories metadata passed from PHP to JS
  const allCategories = [
    @foreach($categories as $cat)
    {
      slug: "{{ $cat->slug }}",
      name: {!! json_encode($isTr ? $cat->name_tr : ($cat->name_en ?? $cat->name_tr), JSON_UNESCAPED_UNICODE) !!}
    },
    @endforeach
  ];

  // Active state variables
  let activeStatus = 'completed'; // default status
  let activeSector = '';
  let activeCategory = '';

  // ── Initialize filters based on current state ──
  function initFilters() {
    // 1. Set active tab based on variable
    tabBtns.forEach(btn => {
      if (btn.dataset.status === activeStatus) {
        btn.classList.add('active');
      } else {
        btn.classList.remove('active');
      }
    });

    // 2. Set active sector based on variable
    sectorBtns.forEach(btn => {
      if (btn.dataset.sector === activeSector) {
        btn.classList.add('active');
      } else {
        btn.classList.remove('active');
      }
    });

    // Run the filter
    filterProjects();
  }

  // ── Main filtering function ──
  function filterProjects() {
    let visibleCount = 0;

    cards.forEach(card => {
      const status = card.dataset.status;
      const sector = card.dataset.sector;
      const categories = card.dataset.categories; // ",hvac,electrical,"

      const matchesStatus = (status === activeStatus);
      const matchesSector = (!activeSector || sector === activeSector);
      const matchesCategory = (!activeCategory || categories.includes(',' + activeCategory + ','));

      if (matchesStatus && matchesSector && matchesCategory) {
        card.style.display = '';
        setTimeout(() => card.classList.add('visible'), 50);
        visibleCount++;
      } else {
        card.style.display = 'none';
        card.classList.remove('visible');
      }
    });

    // Handle empty state message
    emptyMessage = document.getElementById('projects-empty-message');
    if (visibleCount === 0) {
      if (!emptyMessage) {
        emptyMessage = document.createElement('div');
        emptyMessage.id = 'projects-empty-message';
        emptyMessage.style.cssText = 'grid-column: 1/-1; text-align: center; padding: 4rem 0; color: var(--muted); width: 100%;';
        emptyMessage.textContent = '{{ $isTr ? "Bu filtrelere uygun proje bulunamadı." : "No projects found for these filters." }}';
        container.querySelector('.project-grid').appendChild(emptyMessage);
      } else {
        emptyMessage.style.display = '';
      }
    } else if (emptyMessage) {
      emptyMessage.style.display = 'none';
    }

    // Recalculate populated categories and rebuild category tag buttons
    updateCategoryTags();

    // Update URL query parameters
    updateUrl();
  }

  // ── Rebuild category list, displaying only those containing active projects ──
  function updateCategoryTags() {
    const activeCategoriesSet = new Set();

    // Find all categories matching status and sector filters
    cards.forEach(card => {
      const status = card.dataset.status;
      const sector = card.dataset.sector;
      const categoriesStr = card.dataset.categories;

      const matchesStatus = (status === activeStatus);
      const matchesSector = (!activeSector || sector === activeSector);

      if (matchesStatus && matchesSector) {
        if (categoriesStr) {
          const parts = categoriesStr.split(',').filter(Boolean);
          parts.forEach(c => activeCategoriesSet.add(c));
        }
      }
    });

    // Clear current elements
    categoriesList.innerHTML = '';

    // If no categories found for the active tab/sector, hide the wrapper
    if (activeCategoriesSet.size === 0) {
      categoriesWrapper.style.display = 'none';
      return;
    }

    categoriesWrapper.style.display = '';

    // Create the "All Categories" pill
    const allBtn = document.createElement('button');
    allBtn.className = 'project-category-btn' + (!activeCategory ? ' active' : '');
    allBtn.textContent = '{{ $isTr ? "Tüm Kategoriler" : "All Categories" }}';
    allBtn.addEventListener('click', () => {
      activeCategory = '';
      document.querySelectorAll('.project-category-btn').forEach(b => b.classList.remove('active'));
      allBtn.classList.add('active');
      filterProjects();
    });
    categoriesList.appendChild(allBtn);

    // Create pills only for "populated" (dolu) categories
    allCategories.forEach(cat => {
      if (activeCategoriesSet.has(cat.slug)) {
        const btn = document.createElement('button');
        btn.className = 'project-category-btn' + (activeCategory === cat.slug ? ' active' : '');
        btn.textContent = cat.name;
        btn.addEventListener('click', () => {
          if (activeCategory === cat.slug) {
            activeCategory = ''; // Toggle off if clicked again
            btn.classList.remove('active');
            allBtn.classList.add('active');
          } else {
            activeCategory = cat.slug;
            document.querySelectorAll('.project-category-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
          }
          filterProjects();
        });
        categoriesList.appendChild(btn);
      }
    });

    // If active category is no longer valid in this tab/sector, reset it
    if (activeCategory && !activeCategoriesSet.has(activeCategory)) {
      activeCategory = '';
      allBtn.classList.add('active');
      filterProjects();
    }
  }

  // ── Update URL without reloading page ──
  function updateUrl() {
    const p = new URLSearchParams();
    
    // Convert status internally to human-readable URL state
    if (activeStatus === 'ongoing') {
      p.set('durum', 'devam-eden');
    } else if (activeStatus === 'completed' && ('{{ $currentStatus }}' === 'completed' || activeSector || activeCategory)) {
      p.set('durum', 'tamamlanan');
    }

    if (activeSector) p.set('sektor', activeSector);
    if (activeCategory) p.set('kategori', activeCategory);

    const qs = p.toString();
    const baseUrl = '{{ $baseUrl }}';
    const newUrl = baseUrl + (qs ? '?' + qs : '');
    window.history.pushState({ path: newUrl }, '', newUrl);
  }

  // ── Tab click handler ──
  tabBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      activeStatus = btn.dataset.status;
      tabBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      
      // Reset category
      activeCategory = '';
      
      // Check if active sector has any projects under the new status. If not, reset sector
      let sectorHasProjects = false;
      cards.forEach(card => {
        if (card.dataset.status === activeStatus && (!activeSector || card.dataset.sector === activeSector)) {
          sectorHasProjects = true;
        }
      });
      if (!sectorHasProjects) {
        activeSector = '';
        sectorBtns.forEach(b => b.classList.remove('active'));
        const allSecBtn = document.querySelector('.project-sector-btn[data-sector=""]');
        if (allSecBtn) allSecBtn.classList.add('active');
      }

      filterProjects();
    });
  });

  // ── Sector click handler ──
  sectorBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      activeSector = btn.dataset.sector;
      sectorBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');

      // Reset category to avoid mismatched filters
      activeCategory = '';

      filterProjects();
    });
  });

  // ── Mobile Touch Cards Flipper ──
  function attachFlipCards() {
    const isMobile = window.matchMedia('(hover:none)').matches;
    container.querySelectorAll('.flip-card-wrapper').forEach(card => {
      card.addEventListener('click', (e) => {
        if (!isMobile) return;
        if (e.target.closest('.flip-card-back__btn')) return;
        if (!card.classList.contains('flipped')) {
          e.preventDefault();
          container.querySelectorAll('.flip-card-wrapper.flipped').forEach(c => c.classList.remove('flipped'));
          card.classList.add('flipped');
        } else {
          card.classList.remove('flipped');
        }
      });
    });
  }

  // ── Listen to browser back/forward buttons ──
  window.addEventListener('popstate', (e) => {
    const params = new URLSearchParams(window.location.search);
    const durum = params.get('durum');
    activeStatus = (durum === 'devam-eden') ? 'ongoing' : 'completed';
    activeSector = params.get('sektor') || '';
    activeCategory = params.get('kategori') || '';
    initFilters();
  });

  // ── Initial State mapping ──
  const initialDurum = '{{ $currentStatus }}';
  if (initialDurum === 'devam-eden') {
    activeStatus = 'ongoing';
  } else {
    activeStatus = 'completed';
  }
  
  activeSector = '{{ $currentFilter }}';
  activeCategory = '{{ $currentCategory }}';

  // Run initialization
  container.querySelectorAll('.reveal').forEach(el => el.classList.add('visible'));
  initFilters();
  attachFlipCards();
});
</script>
@endpush