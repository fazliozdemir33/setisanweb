<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function edit(string $key)
    {
        return view('admin.pages.edit', compact('key'));
    }

    public function update(\Illuminate\Http\Request $request, string $key)
    {

        if ($request->has('settings') && is_array($request->settings)) {
            foreach ($request->settings as $settingKey => $values) {
                \App\Models\Setting::updateOrCreate(
                    ['key' => "page_{$key}_{$settingKey}"],
                    [
                        'value_tr' => $values['tr'] ?? '',
                        'value_en' => $values['en'] ?? '',
                        'type' => 'textarea',
                        'group' => 'pages'
                    ]
                );
            }
        }

        if ($request->hasFile('settings_files') && is_array($request->file('settings_files'))) {
            foreach ($request->file('settings_files') as $settingKey => $file) {
                $path = $file->store('pages/certificates', 'public');
                \App\Models\Setting::updateOrCreate(
                    ['key' => "page_{$key}_{$settingKey}"],
                    [
                        'value_tr' => $path,
                        'value_en' => $path,
                        'type' => 'file',
                        'group' => 'pages'
                    ]
                );
            }
        }

        return back()->with('success', 'Sayfa içeriği güncellendi.');
    }

    public function addCertificate(\Illuminate\Http\Request $request, string $key)
    {
        $request->validate([
            'image' => 'required|file|max:5120',
            'title_tr' => 'required|string',
            'title_en' => 'nullable|string',
            'desc_tr' => 'nullable|string',
            'desc_en' => 'nullable|string',
        ]);

        $path = $request->file('image')->store('pages/certificates', 'public');

        $setting = \App\Models\Setting::firstOrCreate(
            ['key' => "page_{$key}_certificates"],
            ['value_tr' => '[]', 'value_en' => '[]', 'type' => 'json', 'group' => 'pages']
        );

        $certs = json_decode($setting->value_tr, true) ?? [];
        
        $certs[] = [
            'image' => $path,
            'title_tr' => $request->title_tr,
            'title_en' => $request->title_en ?: $request->title_tr,
            'desc_tr' => $request->desc_tr,
            'desc_en' => $request->desc_en ?: $request->desc_tr,
        ];

        $setting->value_tr = json_encode($certs, JSON_UNESCAPED_UNICODE);
        $setting->value_en = json_encode($certs, JSON_UNESCAPED_UNICODE);
        $setting->save();

        return back()->with('success', 'Sertifika başarıyla eklendi.');
    }

    public function deleteCertificate(string $key, int $index)
    {
        $setting = \App\Models\Setting::where('key', "page_{$key}_certificates")->first();
        if ($setting) {
            $certs = json_decode($setting->value_tr, true) ?? [];
            if (isset($certs[$index])) {
                if (\Illuminate\Support\Facades\Storage::disk('public')->exists($certs[$index]['image'])) {
                    \Illuminate\Support\Facades\Storage::disk('public')->delete($certs[$index]['image']);
                }
                array_splice($certs, $index, 1);
                $setting->value_tr = json_encode($certs, JSON_UNESCAPED_UNICODE);
                $setting->value_en = json_encode($certs, JSON_UNESCAPED_UNICODE);
                $setting->save();
            }
        }
        return back()->with('success', 'Sertifika başarıyla silindi.');
    }
}
