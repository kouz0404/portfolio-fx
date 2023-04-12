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
        <form action="{{ route('logout') }}" method="post">                   
        @csrf
        <button type="submit">Logout</button>
        </form>
        @endauth
    </div>
    
</div>

<div class="subtitle">
 
</div>

<div class="mypage-body">  
<div class="main">

    <div class="reply-post">
        <div class="post">
            <div class="icon">
            @if(isset($user->image_name))
                <a href="/mypage/{{$user->id}}"><img src="/storage/{{$user->image_name}}" alt=""></a>
            @elseif($user->image_name === null)
                <a href="/mypage/{{$user->id}}"><img src="../img/profile.png" alt=""></a>
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
        <form  class="reply form" action="{{url('reply')}}" method="post" >
                {{ csrf_field() }}
                <div class="reply-input">
                    <textarea  class="reply-text" name="body" id="" placeholder=" 返信" maxlength="300" required></textarea>
                    <input type="hidden" name="post_id" value="{{$post->id}}"> 
                    <button type="submit" class="reply-btn">送信</button>
                </div>
        </form>

        </div>



        @foreach($replys as $reply)
            <div class="each-post">
                <div class="post">
                    <div class="icon">
                        @if(isset($reply->user->image_name))
                        <a href="/mypage/{{$reply->user->id}}"><img src="/storage/{{$reply->user->image_name}}" alt=""></a>
                        @else
                        <a href="/mypage/{{$reply->user->id}}"><img src="../img/profile.png" alt=""></a>
                        @endif
                    </div>

                    <div class="post-body">
                        <div class="acount-name">
                            <p>{{$reply->user->name}}・{{$reply->user->nickname}}</p>
                            @if(Auth::id() == $reply->user->id)
                            <form action="/reply/{{$reply->id}}" method="POST">
                                {{ csrf_field() }}
                                <button type="submit" class="delete-post">削除</button>
                            </form>
                            @endif
                            
                        </div>

                        <div class="post-write">
                            {{$reply->body}} 
                        </div>
                        
                    </div>

                </div>

                </div>
            @endforeach
        
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