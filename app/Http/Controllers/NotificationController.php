<?php

namespace App\Http\Controllers;
use App\Models\Notification;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;

class NotificationController extends Controller
{
    public function index()
    {
        
        $id = Auth::id();
        //通知が存在するかどうか分岐させる
        if(Notification::where('got_user_id',$id)->exists()){

        $followeds = Notification::where('got_user_id',$id)->orderByDesc('created_at')->with('user')->get();
 
        $notifications = Notification::orderByDesc('created_at')->get();
        return view('home.notification', 
        ['notifications' => $notifications, 'followeds' =>$followeds,]);

        }else{
            return view('home.notification',);
        }
    }
}
