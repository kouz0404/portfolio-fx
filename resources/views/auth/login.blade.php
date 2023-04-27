
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>TellMyFx</title>
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
<h3>Login</h3>
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
                <form action="{{ url('login') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                    <input class="user-input" type="email" placeholder="email" name="email">

                    <input  class="user-input" type="password" placeholder="password" name="password">

                    <button class="login-btn" type="submit"> Login</button>
                
                    <a href="{{ route('register') }}">アカウントを作る</a>
                </form>
            </div>
    </div>
</div>
</body>
</html>

