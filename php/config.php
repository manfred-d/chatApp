<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "chatapp";

    $conn = mysqli_connect($host,$user,$password,$database);

    if (!$conn) {
        # code...
        echo 'Error' . mysqli_connect_error();
    }
?>