<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    header("location: ./user.php ");
}
?>

<?php include_once "./utils/header.php" ?>

<body>
    <div class="wrapper">
        <section class="form signup">
            <header>Realtime Chat App</header>
            <form action="" method="post" enctype="multipart/form-data" autocomplete="false">
                <div class="error-txt">
                    This is an error message.
                </div>
                <div class="name-details">
                    <div class="field">
                        <label for="">First Name</label>
                        <input type="text" name="fname" placeholder="First Name" required>
                    </div>
                    <div class="field">
                        <label for="">Last Name</label>
                        <input type="text" name="lname" placeholder="Last Name" required>
                    </div>
                    <div class="field">
                        <label for="">Email</label>
                        <input type="email" name="email" placeholder="Email Name" required>
                    </div>
                    <div class="field pass">
                        <label for="">Password</label>
                        <input type="password" name="password" placeholder="Enter Password" required>
                        <i class="fas-eye"></i>
                    </div>
                    <div class="field image">
                        <label for="">Select Image</label>
                        <input type="file" name="image" required>
                    </div>
                    <div class="field button">
                        <button type="submit">Continue to chat</button>
                    </div>
                </div>
                <div class="link">Already Signed Up? <a href="login.php">Login here</a></div>
            </form>
        </section>
    </div>
</body>
<script src="../assets/js/index.js"></script>
<script src="../assets/js/hide_show.js"></script>

<script src="../assets/js/fontawesome/all.js"></script>


</html>