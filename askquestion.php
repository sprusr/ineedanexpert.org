
<!doctype html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>I need an expert</title>
  <link rel="stylesheet" href="/res/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <meta http-equiv="refresh" content="15; url=askquestion.php">
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

    $cookie_name = "userid";
    $cookie_value = $_COOKIE[$cookie_name];

    $sql="SELECT * FROM ACTIVECALLS WHERE askerID = '$cookie_value' AND helperID IS NOT NULL";

    if ($result = mysqli_query($link, $sql)) {

/* fetch associative array */
$counter = 0;

while ($row = mysqli_fetch_assoc($result)) {
$counter ++;
}

//echo $counter;
if($counter > 0){

header('Location: startcall.php?token=434871827182187');

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
        <div class="generalpageholder" style="width: 95%;">
          <div class="centerheaders" style="with: 100%; text-align: center;margin 0 auto;">
          <h1>You're asking a question!</h1>
          <h2>give us a moment to find you a partner</h2>
          <img src="res/spinner.svg" alt=""/>
          <?php

          $cookie_name = "userid";

          if(!isset($_COOKIE[$cookie_name])) {
              die("User is not logged in!");
            }
          else{

            // User was in fact logged in, so proceed with further checks
            //print_r($_POST);
            if(!isset($_POST['stuckon'])){
              echo "<br />";
              die("Debug warning: No question submitted at present");
            }
            else{
                $stuckondoe = $_POST['stuckon'];
                // All validation checks were passed, proceed with putting the query into the db.
                $sql="INSERT INTO `QUESTIONS` (`userID`, `questionKeyword`, `questionCore`, `questionDate_posted`) VALUES ('$_COOKIE[$cookie_name]', '$stuckondoe', 'oopsie', '20/03/1997')";
                if ($link->query($sql) === TRUE) {
                  //SUCCESS!!!!!!!!!
                  echo "<br />Debug: question posted to db successfully";


            }


          }
        }
}



          ?>
        </div>

        </div>
      </div>

    </div>

</div>
</body>
</html>
