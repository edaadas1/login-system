<?php

    // database connection 

    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "login_system";

    $baglan = mysqli_connect($servername,$username,$password,$db);

    // connection control

    if ($baglan -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }

?>