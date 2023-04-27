<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="{{ asset('/style.css')}}">
    <title>TellMyFx</title>
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
    @yield('subtitle')
</div>


<div class="content">
    @yield('content')
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


</body>
</html>
