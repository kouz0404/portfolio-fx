@extends('layouts.app')

@section('subtitle')
<h3>NOTIFICATIONS</h3>
@endsection

@section('content')
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
                            <p class="message">{{$followed->user->name}}{{$followed->message}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
            @endif
           
    
        </div>
    </div>
</div>

@endsection