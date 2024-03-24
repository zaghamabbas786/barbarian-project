<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}"/>
    <script src="https://js.stripe.com/v3"></script>

<!--    <meta name="viewport" content="width=device-width">-->
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="{{asset('css/main.css')}}">
<link rel="stylesheet" href="{{asset('css/simple-grid.css')}}">

<!--    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>-->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js" type="text/javascript"></script>
<!--    Font Awesome - Social icons-->
<script src="https://kit.fontawesome.com/a0537503d5.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- validation jquery password link -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js" type="text/javascript"></script>
</head>
<body class="register_body">
<?php
//     require('db.php');
//     // When form submitted, insert values into the database.
//     if (isset($_REQUEST['username'])) {
//         // removes backslashes
//         $username = stripslashes($_REQUEST['username']);
//         //escapes special characters in a string
//         $username = mysqli_real_escape_string($con, $username);
//         $email    = stripslashes($_REQUEST['email']);
//         $email    = mysqli_real_escape_string($con, $email);
//         $password = stripslashes($_REQUEST['password']);
//         $password = mysqli_real_escape_string($con, $password);
//         $password_confirm = stripslashes($_REQUEST['password_confirm']);
//         $password_confirm = mysqli_real_escape_string($con, $password_confirm);

        
//         // $create_datetime = date("Y-m-d H:i:s");
//         $query    = "INSERT into `users` (username, password, cpassword, email,image)
//                      VALUES ('$username', '" . md5($password) . "','" . md5($password_confirm) . "', '$email','bydefault.jpg')";
//         $result   = mysqli_query($con, $query);
//         // Subject of confirmation email.
//         $conf_subject = 'Your recent enquiry';

//         // Who should the confirmation email be from?
//         $conf_sender = 'Barbarian  <no-reply@myemail.co.uk>';

//         $msg = $_REQUEST['username'] . ",\n\nThank you Your account created Successfully.";

//         mail( $_REQUEST['email'], $conf_subject, $msg, 'From: ' . $conf_sender );
//         exit();
//         if ($result) {
//             echo "<div class='form'>
//                   <h3 style='color:black;'>You are registered successfully.</h3><br/>
//                   <p class='link'>Click here to <a href='login.php'>Login</a></p>
//                   </div>";
//         } else {
//             echo "<div class='form'>
//                   <h3>Required fields are missing.</h3><br/>
//                   <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
//                   </div>";
//         }
//     } else {
//  ?>
if
    <form class="form registration_form" action="{{route('register.user')}}" method="post">
        @csrf
        <h1 class="login-title">Signup In Barbarian</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="email" class="login-input" name="email" placeholder="Email Adress">
        <input type="password" id="password" class="login-input" name="password" placeholder="Password">
        <input type="password" id="confirm_password" name="password_confirm" class="login-input"  placeholder="Confirm Password" />
        <span id='message'></span>
        <input type="submit" onclick="return Validate()" name="submit" value="Register" class="login-button submit_btn">
        <p class="link">Already have an account? <a href="{{route('login')}}">Login here</a></p>
    </form>
<?php
    // }
?>
<script>
    function Validate() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirm_password").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }
   
</script>
</body>
</html>
