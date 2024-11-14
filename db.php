<?php
    $servername = "localhost";
    $username = "root";
    $password = "admin123";
    $database = "lab_db";

    $conn = new mysqli($servername, $username, $password, $database);

    if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }else{
        // echo "Connected successfully";
    }

?>