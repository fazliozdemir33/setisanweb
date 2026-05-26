<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::active()->get();
        return view('frontend.services.index', compact('services'));
    }

    public function show(string $slug)
    {
        $service = Service::where('slug', $slug)->where('is_active', true)->firstOrFail();
        $relatedProjects = $service->projects()->active()->limit(4)->get();
        $otherServices = Service::active()->where('id', '!=', $service->id)->limit(4)->get();

        return view('frontend.services.show', compact('service', 'relatedProjects', 'otherServices'));
    }
}
