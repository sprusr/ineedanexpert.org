
<!doctype html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>I need an expert</title>
  <link rel="stylesheet" href="/res/style.css">
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> origin/master
>>>>>>> origin/master
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script>
  $(document).ready(function(){

    $(".donatetime").click(function(){

        $("#nowanswerit").fadeIn(3000);
    });

    $("#askadvice").click(function(){

        $("#nowaskit").fadeIn(3000);
    });


  });
  </script>
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
>>>>>>> origin/master
>>>>>>> origin/master
>>>>>>> origin/master
</head>
<body>
  <div class="home-hero-section">
    <?php

    ini_set ("display_errors", "1");
error_reporting(E_ALL);

    // Require the file to connect to the db :)

    $errorflag = 0;
    $overallsuccess = 0;

<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
  
>>>>>>> origin/master
>>>>>>> origin/master
>>>>>>> origin/master

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
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> origin/master
>>>>>>> origin/master
            <div class="buttonholder" style="width: 100; margin 0 auto;">

              <a href="#" id="askadvice">I want to get expert advice</a>
              <div id="nowaskit" style="display:none;">
              <form action="askquestion.php" method="post">
                <input type="text" id="stuckon" name="stuckon" placeholder="What are you stuck on? (e.g. 'drawing')" />
                <input type="submit" value="Ask now!" />
              </form>
              </div>
              <p style="padding-top: 0px;"></p>
              <a href="#" class="donatetime">I want to donate my time&nbsp;&nbsp;&nbsp;</a>
              <div id="nowanswerit" style="display:none;">
              <form action="answerquestion.php" method="GET">
                <input type="text" id="helpwith" name="helpwith" placeholder="What can you help with? (e.g. 'java')" />
                <input type="submit" value="Help now!" />
              </form>
              </div>
            </div>
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======

>>>>>>> origin/master
>>>>>>> origin/master
>>>>>>> origin/master
        </div>
      </div>

    </div>

</div>
</body>
</html>
