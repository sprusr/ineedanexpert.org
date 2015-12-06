
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
      <div class="generalpage" style="width: 100%;">
        <div class="generalpageholder" style="width: 50%;">
          <h1>What would you like to do?</h1>

        </div>
      </div>

    </div>

</div>
</body>
</html>
