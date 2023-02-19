<?php 
    session_start();

    if (isset($_SESSION['unique_id'])) { //if user is logged in, do this
        include_once "config.php";
        $logout_id = mysqli_real_escape_string($conn,$_GET['logout_id']);

        if (isset($logout_id)) { //if log out id is set
            $status = "Offline now";
            $sql4 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id='{$logout_id}'");
            if ($sql4) {
                session_unset();
                session_destroy();
                header("location: ../view/login.php");
            }else {
            header("location: ../view/users.php");
            }
        }

    }else {
        # else redirect ti login pade
        header("location: ../view/login.php");
    }
?>