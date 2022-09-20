<?php
session_start();
require 'db.php';
include 'header.php';
if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["password_confirm"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $passwordConfirm = $_POST['password_confirm'];
    register($username, $password, $passwordConfirm);
    $_SESSION['username'] = $username;
}
?>
<section>
    <div class="register">
        <form method="post" action="register.php" onsubmit="return checkInputs()" class="register-form">
            <h2 class="register-title">Registration</h2>
<!--            <div class="form-group">-->
<!--                <input type="text" name="name" class="form-input" id="name" placeholder=" " autofocus required>-->
<!--                <label for="name" class="form-label">Name:</label>-->
<!--            </div>-->
<!--            <div class="form-group">-->
<!--                <input type="email" name="email" class="form-input" id="email" placeholder=" " required>-->
<!--                <label for="email" class="form-label">Email:</label>-->
<!--            </div>-->
            <div class="form-group">
                <input type="text" name="username" class="form-input" id="username" placeholder=" " autofocus required value="<?php if (isset($_SESSION['username'])) echo $_SESSION['username'];?>">
                <label for="username" class="form-label">Username:</label>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-input" id="password" placeholder=" " required>
                <label for="password" class="form-label">Password:</label>
            </div>
            <div class="form-group">
                <input type="password" name="password_confirm" class="form-input" id="password1" placeholder=" " required>
                <label for="password1" class="form-label">Confirm your password:</label>
            </div>
            <button class="button" id="register-button">Register</button>
        </form>
    </div>
</section>
<footer></footer>
</body>
</html>
