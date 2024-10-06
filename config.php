<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "project";

    //create connecton
    $conn = new mysqli($servername, $username, $password, $database);

    //check connection
    if($conn->connect_error)
    {
        die("Connction failed: ".$conn->connect_error);
    }
 
?>