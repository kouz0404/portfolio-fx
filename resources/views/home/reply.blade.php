@extends('layouts.app')

@section('subtitle')
<h3>REPLY</h3>
@endsection

@section('content')
<div class="mypage-body">  
    <div class="reply-post">
        <div class="post">
            <div class="icon">
            @if(isset($user->image_name))
                <a href="/mypage/{{$user->id}}"><img src="{{$user->image_name}}" alt=""></a>
            @elseif($user->image_name === null)
                <a href="/mypage/{{$user->id}}"><img src="../img/profile.png" alt=""></a>
            @endif
            </div>

            <div class="post-body">
                <div class="acount-name">
                    <p>{{$user->name}}@<span>{{$user->nickname}}　{{$post->created_at->format('m月d日H:i')}}</p>
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

        @foreach($replys as $reply)
            <div class="each-post">
                <div class="post">
                    <div class="icon">
                        @if(isset($reply->user->image_name))
                        <a href="/mypage/{{$reply->user->id}}"><img src="{{$reply->user->image_name}}" alt=""></a>
                        @else
                        <a href="/mypage/{{$reply->user->id}}"><img src="../img/profile.png" alt=""></a>
                        @endif
                    </div>

                    <div class="post-body">
                        <div class="acount-name">
                            <p>{{$reply->user->name}}@<span>{{$reply->user->nickname}} 　{{$reply->created_at->format('m月d日H:i')}}</p>
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



@endsection