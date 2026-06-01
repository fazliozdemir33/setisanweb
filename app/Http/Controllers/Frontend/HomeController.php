<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Project;
use App\Models\BlogPost;
use App\Models\SolutionPartner;

class HomeController extends Controller
{
    public function index()
    {
        $locale = app()->getLocale();

        $services = Service::active()->parents()->get();
        $featuredProjects = Project::active()->featured()->with('sector')
            ->orderBy('order_index')->orderByDesc('year')->get();
        
        $projectSectors = $featuredProjects->pluck('sector')->filter()->unique('id')->sortBy('order_index');
        
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
        $solutionPartners = SolutionPartner::active()->orderBy('order_index')->get();

        return view('frontend.home', compact(
            'services', 'projectSectors', 'featuredProjects', 'latestPosts', 'stats', 'locale', 'partners', 'solutionPartners'
        ));
    }
}
