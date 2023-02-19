<?php
session_start();
include_once('config.php');

$outgoing_id = $_SESSION['unique_id'];

$sql = mysqli_query($conn, "SELECT * FROM users WHERE NOT unique_id={$outgoing_id}");
$output = "";
if (mysqli_num_rows($sql) == 1) {
    $output .= "No users are available to chat with";
} elseif (mysqli_num_rows($sql) > 0) {
    while ($row = mysqli_fetch_assoc($sql)) {

        // get last messages
        $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']} OR outgoing_msg_id = {$row['unique_id']}) AND
                (outgoing_msg_id = {$outgoing_id} OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";

        $query2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($query2);

        if (mysqli_num_rows($query2) > 0) {
            $result = $row2['msg'];
        } else {
            $result = "No messages";
        }

        (strlen($result) > 28) ? $msg = substr($result, 0, 26) . '. . .' : $msg = $result;
        // add You. before message
        ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
        // check if offline
        ($row['status']=="Offline now" )? $offline = "Offline" : $offline="";

        $output .= '<a href="../view/chat.php?user_id=' . $row['unique_id'] . ' ">
                        <div class="content">
                            <img src="../assets/images/'. $row['img'] .' " alt="">
                            <div class="details">
                                <span>'. $row['fname'] . " " .$row['lname'] .'</span>
                                <p>'. $you . $msg .'</p>
                            </div>
                        </div>
                        <div class="status'.$offline.'  "><i class="fas fa-circle"></i></div>
                    </a>';
    }
    echo $output;
}else {
    # code...
}
