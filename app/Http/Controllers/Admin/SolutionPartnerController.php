<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SolutionPartner;
use Illuminate\Http\Request;

class SolutionPartnerController extends Controller
{
    public function index()
    {
        $partners = SolutionPartner::orderBy('order_index')->get();
        return view('admin.solution_partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.solution_partners.form', ['partner' => null]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:100',
            'website'     => 'nullable|url|max:255',
            'order_index' => 'nullable|integer|min:0',
        ]);

        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('solution-partners', 'public');
        }

        SolutionPartner::create($data);

        return redirect()->route('admin.solution-partners.index')
            ->with('success', 'Çözüm ortağı eklendi.');
    }

    public function edit(SolutionPartner $solutionPartner)
    {
        return view('admin.solution_partners.form', ['partner' => $solutionPartner]);
    }

    public function update(Request $request, SolutionPartner $solutionPartner)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:100',
            'website'     => 'nullable|url|max:255',
            'order_index' => 'nullable|integer|min:0',
        ]);

        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('solution-partners', 'public');
        }

        $solutionPartner->update($data);

        return redirect()->route('admin.solution-partners.index')
            ->with('success', 'Çözüm ortağı güncellendi.');
    }

    public function destroy(SolutionPartner $solutionPartner)
    {
        $solutionPartner->delete();
        return back()->with('success', 'Çözüm ortağı silindi.');
    }

    /**
     * Toggle active/inactive via AJAX
     */
    public function toggle(SolutionPartner $solutionPartner)
    {
        $solutionPartner->update(['is_active' => !$solutionPartner->is_active]);
        return response()->json(['is_active' => $solutionPartner->is_active]);
    }
}
