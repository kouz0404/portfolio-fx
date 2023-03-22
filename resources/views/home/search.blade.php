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
        <form action="{{ route('logout') }}" method="post">                   
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
    
</div>

<div class="subtitle">
    <h3>Search</h3>
</div>

<div class="search-box">
    <div class="search">
        <form method="GET" action="{{url('search')}}">
            <input class="search-input" type="text" placeholder="探したいキーワードを入力" name="search" value="@if (isset($search)) {{ $search }} @endif">
            <button type="submit">検索</button>
        </form>
    </div>


    <script src="{{ asset('js/tab.js') }}"></script>
    <div class="tab-panel">
        <!--タブ-->
        <ul class="tab-group">
            <li class="tab tab-A is-active">POSTs</li>
            <li class="tab tab-B">USERs</li>
        </ul>
        
        <!--タブを切り替えて表示するコンテンツ-->		
    </div>
</div>

<div class="home panel tab-post is-show">
    <div class="main">
        @foreach($posts as $post)
        <div class="each-post">
            <div class="post">
                <div class="icon">
                    @if(isset($post->user->image_name))
                        <a href="/mypage/{{$post->user->id}}"><img src="/storage/{{$post->user->image_name}}" alt=""></a>
                    @elseif($post->user->image_name === null)
                        <a href="/mypage/{{$post->user->id}}"><img src="./img/profile.png" alt=""></a>
                    @endif
                </div>

                <div class="post-body">
                    <div class="acount-name">
                        <p> {{$post->user->name}}・{{$post->user->nickname}} </p>
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
    </div>
</div>

<div class="panel tab-user">
    <div class="main">

        @foreach($users as $user)
        <div class="each-post">
            <div class="post">
                <div class="icon">
                    @if(isset($user->image_name))
                        <a href="/mypage/{{$user->id}}"><img src="/storage/{{$user->image_name}}" alt=""></a>
                    @elseif($user->image_name === null)
                        <a href="/mypage/{{$user->id}}"><img src="./img/profile.png" alt=""></a>
                    @endif
                </div>

                <div class="post-body">

                    <div class="acount-name">
                        <p> {{$user->name}}・{{$user->nickname}} </p>
                    </div>
                    <div class="post-write">
                        {{$user->introduce}}
                    </div>

                    <div class="post-img">
                        <img src="" alt="">
                    </div>

                </div>
    
                
            </div>
        </div>
        @endforeach
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