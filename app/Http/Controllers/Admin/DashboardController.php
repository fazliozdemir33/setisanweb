<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Project;
use App\Models\BlogPost;
use App\Models\ContactMessage;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'services'  => Service::count(),
            'projects'  => Project::count(),
            'posts'     => BlogPost::count(),
            'messages'  => ContactMessage::where('is_read', false)->count(),
        ];

        $recentMessages = ContactMessage::latest()->limit(5)->get();

        return view('admin.dashboard', compact('stats', 'recentMessages'));
    }
}
