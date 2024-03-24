



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
</head>
<style>
    .{
        margin: 0px;
        padding:8px;
        box-sizing:border-box
    }
    body {
        background: linear-gradient(to right,#3a7bd5,#3a6073);
        font-family:"Raleway",sans-serif;
    }
    .center

</style>

<body>
<div id='dialog'>
<div>
<form action="email" method="post" name="login">
@csrf
<input type="email" class="login-input" name="email" placeholder="Email" autofocus="true"/>
<input type="submit" value="send" name="submit" class="login-button submit_btn"/>
</form>
</div>

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>

<script>



