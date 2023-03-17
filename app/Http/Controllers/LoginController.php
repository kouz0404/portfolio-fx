<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usersdata;

class Logincontroller extends Controller
{
    public function index(Request $request){
        return view('home.login');
    }


    public function login(Request $request)
    {
        $credebtials= $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // ログインに成功したとき
        if (Auth::attempt($credebtials)) {
            $request->session()->regenerate();
            return redirect()->route('/home');
        }

 

        // 上記のif文でログインに成功した人以外(=ログインに失敗した人)がここに来る
        return back()->withErrors([
            'login_error' => 'メールアドレス又はパスワードが間違っています。']);
    }
}

