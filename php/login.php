<?php
    session_start();

    require_once('config.php');

    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

    // check if email exists
    // echo "Hello login page";
    if (!empty($email) && !empty($password)) {
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}' ");
        if (mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_assoc($sql); 
            $status = "Active now";
            $sql4 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id='{$row['unique_id']}'");

            if ($sql4) {
                $_SESSION['unique_id'] = $row['unique_id']; //session for user, access user from any file
                echo "success";
            }            
        }else {
            echo "Email or Password is incorrect";
        }
    }else {
        echo "All input are required!";
    }

?>