<?php
session_start();
require 'db.php';
include 'header.php';
if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    login($username, $password);
    $_SESSION['username'] = $username;
}
?>

<section>
    <div class="register">
        <form method="post" onsubmit="return checkInputs()" action="login.php" class="register-form">
            <h2 class="register-title">Sign in</h2>
            <div class="form-group">
                <input type="text" name="username" class="form-input" id="username" placeholder=" " value="<?php if (isset($_SESSION['username'])) echo $_SESSION['username'];?>" required autofocus>
                <label for="username" class="form-label">Username:</label>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-input" id="password" placeholder=" " required>
                <label for="password" class="form-label">Password:</label>
            </div>
            <button class="button" id="sign-in-button">Sign in</button>
        </form>
    </div>
</section>
<footer></footer>
</body>
</html>
