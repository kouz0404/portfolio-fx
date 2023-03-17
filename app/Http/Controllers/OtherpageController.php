<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use App\Models\Follow;
use App\Models\Notification;

class OtherpageController extends Controller
{


    
    public function index(Request $request){
        $id  = $request->id;
        $user = User::find($id);
        $posts = Post::where('user_id', $id)->orderByDesc('created_at')->get();
        $own_id = Auth::id();
        $Follows = Follow::where('follower_id', $id)->get();
        $follow= Follow::where('user_id',$id);
        $follower= Follow::where('follower_id',$id);
        
        //アイコンを押してIDが自分のものであるかを判断し他人のページと分ける
        if($own_id == $id){
            return redirect()->to('/mypage');
        }else{
            return view('home.otherpage',[
                'user' => $user ,   
                'posts' => $posts ,
                'Follows' => $Follows,
                'follow' => $follow,   
                'follower' => $follower,  
                ]);
        }
    }
}

