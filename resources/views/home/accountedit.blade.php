<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>




<body class="all-body">



<div class="header">
     <div class='haikei'>
     <a href="/home"><h1>Tell My FX</h1></a>
    </div>
    <div class='home-btn'>
       <a href="/home"><button >ホームに戻る</button></a> 
    </div>
    
</div>

<div class="subtitle">
<h3>Account Edit</h3>
</div>

<div class="post-home">

    <div class="register-main"> 

            <div class="login-form">
            <form action="{{url('accountedit')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="account-img">
                @if(isset($user->image_name))
                <img src="/storage/{{$user->image_name}}" alt="">
                @else
                <img src="./img/profile.png" alt="">
                @endif
                </div>
                <input class="user-input" type="file" name='image_name' >
                <input class="user-input"  type="text" name='name' value="{{$user->name}}" placeholder="name">
                <input class="user-input" type="text" name='nickname' value="{{$user->nickname}}" placeholder="nickname">
                <input class="user-input" type="email" name='email' value="{{$user->email}}" placeholder="email">
                <input class="user-input" type="password"  name='password' placeholder="パスワード変更の際は新パスワードを入力してください">
                <textarea class="introduce" type="text" name='introduce'  placeholder="     introduce">{{$user->introduce}}</textarea>
                <button class="login-btn" type="submit">Edit</button>
            

            </form>
            </div>




    </div>







</body>
</html>