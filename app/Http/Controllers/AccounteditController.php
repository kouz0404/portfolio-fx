<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Post;
use Storage;

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
            'introduce' => 'max:255',
           
        ]);

    $id = Auth::id();
    $user = User::find($id);

    if($request->has('image_name')){

        //ローカル環境での画像保存方法
        //$image_extension = $request->file('image_name')->getClientOriginalExtension();
        //$path = $id.'_'.date('YmdHis').'.'.$image_extension;
        // 画像を"storage/app/public"に保存
    //$request->file('image_name')->storeAS('',$path,'public');

    $image_name = $request->file('image_name');

    $path = Storage::disk('s3')->putFile('myprefix', $image_name, 'public');
    // アップロードした画像のフルパスを取得
    $image_path = Storage::disk('s3')->url($path);

    $user->image_name = $image_path;
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
