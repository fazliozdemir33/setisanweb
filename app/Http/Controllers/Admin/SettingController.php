<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::orderBy('group')->orderBy('key')->get()->groupBy('group');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->except(['_token', '_method']);

        foreach ($data as $key => $val) {
            if (is_array($val)) {
                Setting::updateOrCreate(['key' => $key], [
                    'value_tr' => $val['tr'] ?? null,
                    'value_en' => $val['en'] ?? null,
                ]);
            } else {
                Setting::updateOrCreate(['key' => $key], [
                    'value_tr' => $val,
                    'value_en' => $val,
                ]);
            }
        }

        return back()->with('success', 'Ayarlar kaydedildi.');
    }
}
