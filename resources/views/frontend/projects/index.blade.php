@extends('layouts.app')
@php $locale = app()->getLocale(); $isTr = $locale === 'tr'; @endphp

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

    <div class="filter-tabs reveal">
      <a href="{{ url($isTr ? 'tr/projeler' : 'en/projects') }}" class="filter-tab {{ !$currentFilter ? 'active' : '' }}">
        {{ $isTr ? 'Tümü' : 'All' }}
      </a>
      @foreach($services as $s)
      <a href="{{ url(($isTr ? 'tr/projeler' : 'en/projects') . '?hizmet=' . $s->slug) }}" class="filter-tab {{ $currentFilter === $s->slug ? 'active' : '' }}">
        {{ $s->title }}
      </a>
      @endforeach
    </div>

    <div id="projects-container">
      <div class="project-grid" style="transition: opacity 0.3s ease;">
        @forelse($projects as $i => $project)
        <a href="{{ url(($isTr ? 'tr/projeler' : 'en/projects') . '/' . $project->slug) }}"
           class="project-card reveal" style="transition-delay:{{ ($i % 3) * 0.1 }}s"
           data-service="{{ $project->service?->slug }}">
          <img src="{{ $project->cover_image ? asset('storage/' . $project->cover_image) : asset('images/extracted/stitched_page_15.jpg') }}"
               alt="{{ $project->title }}" loading="lazy">
          <div class="project-card__overlay">
            @if($project->service)
              <span class="project-card__tag">{{ $project->service->title }}</span>
            @endif
            <div class="project-card__meta">
              {{ $project->location }}
              @if($project->size) · {{ $project->size }} @endif
            </div>
            <h2 class="project-card__title">{{ $project->title }}</h2>
          </div>
        </a>
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
  
  function attachPaginationEvents() {
    const paginationLinks = document.querySelectorAll('.projects-pagination a');
    paginationLinks.forEach(link => {
      link.addEventListener('click', (e) => {
        e.preventDefault();
        loadProjects(link.href, null); // Maintain current active tab visually
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
      
      if(newContainer) {
        container.innerHTML = newContainer.innerHTML;
      }

      window.history.pushState({ path: url }, '', url);

      if(clickedTab) {
        filterTabs.forEach(t => t.classList.remove('active'));
        clickedTab.classList.add('active');
      }

      attachPaginationEvents();
      
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

  window.addEventListener('popstate', (e) => {
    if(e.state && e.state.path) {

      let matchingTab = Array.from(filterTabs).find(t => t.href === e.state.path) || filterTabs[0];
      loadProjects(e.state.path, matchingTab);
    } else {
      window.location.reload();
    }
  });
});
</script>
@endpush
