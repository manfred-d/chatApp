<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    header("location: ./user.php ");
}
?>

<?php include_once "./utils/header.php" ?>

<body>
    <div class="wrapper">
        <section class="form login">
            <header>Realtime Chat App</header>
            <form action="" method="post">
                <div class="error-txt">
                    This is an error message.
                </div>
                <div class="name-details">
                    <div class="field">
                        <label for="">Email</label>
                        <input type="email" name="email" placeholder="Email Name" required>
                    </div>
                    <div class="field pass">
                        <label for="">Password</label>
                        <input type="password" name="password" placeholder="Enter Password" required>
                        <i class="fas-eye"></i>
                    </div>
                    <div class="field button">
                        <button type="submit">Continue to chat</button>
                    </div>
                </div>
                <div class="link">Don't have an account? <a href="index.php">signup here</a></div>
            </form>
        </section>
    </div>
</body>
<!-- js link -->
<script src="../assets/js/login.js"></script>
<script src="../assets/js/hide_show.js"></script>

<script src="../assets/js/fontawesome/all.js"></script>

</html>