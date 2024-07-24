<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\RegisterRequest;
use App\Models\Review;

class UserController extends Controller
{
    public function create()
    {
        return view('auth.register');
        // return view('register');
    }

    // public function store(Request $request)
    public function store(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('thanks');
    }

    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
       
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt($request->only('email', 'password'))) {

            // $user = auth()->user();
            // if ($user->hasRole('admin')) {
            //     return redirect()->route('admin.dashboard');
            // } 

            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'メールアドレスまたはパスワードが正しくありません。',
        ]);
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'ログアウトしました。');
    }

    public function mypage()
    {    
        $user = auth::user();
        $reservations = optional($user)->reservations;
        $favorites = optional($user)->favorites;
        return view('mypage', compact('reservations', 'favorites'));
    }

    public function thanks()
    {
        return view('thanks');
    }
}
