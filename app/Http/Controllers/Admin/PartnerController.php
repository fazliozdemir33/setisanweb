<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::orderBy('order_index')->get();
        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'logo_file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'name' => 'nullable|string|max:255',
            'order_index' => 'nullable|integer'
        ]);

        $logoPath = '';
        if ($request->hasFile('logo_file')) {
            $file = $request->file('logo_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/partners'), $filename);
            $logoPath = 'images/partners/' . $filename;
        }

        Partner::create([
            'logo' => $logoPath,
            'name' => $request->name,
            'order_index' => $request->order_index ?? 0,
            'is_active' => $request->has('is_active')
        ]);

        return redirect()->route('admin.partners.index')->with('success', 'Çözüm ortağı başarıyla eklendi.');
    }

    public function edit(Partner $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            'logo_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'name' => 'nullable|string|max:255',
            'order_index' => 'nullable|integer'
        ]);

        $logoPath = $partner->logo;
        if ($request->hasFile('logo_file')) {
            $file = $request->file('logo_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/partners'), $filename);
            $logoPath = 'images/partners/' . $filename;
        }

        $partner->update([
            'logo' => $logoPath,
            'name' => $request->name,
            'order_index' => $request->order_index ?? 0,
            'is_active' => $request->has('is_active')
        ]);

        return redirect()->route('admin.partners.index')->with('success', 'Çözüm ortağı güncellendi.');
    }

    public function destroy(Partner $partner)
    {
        $partner->delete();
        return redirect()->route('admin.partners.index')->with('success', 'Çözüm ortağı silindi.');
    }
}
