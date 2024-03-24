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
<?php
    // require('db.php');
    // session_start();
    // // When form submitted, check and create user session.
    // if (isset($_POST['username'])) {
    //     $username = stripslashes($_REQUEST['username']);    // removes backslashes
    //     $username = mysqli_real_escape_string($con, $username);
    //     $email    = stripslashes($_REQUEST['email']);
    //     $email    = mysqli_real_escape_string($con, $email);
    //     $password = stripslashes($_REQUEST['password']);
    //     $password = mysqli_real_escape_string($con, $password);
        
    //     // Check user is exist in the database
    //     $query    = "SELECT * FROM `users` WHERE  email = '$email' AND password='" . md5($password) . "' ";
    //     $result = mysqli_query($con, $query) or die(mysql_error());
    //     // print_r($result['id']);

    //     $rows = mysqli_num_rows($result);
    //     $result = mysqli_fetch_assoc($result);
        

    //     // print_r($result);
    //     // exit();
        
        
    //     if ($rows == 1) {
            
    //         $_SESSION['id'] = $result['id'];
    //         $_SESSION['username'] = $username;
    //         $_SESSION['email'] = $email;
    //         $_SESSION['image'] = $result['image'];

            
            
    //         // Redirect to user dashboard page
    //         header("Location: dashboard.php");
    //     } else {
    //         echo "<div class='form'>
    //               <h3>Incorrect Username/password.</h3><br/>
    //               <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
    //               </div>";
    //     }
    // } else {
?>
<?php 
$password = '';
$email = '';
if(session()->has('pasword')){
    $password =session()->get('pasword');
    $email =session()->get('email');
}


?>
    

    <form class="form" action="{{route('login-user')}}" method="post" name="login">
        @csrf
    @if (!empty($success))
        <div class="d-none">{{$success}}</div>
        @endif
        <h1 class="login-title">Login</h1>
        <!-- <label for="username">Enter Your Username </label>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/> -->
        <label for="email">Enter Your Email Address </label>
        <input type="email" class="login-input" name="email"  placeholder="Email" autofocus="true"/>
        <label for="password">Enter Your Password</label>
        <input type="password" class="login-input"  name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button submit_btn"/>
        <p class="link">Don't have an account? <a href="/">Registration Now</a></p>
        <p class="link">Don't have an account? <a href="/">Forgot pasword</a></p>
  </form>
<?php
    // }
?>
</body>
</html>
