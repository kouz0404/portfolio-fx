<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use App\Models\Like;

class Postcontroller extends Controller
{
//会員限定に
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){;
        return view('home.post');
    }

    //投稿を登録
    public function create(Request $request)
    {
    
    // フォームに入力される情報
    $body = $request->input('body');
    //一応画像を変数に定義しています。
    $image_name = $request->file('image_name');

   //ログインしているユーザーIDを取得
    $user_id = Auth::id();

    //画像がある場合には保存するようにifで分岐
    if($request->has('image_name')){

    $image_extension = $request->file('image_name')->getClientOriginalExtension();
    $path = $user_id.'_'.date('YmdHis').'.'.$image_extension;
    $request->file('image_name')->storeAS('',$path,'public');

    Post::insert(
        [
           "body" => $body,
           "image_name" => $path,
           "user_id" => $user_id,
           'created_at' => now(),
           'updated_at' => now()

        ]);
    }else{
    Post::insert(
        [
            "body" => $body,
            "user_id" => $user_id,
            'created_at' => now(),
            'updated_at' => now()
        
        ]);}     
    return redirect()->to('/home');
    }

}








