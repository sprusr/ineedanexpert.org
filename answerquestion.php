
<!doctype html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>I need an expert</title>
  <link rel="stylesheet" href="/res/style.css">
  <meta http-equiv="refresh" content="30">
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
  <script type="text/javascript">

window.onload = function(){

(function(){
  var counter = 30;

  setInterval(function() {
    counter--;
    if (counter >= 0) {
      span = document.getElementById("count");
      span.innerHTML = counter;
    }
    // Display 'counter' wherever you want to display it.
    if (counter === 0) {
        //alert('this is where it happens');
        clearInterval(counter);
    }

  }, 1000);

})();

}

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
          <h1>You're answering a question!</h1>
          <h2>finding a partner who needs help with</h2>
          <h3>"<?php

          echo $_GET['helpwith'];

           ?>"
         </h3>
          <?php

          $cookie_name = "userid";

          if(!isset($_COOKIE[$cookie_name])) {
              die("User is not logged in!");
            }
          else{

            // User was in fact logged in, so proceed with further checks
            //print_r($_POST);
            if(!isset($_GET['helpwith'])){
              echo "<br />";
              die("Error: Couldn't see what we were helping with.");
            }
            else{
                $stuckondoe = $_GET['helpwith'];
                // All validation checks were passed, proceed with putting the query into the db.
                $sql="SELECT * FROM QUESTIONS WHERE questionKeyword = '$stuckondoe'";

                if ($result = mysqli_query($link, $sql)) {

    /* fetch associative array */
    $counter = 0;

    while ($row = mysqli_fetch_assoc($result)) {
          $lol = $row["userID"];
          $title = $_GET['helpwith'];
          $counter ++;
          echo "<div style='width: 100%;'>";
          echo "New request for help from <b>";
          echo $row["userID"];
          echo "</b>";
          echo "&nbsp;<a href='accept.php?id=$lol&title=$title'>Accept Now</a>";
          echo "</div>";
    }

    if($counter == 0){

        echo "<h1>Nobody was looking for help in this area right now :(</h1>";
        echo "<h2>The page will automatically refresh in 30 seconds</h2>";
    }

    /* free result set */
    mysqli_free_result($result);
}


          }
        }

          ?>

           <img src="res/spinner.svg" alt=""/>
           <p>The next refresh is in <span id="count">30</span> seconds...</p>
        </div>

        </div>
      </div>

    </div>

</div>
</body>
</html>
