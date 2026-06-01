<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectSector;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with(['sector', 'categories'])->orderBy('order_index')->orderByDesc('year')->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $sectors = ProjectSector::orderBy('order_index')->get();
        $categories = \App\Models\ProjectCategory::where('is_active', true)->orderBy('order_index')->get();
        return view('admin.projects.create', compact('sectors', 'categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title_tr'     => 'required|string|max:255',
            'title_en'     => 'nullable|string|max:255',
            'scope_tr'     => 'nullable|string',
            'scope_en'     => 'nullable|string',
            'description_tr' => 'nullable|string',
            'description_en' => 'nullable|string',
            'location_tr'  => 'nullable|string|max:255',
            'location_en'  => 'nullable|string|max:255',
            'client_tr'    => 'nullable|string|max:255',
            'client_en'    => 'nullable|string|max:255',
            'size_tr'      => 'nullable|string|max:255',
            'size_en'      => 'nullable|string|max:255',
            'duration_tr'  => 'nullable|string|max:255',
            'duration_en'  => 'nullable|string|max:255',
            'year'         => 'nullable|integer|min:2000|max:2099',
            'sector_id'    => 'nullable|exists:project_sectors,id',
            'status'       => 'in:completed,ongoing',
            'meta_title_tr' => 'nullable|string|max:255',
            'meta_title_en' => 'nullable|string|max:255',
            'meta_desc_tr' => 'nullable|string',
            'meta_desc_en' => 'nullable|string',
        ]);

        $data['is_active']   = $request->has('is_active');
        $data['is_featured'] = $request->has('is_featured');

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('projects', 'public');
        }

        $project = Project::create($data);

        if ($request->has('categories')) {
            $project->categories()->sync($request->categories);
        }

        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $img) {
                $project->gallery()->create([
                    'image_path' => $img->store('projects/gallery', 'public')
                ]);
            }
        }

        return redirect()->route('admin.projects.index')->with('success', 'Proje oluşturuldu.');
    }

    public function edit(Project $projeler)
    {
        $sectors = ProjectSector::orderBy('order_index')->get();
        $categories = \App\Models\ProjectCategory::where('is_active', true)->orderBy('order_index')->get();
        return view('admin.projects.edit', ['project' => $projeler, 'sectors' => $sectors, 'categories' => $categories]);
    }

    public function update(Request $request, Project $projeler)
    {
        $data = $request->validate([
            'title_tr'     => 'required|string|max:255',
            'title_en'     => 'nullable|string|max:255',
            'scope_tr'     => 'nullable|string',
            'scope_en'     => 'nullable|string',
            'description_tr' => 'nullable|string',
            'description_en' => 'nullable|string',
            'location_tr'  => 'nullable|string|max:255',
            'location_en'  => 'nullable|string|max:255',
            'client_tr'    => 'nullable|string|max:255',
            'client_en'    => 'nullable|string|max:255',
            'size_tr'      => 'nullable|string|max:255',
            'size_en'      => 'nullable|string|max:255',
            'duration_tr'  => 'nullable|string|max:255',
            'duration_en'  => 'nullable|string|max:255',
            'year'         => 'nullable|integer',
            'sector_id'    => 'nullable|exists:project_sectors,id',
            'status'       => 'in:completed,ongoing',
            'meta_title_tr' => 'nullable|string|max:255',
            'meta_title_en' => 'nullable|string|max:255',
            'meta_desc_tr' => 'nullable|string',
            'meta_desc_en' => 'nullable|string',
        ]);

        $data['is_active']   = $request->has('is_active');
        $data['is_featured'] = $request->has('is_featured');

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('projects', 'public');
        }

        $projeler->update($data);

        // Sync categories (even if empty to clear them)
        $projeler->categories()->sync($request->categories ?? []);

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

    /**
     * AJAX: reorder projects.
     * Expects JSON body: [{"id":1,"order":0},{"id":3,"order":1}, ...]
     */
    public function reorder(\Illuminate\Http\Request $request)
    {
        $items = $request->validate(['items'   => 'required|array',
                                     'items.*.id'    => 'required|integer|exists:projects,id',
                                     'items.*.order' => 'required|integer|min:0']);

        foreach ($items['items'] as $item) {
            Project::where('id', $item['id'])->update(['order_index' => $item['order']]);
        }

        return response()->json(['success' => true]);
    }
}
