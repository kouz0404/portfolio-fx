<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Post;

class AccounteditController extends Controller
{
    public function index(Request $request){;
     

        $id = Auth::id();
        $user = User::find($id);

        return view('home.accountedit',[
            'user' => $user ,    
            ]);
    }


    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:10',
            'nickname' => 'required',
            'email' => 'required',
            'introduce' => 'string|max:255',
           
        ]);

    $id = Auth::id();
    $user = User::find($id);

    if($request->has('image_name')){

        $image_extension = $request->file('image_name')->getClientOriginalExtension();
        $path = $id.'_'.date('YmdHis').'.'.$image_extension;
          
    
        // 画像を"storage/app/public"に保存
    $request->file('image_name')->storeAS('',$path,'public');

    $user->image_name = $path;
    $user->name = $request->input('name');
    $user->nickname = $request->input('nickname');
    $user->email = $request->input('email');
    $user->introduce = $request->input('introduce');
    
    if (isset($request['password'])) {

     $request['password'] = Hash::make($request['password']);
   
    $user->password = $request->input('password');
    }
    $user->save();
    #return redirect('greeting',['status' => 'UPDATE完了！']);　←error!
        return redirect('/mypage');



    }else{
    $user->name = $request->input('name');
    $user->nickname = $request->input('nickname');
    $user->email = $request->input('email');
    $user->introduce = $request->input('introduce');

    if (isset($request['password'])) {

     $request['password'] = Hash::make($request['password']);
   
    $user->password = $request->input('password');
    }
    $user->save();
 
        return redirect('/mypage');
    }

    }
    }
