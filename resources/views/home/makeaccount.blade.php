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

    <div class='home-btn'>
       <a href="/home"><button >ホームに戻る</button></a> 
    </div>
    
</div>

<div class="subtitle">
<h3>Make Account</h3>
</div>

<div class="post-home">

    <div class="post-main"> 

            <div class="login-form">
            <form action="post.php" method="post" enctype="multipart/form-data">
                <div class="account-img">
                    <img src="./img/うまる.png" alt="">
                </div>
                <input class="user-input" type="file">
                <input class="user-input"  type="text" placeholder="AccountName (Taro)">
                <input class="user-input" type="text" placeholder="nickname (taro@0101)">
                <input class="user-input" type="email" placeholder="email">
                <input class="user-input" type="password" placeholder="password">
                <button class="login-btn" type="submit"> Make Account</button>
            

            </form>
            </div>

    </div>





</body>

@endsection
</html>