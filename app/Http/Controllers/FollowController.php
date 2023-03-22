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
        $send_user_name = $user->name;
  
    Follow::create([
        'user_id' => Auth::id(),
        'follower_id' => $id
    ]);

    Notification::create([
        'send_user_id' => Auth::id(),
        'got_user_id' => $id,
        'send_user_name' => $send_user_name,
        'message' => 'にフォローされました'
    ]);

    return redirect()->back();
    }

    public function unfollow( User $user)
    {
    $id=$user->id;
    $send_user_name = $user->name;

    $follow = Follow::where('follower_id', $id)->where('user_id', Auth::id())->first();
    $follow->delete();

    $notification = Notification::where('got_user_id', $id)->where('send_user_name', $send_user_name)->first();
    $notification->delete();



    return redirect()->back();
    }
}
