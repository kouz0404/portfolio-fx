<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use App\Models\Like;
use App\Models\Reply;
use App\Models\Notification;

class ReplyController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->id;
        $send_user_id = Auth::id();
        $post = Post::find($id);
        $post_id = Post::where('id',$id)->value('user_id');
        $user = User::find($post_id);
        $replys = Reply::where('post_id', $id)->orderByDesc('created_at')->with('user')->get();


        return view('home.reply', ['post' => $post , 'user' => $user , 'replys' => $replys]);

        

    }

    public function create(Request $request)
    {
    
    // フォームに入力される情報
    $body = $request->input('body');
    $id = $request->input('post_id');
   //ログインしているユーザーIDを取得
    $send_user_id = Auth::id();

    $user_id = Post::where('id', $id)->value('user_id');
   

 

    Reply::insert(
        [
           "body" => $body,
           "post_id" => $id,
           "send_user_id" => $send_user_id,
           'created_at' => now(),
           'updated_at' => now(),

        ]); 

        Notification::create([
            'send_user_id' => Auth::id(),
            'got_user_id' => $user_id,
            'message' => 'あなたの投稿に返信をしました。'
        ]);
        
        
        return redirect()->back();
    }

    public function delete($id)
    {
    
    $user = Reply::find($id);
    $user->delete();
    return redirect()->back();
    }

    
}
