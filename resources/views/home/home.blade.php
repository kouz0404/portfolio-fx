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
        <h1>Tell My FX</h1>
    </div>

    <div class='login'>
        @guest
            <a href="/login"><button>Login</button></a> 
        @endguest

        @auth
            <form action="{{ route('logout') }}" method="post">                   
                @csrf
                <button type="submit">Logout</button>
            </form>
        @endauth
    </div>
    
</div>

<div class="subtitle">
    <h3>Home</h3>
</div>


<div class="home">


    <div class="main">
   
        @foreach($posts as $post)
        <div class="each-post">
            <div class="post">

                <div class="icon">
                @auth
                    @if(isset($post->user->image_name))
                        <a href="/mypage/{{$post->user->id}}"><img src="/storage/{{$post->user->image_name}}" alt=""></a>
                    @elseif($post->user->image_name === null)
                        <a href="/mypage/{{$post->user->id}}"><img src="./img/profile.png" alt=""></a>
                    @endif
                @endauth

                @guest
                    @if(isset($post->user->image_name))
                        <img src="/storage/{{$post->user->image_name}}" alt="">
                    @elseif($post->user->image_name === null)
                        <img src="./img/profile.png" alt="">
                    @endif
                @endguest
                </div>

                <a href="/reply/{{$post->id}}">
                <div class="post-body">
                    <div class="acount-name">
                        <p>{{$post->user->name}}・{{$post->user->nickname}}</p>
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

                    @auth
                    <div class="win-lose">
                    @if($post->likes()->where('user_id', Auth::user()->id)->count() == 1)
                        <a href="{{ route('unlike', $post) }}"><img src="./img/win.png" alt="" class="win"></a>
                        <p>{{ $post->likes->count() }}</p>
                    @else
                        <a href="{{ route('like', $post) }}"><img src="./img/win.png" alt="" class="win"></a>
                        <p>{{ $post->likes->count() }}</p>
                    @endif
                    </div>
                    @endauth

                </div>
                </a>
    
            </div>

        </div>
        @endforeach
       
    </div>  
    

    <div class="side">
        <h2>おすすめ勉強サイト</h2>
        
        <a href="https://www.youtube.com/@fx7708"><p>クロユキ Youtube</p></a>
        <a href="https://www.youtube.com/@fx860"><p>ハイトレFX億トレーダーへの道 Youtube</p></a>

        <h2>おすすめ口座</h2>
        
        <a href="https://xem.fxsignup.com/"><p>XM TRADING</p></a>
       
        <div class="ad">
            AD
            <img src="" alt="">
        </div>

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


</body>
</html>