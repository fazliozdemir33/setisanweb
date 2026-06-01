<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        // Only show top-level (parent) services on listing page
        $services = Service::active()->parents()->get();
        return view('frontend.services.index', compact('services'));
    }

    public function show(string $slug)
    {
        $service = Service::where('slug', $slug)->where('is_active', true)->firstOrFail();

        // If this service has children, show them on the parent page
        $children = $service->activeChildren()->get();
        $relatedProjects = $service->projects()->where('is_active', true)->limit(6)->get();
        $otherServices = Service::active()->parents()->where('id', '!=', $service->id)->limit(4)->get();

        return view('frontend.services.show', compact('service', 'children', 'relatedProjects', 'otherServices'));
    }

    public function showChild(string $parentSlug, string $childSlug)
    {
        $parent = Service::where('slug', $parentSlug)->where('is_active', true)->firstOrFail();
        $service = Service::where('slug', $childSlug)
                          ->where('parent_id', $parent->id)
                          ->where('is_active', true)
                          ->firstOrFail();

        $relatedProjects = $service->projects()->where('is_active', true)->limit(6)->get();
        $siblingServices = $parent->activeChildren()->where('id', '!=', $service->id)->get();

        return view('frontend.services.sub-show', compact('service', 'parent', 'relatedProjects', 'siblingServices'));
    }
}
