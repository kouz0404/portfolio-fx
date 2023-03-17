<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use App\Models\Like;
use App\Models\Follow;

class MypageController extends Controller
{
    //ログインしているか確認
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request){
        $id = Auth::id();
        $user = User::find($id);
        //フォローしている人
        $follow= Follow::where('user_id',$id);
        //フォローされている人
        $follower= Follow::where('follower_id',$id);
        
       //投稿があるかないかを判断
        if(Post::where('user_id',$id)->exists()){
        $posts = Post::where('user_id',$id)->orderByDesc('created_at')->get();
           
        return view('home.mypage',[
           'user' => $user , 
           'posts' => $posts, 
           'follow' => $follow,   
           'follower' => $follower,  
        ]);
        
        }else{
        return view('home.mypage',[
            'user' => $user , 
            'follow' => $follow,   
            'follower' => $follower, 
        ]);

        }

        }

    //投稿削除機能を追加
    public function delete($id)
        {
        
        $user = Post::find($id);
        $user->delete();
        return redirect()->to('/mypage');
        }

}
