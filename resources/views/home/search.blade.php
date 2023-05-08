@extends('layouts.app')

@section('subtitle')
<h3>SEARCH</h3>
@endsection

@section('content')
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
                        <a href="/mypage/{{$post->user->id}}"><img src="{{$post->user->image_name}}" alt=""></a>
                    @elseif($post->user->image_name === null)
                        <a href="/mypage/{{$post->user->id}}"><img src="./img/profile.png" alt=""></a>
                    @endif
                </div>

                <div class="post-body">
                    <div class="acount-name">
                        <p> {{$post->user->name}}@<span>{{$post->user->nickname}} 　{{$post->created_at->format('m月d日H:i')}}</p>
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
    </div>
</div>

<div class="panel tab-user">
    <div class="main">

        @foreach($users as $user)
        <div class="each-post">
            <div class="post">
                <div class="icon">
                    @if(isset($user->image_name))
                        <a href="/mypage/{{$user->id}}"><img src="{{$user->image_name}}" alt=""></a>
                    @elseif($user->image_name === null)
                        <a href="/mypage/{{$user->id}}"><img src="./img/profile.png" alt=""></a>
                    @endif
                </div>

                <div class="post-body">

                    <div class="acount-name">
                        <p> {{$user->name}}@<span>{{$user->nickname}} </p>
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


@endsection