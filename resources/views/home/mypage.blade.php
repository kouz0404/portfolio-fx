@extends('layouts.app')

@section('subtitle')
<h3>MYPAGE</h3>
@endsection

@section('content')
<div class="mypage-body">  

    <div class="mypage-main">

    <div class="my-account">

        <div class="my-accountbody">
            <div class="account-img">
                @if(isset($user->image_name))
                <img src="{{$user->image_name}}" alt="">
                @else
                <img src="./img/profile.png" alt="">
                @endif
            </div>

            <div class="my-accountname">
                <p>{{$user->name}}<br>
                <span>@</span>{{$user->nickname}}</p>
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
                            <img src="{{$user->image_name}}" alt="">
                        @else
                            <img src="./img/profile.png" alt="">
                        @endif
                    </div>

                    <div class="post-body">
                        <div class="acount-name">
                            <p>{{$user->name}}@<span>{{$user->nickname}}　{{$post->created_at->format('m月d日H:i')}}</p>
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
                            <img class="image" src="{{$post->image_name}}" alt="">
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
</div>
@endsection