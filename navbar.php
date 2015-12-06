<ul style="float: left">
  <li><a class="active" href="index.php">Homepage</a></li>
  <li><a href="login.php">Log in/out</a></li>
  <li><a href="register.php">Register</a></li>
  <li><a href="manager.php">Task Manager</a></li>
</ul>
<div class="header-account">
  <div class="header-account-text">Welcome,

<?php
  $cookie_name = 'userid';
if(!isset($_COOKIE[$cookie_name])) {
    echo "Guest.";
} else {
    echo $_COOKIE[$cookie_name];
    echo ".";
}
?></div>
  <img src="/res/personicon.png" alt="Account">
</div>
