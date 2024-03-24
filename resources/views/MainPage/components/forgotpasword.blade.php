<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <!-- <link rel="stylesheet" href="style.css"/> -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}"/>
    
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
<link rel="stylesheet" href="{{asset('css/simple-grid.css')}}">

</head>
<body>


    

    <form class="form" action="{{route('login-user')}}" method="post" name="login">
  
        <h1 class="login-title">FORGOT PASSWORD</h1>
        <!-- <label for="username">Enter Your Username </label>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/> -->
        <label for="email">Enter Your Email Address </label>
        <input type="email" class="login-input" name="email"  placeholder="Email" autofocus="true"/>
       
        <input type="submit" value="Send" name="submit" class="login-button submit_btn"/>
     
  </form>

</body>
</html>
