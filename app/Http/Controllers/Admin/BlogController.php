<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = BlogPost::orderByDesc('created_at')->get();
        return view('admin.blog.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.blog.create');
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
            'category'      => 'nullable|string|max:100',
            'author'        => 'nullable|string|max:100',
            'published_at'  => 'nullable|date',
            'meta_title_tr' => 'nullable|string|max:255',
            'meta_title_en' => 'nullable|string|max:255',
            'meta_desc_tr'  => 'nullable|string',
            'meta_desc_en'  => 'nullable|string',
        ]);
        $data['is_published'] = $request->has('is_published');
        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('blog', 'public');
        }
        BlogPost::create($data);
        return redirect()->route('admin.blog.index')->with('success', 'Blog yazısı oluşturuldu.');
    }

    public function edit(BlogPost $blog)
    {
        return view('admin.blog.edit', compact('blog'));
    }

    public function update(Request $request, BlogPost $blog)
    {
        $data = $request->validate([
            'title_tr'      => 'required|string|max:255',
            'title_en'      => 'nullable|string|max:255',
            'excerpt_tr'    => 'nullable|string',
            'excerpt_en'    => 'nullable|string',
            'content_tr'    => 'nullable|string',
            'content_en'    => 'nullable|string',
            'category'      => 'nullable|string|max:100',
            'author'        => 'nullable|string|max:100',
            'published_at'  => 'nullable|date',
            'meta_title_tr' => 'nullable|string|max:255',
            'meta_title_en' => 'nullable|string|max:255',
            'meta_desc_tr'  => 'nullable|string',
            'meta_desc_en'  => 'nullable|string',
        ]);
        $data['is_published'] = $request->has('is_published');
        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('blog', 'public');
        }
        $blog->update($data);
        return redirect()->route('admin.blog.index')->with('success', 'Blog yazısı güncellendi.');
    }

    public function destroy(BlogPost $blog)
    {
        $blog->delete();
        return back()->with('success', 'Blog yazısı silindi.');
    }
}
