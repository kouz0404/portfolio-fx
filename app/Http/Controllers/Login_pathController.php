<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//ログインしていない場合にこちらのコントローラーを通じてログインページに飛ばす
class Login_pathController extends Controller
{    public function index(Request $request){;
    return view('home.login_path');
}
}
