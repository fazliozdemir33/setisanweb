<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectSector;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::active()->with(['sector', 'categories'])->orderBy('order_index')->orderByDesc('year');

        if ($request->filled('sektor')) {
            $sector = ProjectSector::where('slug', $request->sektor)->first();
            if ($sector) {
                $query->where('sector_id', $sector->id);
            }
        }

        $projects      = $query->paginate(12);
        $sectors       = ProjectSector::orderBy('order_index')->get();
        $currentFilter = $request->get('sektor');

        return view('frontend.projects.index', compact('projects', 'sectors', 'currentFilter'));
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
