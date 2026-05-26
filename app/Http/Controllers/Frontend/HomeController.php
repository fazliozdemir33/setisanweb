<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Project;
use App\Models\BlogPost;

class HomeController extends Controller
{
    public function index()
    {
        $locale = app()->getLocale();

        $services = Service::active()->get();
        $featuredProjects = Project::active()->with('service')
            ->orderByDesc('year')->get();
        $latestPosts = BlogPost::published()->limit(3)->get();

        $stats = [];
        for ($i = 1; $i <= 4; $i++) {
            $val_tr = \App\Models\Setting::where('key', "page_anasayfa_stat_{$i}_val")->first()->value_tr ?? '';
            $val_en = \App\Models\Setting::where('key', "page_anasayfa_stat_{$i}_val")->first()->value_en ?? '';
            $lbl_tr = \App\Models\Setting::where('key', "page_anasayfa_stat_{$i}_label")->first()->value_tr ?? '';
            $lbl_en = \App\Models\Setting::where('key', "page_anasayfa_stat_{$i}_label")->first()->value_en ?? '';

            if ($val_tr || $val_en) {
                $stats[] = [
                    'number_tr' => $val_tr,
                    'number_en' => $val_en,
                    'label_tr' => $lbl_tr,
                    'label_en' => $lbl_en,
                ];
            }
        }

        $partners = \App\Models\Partner::where('is_active', true)->orderBy('order_index')->get();

        return view('frontend.home', compact(
            'services', 'featuredProjects', 'latestPosts', 'stats', 'locale', 'partners'
        ));
    }
}
