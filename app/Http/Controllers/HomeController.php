<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use App\Models\Like;
use App\Models\Notification;
use App\Models\Follow;




class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
 

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::orderByDesc('created_at')
        ->with('user')->get();

        $followuser = Follow::where('user_id', Auth::id())->value('follower_id');;
        $followerposts = Post::where('user_id', $followuser)->orderByDesc('created_at')
        ->with('user')->get();

        return view('home.home', ['posts' => $posts,
    'followerposts' => $followerposts]);

    }

     /**
     * LIKEする同時に通知
     */
     public function like(Post $post, Request $request)
     {
        $id=$post->id;
        $NTC_id=$post->user_id;
     Like::create([
         'post_id' => $id,
         'user_id' => Auth::id(),
     ]);

     Notification::create([
        'send_user_id' => Auth::id(),
        'got_user_id' => $NTC_id,
        'message' => 'にいいねされました'
    ]);

     return redirect()->back();
     }

     /**
      * LIKEと通知の削除
      */
     public function unlike(Post $post,  Request $request)
     {
        $id=$post->id;
        $NTC_id=$post->user_id;

     $like = Like::where('post_id', $id)->where('user_id', Auth::id())->first();
     $like->delete();

     $notification = Notification::where('got_user_id', $NTC_id)->where('send_user_id', Auth::id())->first();
     $notification->delete();

     return redirect()->back();
     }



}
