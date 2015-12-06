<?php

//Connect to the db

$link = mysqli_connect("ineedanexpertdb.ctjop96n8o3k.us-east-1.rds.amazonaws.com:3306", "nat", "password123", "ineedanexpertdb");

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

//echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
//echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;

?>
