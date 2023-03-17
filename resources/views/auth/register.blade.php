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
<h3>Make Account</h3>
</div>

{{-- エラーメッセージ --}}
@if ($errors->any())
    <div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    </div>
@endif

<div class="post-home">

    <div class="post-main"> 

            <div class="login-form">
            <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="account-img">
                    <img src="./img/profile.png" alt="">
                </div>
                <label for="file_upload">アイコン画像を選ぶ
                <input id="file_upload" class="user-input" type="file" name="image_name">
                <input class="user-input"  type="text" name="name" placeholder="AccountName (Taro)">
                <input class="user-input" type="text" name="nickname" placeholder="nickname (taro@0101)">
                <input class="user-input" type="email" name="email" placeholder="email">
                <input class="user-input" type="password" name="password" placeholder="password">
                <input class="user-input" type="password"  name="password_confirmation" required autocomplete="new-password" placeholder="confirm password">
                <button class="login-btn" type="submit"> Make Account</button>
            

            </form>
            </div>

    </div>

    
</div>
