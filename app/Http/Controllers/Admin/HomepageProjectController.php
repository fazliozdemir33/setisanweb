<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class HomepageProjectController extends Controller
{
    /**
     * Show the homepage project manager.
     * Left column: all active, non-featured projects (can be added).
     * Right column: featured projects ordered by order_index (can be removed / reordered).
     */
    public function index()
    {
        $featured = Project::active()->featured()
            ->orderBy('order_index')
            ->orderByDesc('year')
            ->get();

        $available = Project::active()
            ->where('is_featured', false)
            ->orderBy('order_index')
            ->orderByDesc('year')
            ->get();

        return view('admin.homepage_projects.index', compact('featured', 'available'));
    }

    /**
     * AJAX: toggle is_featured for a project.
     */
    public function toggle(Project $projeler)
    {
        $projeler->update(['is_featured' => !$projeler->is_featured]);
        return response()->json(['is_featured' => $projeler->is_featured]);
    }

    /**
     * AJAX: reorder featured projects (shared with ProjectController reorder).
     * Expects JSON: { items: [{id, order}, ...] }
     */
    public function reorder(Request $request)
    {
        $data = $request->validate([
            'items'         => 'required|array',
            'items.*.id'    => 'required|integer|exists:projects,id',
            'items.*.order' => 'required|integer|min:0',
        ]);

        foreach ($data['items'] as $item) {
            Project::where('id', $item['id'])->update(['order_index' => $item['order']]);
        }

        return response()->json(['success' => true]);
    }
}
