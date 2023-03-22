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
<h3>MyPage</h3>
</div>

<div class="mypage-body">  

    <div class="mypage-main">

    <div class="my-account">

        <div class="my-accountbody">
            <div class="account-img">
                @if(isset($user->image_name))
                <img src="/storage/{{$user->image_name}}" alt="">
                @else
                <img src="./img/profile.png" alt="">
                @endif
            </div>

            <div class="my-accountname">
                <p>{{$user->name}}<br>
                {{$user->nickname}}</p>
            @if(!isset($user->introduce))
                <p class="intro-p">自己紹介をしよう</p>
            @endif
                <p>{{$user->introduce}}</p>
                <a href="/accountedit" ><button class="login-btn">編集</button></a>
                <p>follow {{$follow->count()}}・follower {{$follower->count()}}</p>
            </div>
    
        </div>
    </div>



    <div class="main">

        @if(!isset($posts))
            <b>投稿はまだありません</b>
        @elseif(isset($posts))
           
            @foreach($posts as $post)
            <div class="each-post">
                <div class="post">
                    <div class="icon">
                        @if(isset($user->image_name))
                            <img src="/storage/{{$user->image_name}}" alt="">
                        @else
                            <img src="./img/profile.png" alt="">
                        @endif
                    </div>

                    <div class="post-body">
                        <div class="acount-name">
                            <p>{{$user->name}}・{{$user->nickname}}</p>
                            <form action="/delete/{{$post->id}}" method="POST">
                                {{ csrf_field() }}
                                <button type="submit" class="delete-post">削除</button>
                            </form>
                        </div>

                        <div class="post-write">
                            {{$post->body}} 
                        </div>
                        
                        @if(isset($post->image_name))
                        <div class="post-img">
                            <img class="image" src="/storage/{{$post->image_name}}" alt="">
                        </div>
                        <script src="https://cdn.jsdelivr.net/npm/medium-zoom@1.0.6/dist/medium-zoom.min.js"></script>
                        <script>
                            // imageクラスがついている画像に対し、medium-zoomを適用します
                            mediumZoom(document.querySelectorAll(".image"));
                            // これだけでmedium-zoomが適用された画像をクリックすると、拡大されるようになります。
                        </script>
                        @endif
                        <div class="win-lose">
                        @if($post->likes()->where('user_id', Auth::user()->id)->count() == 1)
                            <a href="{{ route('unlike', $post) }}"><img src="./img/win.png" alt="" class="win"></a>
                            <p>{{ $post->likes->count() }}</p>
                        @else
                            <a href="{{ route('like', $post) }}"><img src="./img/win.png" alt="" class="win"></a>
                            <p>{{ $post->likes->count() }}</p>
                        @endif
                        <a href="/reply/{{$post->id}}"><img src="../img/reply.png" alt="" class="reply-img"></a>
                                    <p>{{ $post->replys->count() }}</p>
                        </div>
                    </div>

                </div>

                </div>
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