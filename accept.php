<?php
//expects GET 'id' and 'title'


    require 'dbconnect.php';

$cookie_name = "userid";

if(!isset($_COOKIE[$cookie_name])) {
    die("User is not logged in!");
  }
else{

  // User was in fact logged in, so proceed with further checks
  //print_r($_POST);
  if(!isset($_GET['id'])){
    echo "<br />";
    die("Error: There wasn't a user iD set!");
  }
  else{
      $askerid = $_GET['id'];
      $helperid = $_COOKIE[$cookie_name];
      $problemid = $_GET['title'];
      // All validation checks were passed, proceed with putting the query into the db.
      $sql="INSERT INTO `ACTIVECALLS` (`askerID`, `helperID`, `problemID`) VALUES ('$askerid', '$helperid', '$problemid')";
      if ($link->query($sql) === TRUE) {
        //SUCCESS!!!!!!!!!
        header('Location: startcall.php?token=434871827182187');
        $overallsuccess = "1";
        //setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
   } else {
   echo "Error: " . $sql . "<br>" . $link->error;
   }


}
}

?>
