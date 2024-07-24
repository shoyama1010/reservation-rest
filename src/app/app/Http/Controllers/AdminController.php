<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        // 店舗代表者の数を取得
        $owners = User::whereHas('roles', function ($query) {
            $query->where('name', 'owner');
        // })->get();
        })->count();
        // return view('admin.dashboard', compact('owners'));

        // 一般ユーザーの数を取得
        $userCount = User::whereHas('roles', function ($query) {
            $query->where('name', 'user');
        })->count();

        // ダッシュボードビューを表示し、データを渡す
        return view('admin.dashboard', compact('ownerCount', 'userCount'));
    }
    // 店舗代表者の一覧を表示
    public function index()
    {
        // 店舗代表者のリストを取得
        $owners = User::whereHas('roles', function ($query) {
            $query->where('name', 'owner');
        })->get();
        
        // ビューを表示し、店舗代表者のリストを渡す
        return view('admin.owners.index', compact('owners'));
    }

    public function create()
    {
        return view('admin.owners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            // 'password' => 'required|string|min:8|confirmed',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $ownerRole = Role::where('name', 'owner')->first();
        $user->roles()->attach($ownerRole);

        return redirect()->route('admin.owners.index');
    }

    public function edit(User $owner)
    {
        return view('admin.owners.edit', compact('owner'));
    }

    public function update(Request $request, User $owner)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $owner->id,
            // 'password' => 'nullable|string|min:8|confirmed',
            'password' => 'nullable|string|min:8',
        ]);

        $owner->name = $request->name;
        $owner->email = $request->email;

        if ($request->filled('password')) {
            $owner->password = Hash::make($request->password);
        }
        $owner->save();

        return redirect()->route('admin.owners.index');
    }

    public function destroy(User $owner)
    {
        $owner->delete();
        return redirect()->route('admin.owners.index');
    }
}
