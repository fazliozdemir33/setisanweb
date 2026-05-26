<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index()
    {
        return view('admin.media.index');
    }

    public function store(Request $request)
    {
        $request->validate(['file' => 'required|file|max:10240|mimes:jpg,jpeg,png,webp,gif,svg,pdf']);
        $path = $request->file('file')->store('media', 'public');
        return response()->json(['path' => $path, 'url' => asset('storage/' . $path)]);
    }

    public function destroy($id)
    {
        return back()->with('success', 'Medya silindi.');
    }
}
