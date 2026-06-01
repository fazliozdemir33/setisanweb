<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectSector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    public function index()
    {
        $sectors = ProjectSector::orderBy('order_index')->get();
        return view('admin.sectors.index', compact('sectors'));
    }

    public function create()
    {
        return view('admin.sectors.form', ['sector' => null]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name_tr'     => 'required|string|max:100',
            'name_en'     => 'nullable|string|max:100',
            'order_index' => 'nullable|integer|min:0',
        ]);

        ProjectSector::create($data);

        return redirect()->route('admin.sectors.index')->with('success', 'Sektör oluşturuldu.');
    }

    public function edit(ProjectSector $sector)
    {
        return view('admin.sectors.form', compact('sector'));
    }

    public function update(Request $request, ProjectSector $sector)
    {
        $data = $request->validate([
            'name_tr'     => 'required|string|max:100',
            'name_en'     => 'nullable|string|max:100',
            'order_index' => 'nullable|integer|min:0',
        ]);

        $sector->update($data);

        return redirect()->route('admin.sectors.index')->with('success', 'Sektör güncellendi.');
    }

    public function destroy(ProjectSector $sector)
    {
        $sector->delete();
        return back()->with('success', 'Sektör silindi.');
    }
}
