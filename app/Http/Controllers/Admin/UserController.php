<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('sort_order', 'asc')->paginate(15);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'position' => ['nullable', 'string', 'max:255'],
            'bio'      => ['nullable', 'string'],
            'role'     => ['required', 'string', 'in:super-admin,user'],
            'photo'    => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:1024'],
        ]);

        $user = User::create([
            'name'       => $request->name,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
            'position'   => $request->position,
            'bio'        => $request->bio,
            'is_visible' => $request->has('is_visible'),
            'can_login'  => $request->has('can_login'),
            'sort_order' => $request->sort_order ?? 0,
        ]);

        if ($request->hasFile('photo')) {
            $user->updateProfilePhoto($request->file('photo'));
        }

        $user->assignRole($request->role);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'position' => ['nullable', 'string', 'max:255'],
            'bio'      => ['nullable', 'string'],
            'role'     => ['required', 'string', 'in:super-admin,user'],
            'photo'    => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:1024'],
        ]);

        if ($request->filled('password')) {
            $request->validate([
                'password' => ['confirmed', Rules\Password::defaults()],
            ]);
            $user->password = Hash::make($request->password);
        }

        $user->update([
            'name'       => $request->name,
            'email'      => $request->email,
            'position'   => $request->position,
            'bio'        => $request->bio,
            'is_visible' => $request->has('is_visible'),
            'can_login'  => $request->has('can_login'),
            'sort_order' => $request->sort_order ?? 0,
        ]);

        if ($request->hasFile('photo')) {
            $user->updateProfilePhoto($request->file('photo'));
        }

        $user->syncRoles([$request->role]);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        if ($user->email === 'info@skylinksolutions.co.tz') {
            return back()->with('error', 'The default admin user cannot be deleted.');
        }

        if ($user->id === auth()->id()) {
            return back()->with('error', 'You cannot delete yourself.');
        }

        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted.');
    }

    public function toggleVisibility(User $user)
    {
        if ($user->email === 'info@skylinksolutions.co.tz') {
            return back()->with('error', 'The default admin user visibility cannot be changed.');
        }
        $user->update(['is_visible' => !$user->is_visible]);
        return back()->with('success', 'User visibility updated.');
    }

    public function toggleLogin(User $user)
    {
        if ($user->email === 'info@skylinksolutions.co.tz') {
            return back()->with('error', 'The default admin user login cannot be disabled.');
        }
        $user->update(['can_login' => !$user->can_login]);
        return back()->with('success', 'User login ability updated.');
    }
}
