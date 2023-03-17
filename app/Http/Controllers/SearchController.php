<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class SearchController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request){;
        $posts = Post::orderByDesc('created_at')->with('user')->get();

        $search = $request->input('search'); //フォームの入力値を取得

        //検索キーワードが空の場合
        if (empty($search)) {
            $users = User::paginate(50);  //全ユーザーを10件/ページで表示

        //検索キーワードが入っている場合
        } else {
            $_q = str_replace('　', ' ', $search);  //全角スペースを半角に変換
            $_q = preg_replace('/\s(?=\s)/', '', $_q); //連続する半角スペースは削除
            $_q = trim($_q); //文字列の先頭と末尾にあるホワイトスペースを削除
            $_q = str_replace(['\\', '%', '_'], ['\\\\', '\%', '\_'], $_q); //円マーク、パーセント、アンダーバーはエスケープ処理
            $keywords = array_unique(explode(' ', $_q)); //キーワードを半角スペースで配列に変換し、重複する値を削除

            $query = Post::query();
            foreach($keywords as $keyword) {
            $query->where(function($_query) use($keyword){
            $_query->where('body', 'LIKE', '%'.$keyword.'%');
            });

            }


            $posts = $query->paginate(50); //検索結果のユーザーを50件/ページで表示
          


            //ユーザーモデルからユーザーを検索
            $query = User::query();
            foreach($keywords as $keyword) {
            $query->where(function($_query) use($keyword){
            $_query->where('name', 'LIKE', '%'.$keyword.'%')
             ->orwhere('nickname', 'LIKE', '%'.$keyword.'%');
            });
            }

            $users = $query->paginate(50); //検索結果のユーザーを10件/ページで表示
        }

        return view('home.search', compact('posts','search','users'));
    }

 }

