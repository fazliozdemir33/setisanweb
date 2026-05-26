<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('order_index')->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title_tr'      => 'required|string|max:255',
            'title_en'      => 'nullable|string|max:255',
            'excerpt_tr'    => 'nullable|string',
            'excerpt_en'    => 'nullable|string',
            'content_tr'    => 'nullable|string',
            'content_en'    => 'nullable|string',
            'meta_title_tr' => 'nullable|string|max:255',
            'meta_title_en' => 'nullable|string|max:255',
            'meta_desc_tr'  => 'nullable|string',
            'meta_desc_en'  => 'nullable|string',
            'order_index'   => 'nullable|integer',
            'is_active'     => 'nullable|boolean',
        ]);
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('services', 'public');
        }

        Service::create($data);
        return redirect()->route('admin.services.index')->with('success', 'Hizmet oluşturuldu.');
    }

    public function edit(Service $hizmetler)
    {
        return view('admin.services.edit', ['service' => $hizmetler]);
    }

    public function update(Request $request, Service $hizmetler)
    {
        $data = $request->validate([
            'title_tr'      => 'required|string|max:255',
            'title_en'      => 'nullable|string|max:255',
            'excerpt_tr'    => 'nullable|string',
            'excerpt_en'    => 'nullable|string',
            'content_tr'    => 'nullable|string',
            'content_en'    => 'nullable|string',
            'meta_title_tr' => 'nullable|string|max:255',
            'meta_title_en' => 'nullable|string|max:255',
            'meta_desc_tr'  => 'nullable|string',
            'meta_desc_en'  => 'nullable|string',
            'order_index'   => 'nullable|integer',
        ]);
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('services', 'public');
        }

        $hizmetler->update($data);
        return redirect()->route('admin.services.index')->with('success', 'Hizmet güncellendi.');
    }

    public function destroy(Service $hizmetler)
    {
        $hizmetler->delete();
        return back()->with('success', 'Hizmet silindi.');
    }
}
