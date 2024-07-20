<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\RegisterRequest;

class UserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    // public function store(Request $request)
    public function store(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        //    // バリデーション
        //     $validator = Validator::make($request->all(), [
        //         'name' => ['required', 'string', 'max:255'],
        //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //         'password' => ['required', 'string', 'min:8'],
        //     ]);
        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }

        // // ユーザー作成
        // $user = new User();
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = Hash::make($request->password);
        // $user->save();
        // return redirect('/login')->with('success', '会員登録が完了しました。ログインしてください。');

        Auth::login($user);

        return redirect()->route('thanks');
    }

    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // バリデーション
        // $credentials = $request->only('email', 'password');
        // if (Auth::attempt($credentials)) {
        //     return redirect()->intended('/');
        // }
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt($request->only('email', 'password'))) {
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
