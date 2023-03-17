<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use App\Models\Like;
use App\Models\Follow;
use App\Models\Notification;

class FollowController extends Controller
{
    public function follow( User $user)
    {
        $id=$user->id;
  
    Follow::create([
        'user_id' => Auth::id(),
        'follower_id' => $id
    ]);

    Notification::create([
        'send_user_id' => Auth::id(),
        'got_user_id' => $id,
        'message' => 'フォローされました'
    ]);

    return redirect()->back();
    }

    public function unfollow( User $user)
    {
    $id=$user->id;
    $follow = Follow::where('follower_id', $id)->where('user_id', Auth::id())->first();
    $follow->delete();

    $notification = Notification::where('got_user_id', $id)->where('send_user_id', Auth::id())->first();
    $notification->delete();



    return redirect()->back();
    }
}
