
<!doctype html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>I need an expert</title>
  <link rel="stylesheet" href="/res/style.css">
</head>
<body>
  <div class="home-hero-section">
    <?php

    ini_set ("display_errors", "1");
error_reporting(E_ALL);

    // Require the file to connect to the db :)

    $errorflag = 0;
    $overallsuccess = 0;

    //if (isset($_COOKIE['userid'])) {
    //unset($_COOKIE['userid']);
  //}

    require 'dbconnect.php';

    if (isset($_POST["username"]) && !empty($_POST["username"])) {
    //echo "Yes, username is set";
    //echo ($_POST["username"]);

    $cookie_name = "userid";
    $cookie_value = $_POST["username"];
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
    header('Location: manager.php');

    }
    else{
      //echo "Invalid credentials!";

    }


    ?>
    <div class="headerenclosure">
      <div class="header">
        <div class="header-container">
          <div class="header-logo">
            <a href="/"><img src="/res/logo/logo_small_white.png" alt=""></a>
          </div>
          <?php
          include('navbar.php');
          ?>
        </div>

      </div>
    </div>
    <div class="page-container">
      <div class="generalpage" style="width: 45%;">
        <div class="generalpageholder" style="width: 50%;">
          <h1>Login to the system</h1>
          <div class="registerform">
            <form action="login.php" method="post">
              <div style="float:left; width: 85px; text-align: right; padding-right: 10px;">
                  <p style="text-align: right; margin: 0;">
                Username:<br/>
                Password:<br/>
                </p>
              </div>
              <div style="float: left; width: 90px;">

              <input type="text" name="username" id="username" />
              <p style="margin-top: -45px;"></p>
              &nbsp;<input type="password" name="password" id="password" />
            </div>
            <input type="submit" value="Login" class="registersubmit"/>
            </form>
        </div>
        <p style="text-align: center;">
          <?php
            if($overallsuccess == "1" && $errorflag == "0"){

              echo "Welcome, ";
              echo $_POST["username"];
              echo ". ";

              echo "View the <a href='manager.php'>manager</a>?";
            }
          ?>
          </p>
        </div>
      </div>

    </div>

</div>
</body>
</html>
