<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Project;
use App\Models\BlogPost;
use Illuminate\Support\Facades\Response;

class SitemapController extends Controller
{
    public function index()
    {
        $services  = Service::active()->get();
        $projects  = Project::active()->get();
        $posts     = BlogPost::published()->get();

        $content = view('frontend.sitemap', compact('services', 'projects', 'posts'))->render();

        return Response::make($content, 200, [
            'Content-Type' => 'application/xml',
        ]);
    }

    public function robots()
    {
        $content = "User-agent: *\nAllow: /\nDisallow: /yonetim/\n\nSitemap: " . url('/sitemap.xml');
        return Response::make($content, 200, ['Content-Type' => 'text/plain']);
    }
}
