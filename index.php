<?php
//error_reporting(E_ALL);
ini_set('display_errors', 0);

session_start();
 session_destroy();


?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet"  href="css/bg.css">
<!------ Include the above in your HEAD tag ---------->

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first" style="padding-top:20px; padding-bottom:20px;">
     <h3> Ticket Services Login </h3>
    </div>

    <!-- Login Form -->
    <form action="verify.php" method="post">
      <input type="text" id="user" class="fadeIn second" name="user" placeholder="Username">
      <input type="password" id="pwd" class="fadeIn third" name="pwd" placeholder="password">
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Create Account</a>
    </div>

  </div>
</div>