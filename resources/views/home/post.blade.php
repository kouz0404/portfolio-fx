@extends('layouts.app')

@section('subtitle')
<h3>POST</h3>
@endsection


@section('content')
    <div class="post-main">
        <div class="post-form">
            <p>FXに関係のない投稿はアカウント停止になる可能性がございます。</p>
            <form action="{{url('post')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <textarea  class="post-text" name="body" id="" placeholder="投稿内容を入力" maxlength="300" required></textarea>

                <div class="file-btn">
                    <div><input name="image_name" type="file"></div>
                    <div class="post-btn"><button type="submit"> POST</button></div>
                </div>
            </form>
        </div>
    </div>
@endsection