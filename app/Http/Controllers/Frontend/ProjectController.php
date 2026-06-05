<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\ProjectSector;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $isTr          = app()->getLocale() === 'tr';
        $projects      = Project::active()->with(['sector', 'categories'])->orderBy('order_index')->orderByDesc('year')->get();
        $sectors       = ProjectSector::orderBy('order_index')->get();
        $categories    = ProjectCategory::where('is_active', true)->orderBy('order_index')->get();

        $currentStatus   = $request->get('durum'); // 'tamamlanan' | 'devam-eden'
        $currentFilter   = $request->get('sektor'); // slug
        $currentCategory = $request->get('kategori'); // slug

        return view('frontend.projects.index', compact(
            'projects', 'sectors', 'categories',
            'currentFilter', 'currentStatus', 'currentCategory'
        ));
    }

    public function show(string $slug)
    {
        $project = Project::where('slug', $slug)->where('is_active', true)
            ->with(['sector', 'categories', 'gallery'])->firstOrFail();

        $relatedProjects = Project::active()
            ->where('id', '!=', $project->id)
            ->when($project->sector_id, fn($q) => $q->where('sector_id', $project->sector_id))
            ->orderBy('order_index')
            ->limit(3)->get();

        return view('frontend.projects.show', compact('project', 'relatedProjects'));
    }
}
