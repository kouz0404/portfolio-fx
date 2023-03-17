<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/style.css')  }}">
    <title>Document</title>
</head>




<body class="all-body">

<div class="header">
     <div class='haikei'>
        <a href="/home"><h1>Tell My FX</h1></a>
    </div>


    <div class='login'>
        @auth
    <a href="/home"><button>Home</button></a> 
    @endauth
    </div>
    
</div>
<div class="subtitle">
<h3>ProfilePage</h3>
</div>

<div class="mypage-body">  

    <div class="mypage-main">

    <div class="my-account">

        <div class="my-accountbody">
            <div class="account-img">
                @if(isset($user->image_name))
                <img src="/storage/{{$user->image_name}}" alt="">
                @else
                <img src="../img/profile.png" alt="">
                @endif
            </div>

                <div class="my-accountname">
                <b>{{$user->name}}</b>
                <p class="nickname-p">{{$user->nickname}}</p>

                @if(isset($user->introduce))
                <p>{{$user->introduce}}</p>

                

                @endif

                @if($Follows->where('user_id', Auth::user()->id)->count() == 1)
                <a href="/unfollow/{{$user->id}}" >
                    <button class="login-btn">unFollow</button></a>

                    @else
                <a href="/follow/{{$user->id}}">
                <button class="login-btn">Follow</button></a>
                @endif

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
                <img src="../img/profile.png" alt="">
                @endif
                </div>

                <div class="post-body">

                    <div class="acount-name">
                    <p>{{$user->name}}・{{$user->nickname}}</p>

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
                            <a href="{{ route('unlike', $post) }}"><img src="../img/win.png" alt="" class="win"></a>
                            <p>{{ $post->likes->count() }}</p>
                        @else
                            <a href="{{ route('like', $post) }}"><img src="../img/win.png" alt="" class="win"></a>
                            <p>{{ $post->likes->count() }}</p>
                        @endif
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
    <a href="/home"><li><img  class="footer-img" src="../img/teacher.png" alt=""></li></a>
        <a href="/post"><li><img  class="footer-img" src="../img/post.png" alt=""></li></a>
        <a href="/search"><li><img  class="footer-img" src="../img/search.png" alt=""></li></a>
        <a href="/notification"><li><img  class="footer-img" src="../img/notification.png" alt=""></li></a>
        <a href="/mypage"><li><img  class="footer-img" src="../img/user.png" alt=""></li></a>
    </ul>
    </nav>
</div>