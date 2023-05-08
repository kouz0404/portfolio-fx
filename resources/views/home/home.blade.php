@extends('layouts.app')

@section('subtitle')
<h3>Home</h3>
@endsection

@section('content')
<div class="home">
    <div class="main">
        <div class="tabs">
            <input id="all" type="radio" name="tab_item" checked>
            <label class="tab_item" for="all">All</label>
            <input id="programming" type="radio" name="tab_item">
            <label class="tab_item" for="programming">Follows</label>
            <div class="tab_content" id="all_content">
                <div class="tab_content_description">
                @foreach($posts as $post)
                    <div class="home-each-post">
                        <div class="post">

                            <div class="icon">
                                @auth
                                    @if(isset($post->user->image_name))
                                        <a href="/mypage/{{$post->user->id}}"><img src="{{$post->user->image_name}}" alt=""></a>
                                    @elseif($post->user->image_name === null)
                                        <a href="/mypage/{{$post->user->id}}"><img src="./img/profile.png" alt=""></a>
                                    @endif
                                @endauth

                                @guest
                                    @if(isset($post->user->image_name))
                                        <img src="{{$post->user->image_name}}" alt="">
                                    @elseif($post->user->image_name === null)
                                        <img src="./img/profile.png" alt="">
                                    @endif
                                @endguest
                            </div>
                            

                                
                            <div class="post-body">
                                <a href="/reply/{{$post->id}}">
                                <div class="acount-name">
                                    <p>{{$post->user->name}}@<span>{{$post->user->nickname}}</span>　{{$post->created_at->format('m月d日H:i')}}</p>
                                </div>

                                <div class="post-write">
                                    {{$post->body}}
                                </div>
                                
                                </a>

                                @if(isset($post->image_name))
                                <div class="post-img">
                                    <img class="image" src="{{$post->image_name}}" alt="">
                                
                                <script src="https://cdn.jsdelivr.net/npm/medium-zoom@1.0.6/dist/medium-zoom.min.js"></script>
                                <script>
                                    // imageクラスがついている画像に対し、medium-zoomを適用します
                                    mediumZoom(document.querySelectorAll(".image"));
                                    // これだけでmedium-zoomが適用された画像をクリックすると、拡大されるようになります。
                                </script>
                                </div>
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

                                    <a href="/reply/{{$post->id}}"><img src="../img/reply.png" alt="" class="reply-img"></a>
                                    <p>{{ $post->replys->count() }}</p>
                                </div>
                                
                                @endauth
                            </div>
                        </div>
                    </div>       
                @endforeach
                </div>
            </div>

            <div class="tab_content" id="programming_content">
                <div class="tab_content_description">
                @foreach($followerposts as $followerpost)
                    <div class="home-each-post">
                        <div class="post">

                            <div class="icon">
                                @auth
                                    @if(isset($followerpost->user->image_name))
                                        <a href="/mypage/{{$followerpost->user->id}}"><img src="{{$followerpost->user->image_name}}" alt=""></a>
                                    @elseif($followerpost->user->image_name === null)
                                        <a href="/mypage/{{$followerpost->user->id}}"><img src="./img/profile.png" alt=""></a>
                                    @endif
                                @endauth

                                @guest
                                    @if(isset($followerpost->user->image_name))
                                        <img src="{{$followerpost->user->image_name}}" alt="">
                                    @elseif($followerpost->user>image_name === null)
                                        <img src="./img/profile.png" alt="">
                                    @endif
                                @endguest
                            </div>
                            

                                
                            <div class="post-body">
                                <a href="/reply/{{$followerpost->id}}">
                                <div class="acount-name">
                                    <p>{{$followerpost->user->name}}@<span>{{$followerpost->user->nickname}}　{{$post->created_at->format('m月d日H:i')}}</p>
                                </div>

                                <div class="post-write">
                                    {{$followerpost->body}}
                                </div>
                                
                                </a>

                                @if(isset($followerpost->image_name))
                                <div class="post-img">
                                    <img class="image" src="{{$followerpost->image_name}}" alt="">
                                
                                <script src="https://cdn.jsdelivr.net/npm/medium-zoom@1.0.6/dist/medium-zoom.min.js"></script>
                                <script>
                                    // imageクラスがついている画像に対し、medium-zoomを適用します
                                    mediumZoom(document.querySelectorAll(".image"));
                                    // これだけでmedium-zoomが適用された画像をクリックすると、拡大されるようになります。
                                </script>
                                </div>
                                @endif

                                @auth
                                <div class="win-lose">
                                @if($followerpost->likes()->where('user_id', Auth::user()->id)->count() == 1)
                                    <a href="{{ route('unlike', $followerpost) }}"><img src="./img/win.png" alt="" class="win"></a>
                                    <p>{{ $followerpost->likes->count() }}</p>
                                @else
                                    <a href="{{ route('like', $followerpost) }}"><img src="./img/win.png" alt="" class="win"></a>
                                    <p>{{ $followerpost->likes->count() }}</p>
                                @endif

                                    <a href="/reply/{{$followerpost->id}}"><img src="../img/reply.png" alt="" class="reply-img"></a>
                                    <p>{{ $followerpost->replys->count() }}</p>
                                </div>
                                
                                @endauth
                            </div>
                        </div>
                    </div>       
                @endforeach
                </div>
            </div>


        </div>   
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

@endsection