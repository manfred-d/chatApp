<?php
session_start();
if (!isset($_SESSION["unique_id"])) {
    header("location:./login.php");
}
?>

<?php include_once "./utils/header.php" ?>

<body>
    <div class="wrapper">
        <section class="chat-area">
            <header>
                <?php
                include_once("../php/config.php");
                $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
                $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
                if (mysqli_num_rows($sql) > 0) {
                    $row = mysqli_fetch_assoc($sql);
                }
                ?>

                <a href="./user.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                <img src="../assets/images/<?php echo $row["img"] ?>" alt="">
                <div class="details">
                    <span><?php echo $row["fname"] . " " . $row["lname"] ?></span>
                    <p class=""><?php echo $row["status"]  ?></p>
                </div>
            </header>
            <div class="chat-box">
                <!-- chat messages Box -->
                
            </div>
            <form action="" class="typing-area">
                <input type="hidden" name="outgoing_id" value="<?php echo $_SESSION['unique_id']  ?>">
                <input type="hidden" name="incoming_id" value="<?php echo $user_id  ?>">
                <input type="text" class="input-field"  name="message" placeholder="Type a message">
                <button type="submit" value="Send"><i class="fab fa-telegram-plane"></i></button>
            </form>
        </section>
    </div>
</body>
<script src="../assets/js/chat.js"></script>
<script src="../assets/js/fontawesome/all.js"></script>


</html>