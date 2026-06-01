<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectCategoryController extends Controller
{
    public function index()
    {
        $categories = ProjectCategory::orderBy('order_index')->get();
        return view('admin.project_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.project_categories.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_tr' => 'required|string|max:255',
        ]);

        ProjectCategory::create([
            'name_tr' => $request->name_tr,
            'name_en' => $request->name_en,
            'slug' => Str::slug($request->name_tr),
            'order_index' => $request->order_index ?? 0,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.project-categories.index')->with('success', 'Kategori/Etiket başarıyla eklendi.');
    }

    public function edit(ProjectCategory $project_category)
    {
        return view('admin.project_categories.form', ['category' => $project_category]);
    }

    public function update(Request $request, ProjectCategory $project_category)
    {
        $request->validate([
            'name_tr' => 'required|string|max:255',
        ]);

        $project_category->update([
            'name_tr' => $request->name_tr,
            'name_en' => $request->name_en,
            'slug' => Str::slug($request->name_tr),
            'order_index' => $request->order_index ?? 0,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.project-categories.index')->with('success', 'Kategori/Etiket başarıyla güncellendi.');
    }

    public function destroy(ProjectCategory $project_category)
    {
        $project_category->delete();
        return redirect()->route('admin.project-categories.index')->with('success', 'Kategori/Etiket silindi.');
    }
}
