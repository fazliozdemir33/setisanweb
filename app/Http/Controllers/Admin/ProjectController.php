<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('service')->orderByDesc('year')->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $services = Service::active()->get();
        return view('admin.projects.create', compact('services'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title_tr'       => 'required|string|max:255',
            'title_en'       => 'nullable|string|max:255',
            'scope_tr'       => 'nullable|string',
            'scope_en'       => 'nullable|string',
            'description_tr' => 'nullable|string',
            'description_en' => 'nullable|string',
            'location_tr'    => 'nullable|string|max:255',
            'location_en'    => 'nullable|string|max:255',
            'client_tr'      => 'nullable|string|max:255',
            'client_en'      => 'nullable|string|max:255',
            'size_tr'        => 'nullable|string|max:255',
            'size_en'        => 'nullable|string|max:255',
            'duration_tr'    => 'nullable|string|max:255',
            'duration_en'    => 'nullable|string|max:255',
            'year'           => 'nullable|integer|min:2000|max:2099',
            'service_id'     => 'nullable|exists:services,id',
            'status'         => 'in:completed,ongoing',
            'meta_title_tr'  => 'nullable|string|max:255',
            'meta_title_en'  => 'nullable|string|max:255',
            'meta_desc_tr'   => 'nullable|string',
            'meta_desc_en'   => 'nullable|string',
        ]);

        $data['is_active']   = $request->has('is_active');
        $data['is_featured'] = $request->has('is_featured');

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('projects', 'public');
        }

        $project = Project::create($data);

        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $img) {
                $path = $img->store('projects/gallery', 'public');
                $project->gallery()->create(['image_path' => $path]);
            }
        }

        return redirect()->route('admin.projects.index')->with('success', 'Proje oluşturuldu.');
    }

    public function edit(Project $projeler)
    {
        $services = Service::active()->get();
        return view('admin.projects.edit', ['project' => $projeler, 'services' => $services]);
    }

    public function update(Request $request, Project $projeler)
    {
        $data = $request->validate([
            'title_tr'       => 'required|string|max:255',
            'title_en'       => 'nullable|string|max:255',
            'scope_tr'       => 'nullable|string',
            'scope_en'       => 'nullable|string',
            'description_tr' => 'nullable|string',
            'description_en' => 'nullable|string',
            'location_tr'    => 'nullable|string|max:255',
            'location_en'    => 'nullable|string|max:255',
            'client_tr'      => 'nullable|string|max:255',
            'client_en'      => 'nullable|string|max:255',
            'size_tr'        => 'nullable|string|max:255',
            'size_en'        => 'nullable|string|max:255',
            'duration_tr'    => 'nullable|string|max:255',
            'duration_en'    => 'nullable|string|max:255',
            'year'           => 'nullable|integer',
            'service_id'     => 'nullable|exists:services,id',
            'status'         => 'in:completed,ongoing',
            'meta_title_tr'  => 'nullable|string|max:255',
            'meta_title_en'  => 'nullable|string|max:255',
            'meta_desc_tr'   => 'nullable|string',
            'meta_desc_en'   => 'nullable|string',
        ]);

        $data['is_active']   = $request->has('is_active');
        $data['is_featured'] = $request->has('is_featured');

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('projects', 'public');
        }

        $projeler->update($data);

        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $img) {
                $path = $img->store('projects/gallery', 'public');
                $projeler->gallery()->create(['image_path' => $path]);
            }
        }

        return redirect()->route('admin.projects.index')->with('success', 'Proje güncellendi.');
    }

    public function destroy(Project $projeler)
    {
        $projeler->delete();
        return back()->with('success', 'Proje silindi.');
    }
}
