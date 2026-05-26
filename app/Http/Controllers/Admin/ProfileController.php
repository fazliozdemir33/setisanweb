<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function index()
    {
        $user = \App\Models\AdminUser::find(session('admin_id'));
        if (!$user) return redirect()->route('admin.login');
        return view('admin.profile.index', compact('user'));
    }

    public function update(Request $request)
    {
        $user = \App\Models\AdminUser::find(session('admin_id'));
        if (!$user) return redirect()->route('admin.login');

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:admin_users,email,' . $user->id,
            'password' => ['nullable', 'confirmed', Password::defaults()],
        ]);

        if ($request->filled('password')) {
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'Mevcut şifreniz hatalı.']);
            }
            $user->password = Hash::make($request->password);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        // Update session name if changed
        session(['admin_name' => $user->name]);

        return redirect()->route('admin.profile.index')->with('success', 'Profil bilgileriniz başarıyla güncellendi.');
    }
}
