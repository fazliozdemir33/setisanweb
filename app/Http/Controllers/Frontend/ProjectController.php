<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::active()->with('service')->orderByDesc('year');

        if ($request->filled('hizmet')) {
            $service = Service::where('slug', $request->hizmet)->first();
            if ($service) {
                $query->where('service_id', $service->id);
            }
        }

        $projects = $query->paginate(12);
        $services = Service::active()->get();
        $currentFilter = $request->get('hizmet');

        return view('frontend.projects.index', compact('projects', 'services', 'currentFilter'));
    }

    public function show(string $slug)
    {
        $project = Project::where('slug', $slug)->where('is_active', true)
            ->with(['service', 'gallery'])->firstOrFail();

        $relatedProjects = Project::active()
            ->where('id', '!=', $project->id)
            ->when($project->service_id, fn($q) => $q->where('service_id', $project->service_id))
            ->limit(3)->get();

        return view('frontend.projects.show', compact('project', 'relatedProjects'));
    }
}
