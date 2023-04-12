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
        <a href="/home"><h1>Tell My FX</h1></a>
    </div>

    <div class='login'>
        <form action="{{ route('logout') }}" method="post">                   
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
    
</div>

<div class="subtitle">
    <h3>POST</h3>
</div>

<div class="post-home">

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


    <nav class="footer">
        <ul>
            <a href="/home"><li><img  class="footer-img" src="./img/teacher.png" alt=""></li></a>
            <a href="/post"><li><img  class="footer-img" src="./img/post.png" alt=""></li></a>
            <a href="/search"><li><img  class="footer-img" src="./img/search.png" alt=""></li></a>
            <a href="/notification"><li><img  class="footer-img" src="./img/notification.png" alt=""></li></a>
            <a href="/mypage"><li><img  class="footer-img" src="./img/user.png" alt=""></li></a>
        </ul>
    </nav>

</div>

</body>
</html>