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


    <div class='login'>
        @auth
        <form action="{{ route('logout') }}" method="post">                   
        @csrf
        <button type="submit">Logout</button>
        </form>
        @endauth
    </div>
    
</div>

<div class="subtitle">
    <h3>Notifications</h3>
</div>

<div class="mypage-body">  
    <div class="mypage-main">
        <div class="main">

            @if(!isset($followeds))
                <b>通知はまだありません</b>
            @else
           
            @foreach($followeds as $followed)
            @if(Auth::id() !== $followed->user->id)
            <div class="each-post">
                <div class="post">
                    <div class="icon">
                        @if(isset($followed->user->image_name))
                        <a href="/mypage/{{$followed->user->id}}"><img src="/storage/{{$followed->user->image_name}}" alt=""></a>
                        @else
                        <a href="/mypage/{{$followed->user->id}}"><img src="./img/profile.png" alt=""></a>
                        @endif
                    </div>

                    <div class="post-body">
                        <div class="post-write">
                            <p class="message">{{$followed->user->name}}に{{$followed->message}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
            @endif
           
    
        </div>
    </div>

    <nav class="footer">
        <ul>
            <a href="/home"><li><img  class="footer-img" src="./img/teacher.png" alt=""></li></a>
            <a href="/post"><li><img  class="footer-img" src="./img/post.png" alt=""></li></a>
            <a href="/search"><li><img  class="footer-img" src="./img/search.png" alt=""></li></a>
            <a href="/notification"><li><img  class="footer-img" src="./img/notification.png" alt=""></li></a>
            <a href="/mypage"><li><img  class="footer-img" src="./img/user.png" alt=""></li></a>
        </ul>
    </nav>
</div>