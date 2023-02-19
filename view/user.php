<?php
session_start();
if (!isset($_SESSION["unique_id"])) {
    header("location:./login.php");
}
?>

<?php include_once "./utils/header.php" ?>

<body>
    <div class="wrapper">
        <section class="users">
            <header>
                <?php
                include_once("../php/config.php");
                $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION["unique_id"]}");
                if (mysqli_num_rows($sql) > 0) {
                    $row = mysqli_fetch_assoc($sql);
                }
                ?>
                <div class="content">
                    <img src="../assets/images/<?php echo $row["img"] ?>" alt="profile">
                    <div class="details">
                        <span><?php echo $row["fname"] ?> </span>
                        <p class=""><?php echo $row["status"] ?></p>
                    </div>
                </div>
                <a href="../php/logout.php?logout_id=<?php echo $row['unique_id'] ?>" class="logout">Logout</a>
            </header>
            <div class="search">
                <span class="text">Select user to start</span>
                <input type="text" name="searchTerm" placeholder="Search user...">
                <button type="submit"><i class="fas fa-search"></i></button>
            </div>
            <div class="users-list">
                <!-- users chats here -->
            </div>
        </section>
    </div>
</body>
<!-- js link -->
<script src="../assets/js/users.js"></script>
<script src="../assets/js/fontawesome/all.js"></script>

</html>